<main>
	<h2 class="text-center pt-2">Разрешение конфликтов в трейтах</h2>
<p>
Так как один класс может использовать несколько трейтов, то нас может поджидать проблема, возникающая тогда, когда два трейта имеют одноименные методы.

В этом случае PHP выдаст фатальную ошибку. Чтобы поправить ситуацию, нужно будет разрешить конфликт имен явным образом. Как это делается - посмотрим на практике.

Пусть у нас есть два трейта с одинаковым методом method:
</p>

<code>
<pre>
&lt;?php
	trait Trait1{
		private function method(){
			return 1;
		}
	}
	trait Trait2{
		private function method(){
			return 2;
		}
	}
?></pre>
</code>
<p>
	Пусть у нас также есть класс Test, использующий оба наших трейта. Если просто подключить оба трейта к нашему классу, то PHP выдаст ошибку, так как у трейтов есть совпадающий методы:
</p>
<code>
<pre>
&lt;?php
	// Данный код выдаст ошибку!
	class Test{
		use Trait1, Trait2; // подключаем трейты
	}
?></pre>
</code>
<p>
Давайте разрешим (в данном контексте это слово значит разрулим) конфликт имен наших трейтов. Для этого существует специальный оператор insteadof (переводится вместо чего-то). С помощью этого оператора будем использовать метод method трейта Trait1 вместо такого же метода трейта Trait2:
</p>
<code>
<pre>
&lt;?php
	class Test{
		use Trait1, Trait2 {
			Trait1::method insteadof Trait2;
		}
	}
	new Test;
?></pre>
</code>
<p>
Как вы видите, синтаксис тут следующий: вначале имя трейта, потом два двоеточия, потом имя метода, потом наш оператор insteadof и имя второго трейта.

Давайте проверим:
</p>
<code>
<pre>
&lt;?php
	class Test{
		use Trait1, Trait2 {
			Trait1::method insteadof Trait2;
		}	
		public function __construct(){
			echo $this->method(); // выведет 1, тк это метод первого трейта
		}
	}
	new Test;
?></pre>
</code>
<p>
Итак, в нашем классе мы сказали, что если используется метод method, то следует брать его из первого трейта. Можно и наоборот - взять метод второго трейта:
</p>
<code>
<pre>
&lt;?php
	class Test{
		use Trait1, Trait2 {
			Trait2::method insteadof Trait1;
		}	
		public function __construct(){
			echo $this->method(); // выведет 2, тк это метод второго трейта
		}
	}
	new Test;
?></pre>
</code>
<p>
В любом случае, если мы указываем использовать метод одного трейта, то метод второго трейта оказывается недоступным. Можно использовать и метод второго трейта, переименовав его через ключевое слово as, вот так:
</p>
<code>
<pre>
&lt;?php
	class Test{
		use Trait1, Trait2 {
			Trait1::method insteadof Trait2; // берем метод из первого трейта
			Trait2::method as method2; // метод второго трейта будет доступен как method2
		}	
		public function __construct(){
			echo $this->method() + $this->method2(); // выведет 3
		}
	}
	new Test;
?></pre>
</code>
<p>
При желании можно переименовать и метод первого трейта:
</p>
<code>
<pre>
&lt;?php
	class Test{
		use Trait1, Trait2 {
			Trait1::method insteadof Trait2;
			Trait1::method as method1; // метод первого трейта будет доступен как method1
			Trait2::method as method2; // метод второго трейта будет доступен как method2
		}	
		public function __construct(){
			echo $this->method1() + $this->method2(); // выведет 3
		}
	}
	new Test;
?></pre>
</code>
<p>
Использовать ключевое слово as без определения главного метода через insteadof нельзя, это выдаст ошибку:
</p>
<code>
<pre>
&lt;?php
	// Данный класс выдаст ошибку:
	class Test{
		use Trait1, Trait2 {
			Trait1::method as method1;
			Trait2::method as method2;
		}	
		public function __construct(){
			echo $this->method1() + $this->method2();
		}
	}
	new Test;
?></pre>
</code>
<div class="task">
	<h6>
		1) Сделайте 3 трейта с названиями Trait1, Trait2 и Trait3. Пусть в первом трейте будет метод method, возвращающий 1, во втором трейте - одноименный метод, возвращающий 2, а в третьем трейте - одноименный метод, возвращающий 3.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	trait Trait1{
		private function method(){
			return 1;
		}
	}
	trait Trait2{
		private function method(){
			return 2;
		}
	}
	trait Trait3{
		private function method(){
			return 3;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	trait Trait1{
		private function method(){
			return 1;
		}
	}
	trait Trait2{
		private function method(){
			return 2;
		}
	}
	trait Trait3{
		private function method(){
			return 3;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте класс Test, использующий все три созданных нами трейта. Сделайте в этом классе метод getSum, возвращающий сумму результатов методов подключенных трейтов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Test {
		use Trait1,Trait2,Trait3{
			Trait1::method insteadof Trait2;
			Trait1::method insteadof Trait3;
			Trait1::method as method1;
			Trait2::method as method2;
			Trait3::method as method3;
		}
		public function getSum(){
			return $this->method1() + $this->method2() + $this->method3();
		}
	}
	echo (new Test)->getSum();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Test {
		use Trait1,Trait2,Trait3{
			Trait1::method insteadof Trait2;
			Trait1::method insteadof Trait3;
			Trait1::method as method1;
			Trait2::method as method2;
			Trait3::method as method3;
		}
		public function getSum(){
			return $this->method1() + $this->method2() + $this->method3();
		}
	}
	echo (new Test)->getSum();
	?>
</div>

<p class="text-center">
	<a href="/page/traits/intro" class="p-2">Назад</a>
	<a href="/page/traits/access-modifiers"  class="p-2">Далее</a>
</p>
</main>