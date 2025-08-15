<main>
	<h2 class="text-center pt-2">Абстрактные методы трейтов</h2>
<p>
В трейтах можно некоторые методы объявлять абстрактными. В этом случае класс, использующий этот трейт, обязан будет реализовать такой метод. При этом абстрактные методы трейта не могут быть приватными.

Давайте посмотрим на примере. Пусть у нас есть вот такой трейт:
</p>
<code>
<pre>
&lt;?php
	trait TestTrait	{
		public function method1(){
			return 1;
		}	
		abstract public function method2();
	}
?></pre>
</code>
<p>
	В трейтах можно некоторые методы объявлять абстрактными. В этом случае класс, использующий этот трейт, обязан будет реализовать такой метод. При этом абстрактные методы трейта не могут быть приватными.
	Давайте посмотрим на примере. Пусть у нас есть вот такой трейт:
</p>
<code>
<pre>
&lt;?php
	class Test	{
		use TestTrait; // используем трейт
		
		// Реализуем абстрактный метод:
		public function method2(){
			return 2;
		}
	}
	new Test;
?></pre>
</code>
<div class="task">
	<h6>
		1) Скопируйте код трейта TestTrait и код класса Test. Удалите из класса метод method2. Убедитесь в том, что отсутствие его реализации приведет к ошибке PHP.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	trait Trait1{
		public function method1(){
			return 1;
		}
		abstract function method2();
	}
	class Test{
		use Trait1;
		public function method2(){
			return 2;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	trait Trait1{
		public function method1(){
			return 1;
		}
		abstract function method2();
	}
	class Test{
		use Trait1;
		public function method2(){
			return 2;
		}
	}
	?>
</div>
<h5 class="text-center mt-3">Дополнение</h5>
<p>
	Ошибки не будет, если абстрактный метод указанный в Trait1, будет добавлен с помощью другого трейта.
</p>
<code>
<pre>
&lt;?php
	trait Trait1 {
		public function method1(){
			return 1;
		}
		abstract function method2();
	}
	trait Trait2 {
		public function method2(){
			return 2;
		}
	}
	class Test {
		use Trait1,Trait2;
	}
?></pre>
</code>

<p class="text-center">
	<a href="/page/traits/methods-priority" class="p-2">Назад</a>
	<a href="/page/traits/using-traits-in-trait"  class="p-2">Далее</a>
</p>
</main>