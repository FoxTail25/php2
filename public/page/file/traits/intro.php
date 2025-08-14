<main>
	<h2 class="text-center pt-2">Работа с трейтами в ООП на PHP</h2>
<p>
	Как вы уже знаете, в PHP нельзя наследовать от нескольких классов сразу, только от одного. Ранее мы уже проходили решение этой проблемы: вместо наследования использовать объекты одних классов внутри других.
	В PHP есть и другой способ. Он заключается в использовании трейтов. Трейт представляет собой набор свойств и методов, которые можно включить в другой класс. При этом свойства и методы трейта будут восприниматься классом будто свои.
	Синтаксис трейта такой же как и у класса, за исключением того, что имя трейта нужно объявлять с помощью ключевого слова trait.
	Экземпляр трейта нельзя создать - трейты предназначены только для подключения к другим классам. Само подключение осуществляется с помощью команды use, после которой через пробел указывается имя подключаемого трейта. Данная команда пишется в начале класса.
	Давайте посмотрим применение трейтов на практическом примере. Пусть у нас дан вот такой трейт Helper, содержащий приватные свойства name и age, а также их геттеры:
</p>

<code>
<pre>
&lt;?php
	trait Helper
	{
		private $name;
		private $age;
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?></pre>
</code>
<p>
	Пусть у нас также есть вот такой класс User, в конструкторе которого задаются свойства name и age:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
	}
?></pre>
</code>
<p>
Давайте теперь добавим геттеры для свойств нашего класса User. Только не будем их записывать в самом классе, а просто подключим трейт Helper, в котором эти методы уже реализованы:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		use Helper; // подключаем трейт
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
	}
?></pre>
</code>
<p>
После подключения трейта в нашем классе появятся методы и свойства этого трейта. При этом обращаться мы к ним будем будто к методам и свойствам самого класса:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 30);
	echo $user->getName(); // выведет 'john'
	echo $user->getAge();  // выведет 30
?></pre>
</code>
<p>
Для того, чтобы продемонстрировать преимущества трейтов, давайте сделаем еще один класс City (город). У города также будет имя и возраст, однако, логично, что город и юзер не могут наследовать от одного родителя, так представляют собой немного разные сущности, пусть и имеющие похожие методы.

Поэтому воспользуемся созданным нами трейтом Helper и в классе City:
</p>
<code>
<pre>
&lt;?php
	class City
	{
		use Helper;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
	}
?></pre>
</code>
<p>
Проверим работу нашего класса:
</p>
<code>
<pre>
&lt;?php
	$city = new City('Minsk', 1000);
	echo $city->getName(); // выведет 'Minsk'
	echo $city->getAge();  // выведет 1000
?></pre>
</code>
<div class="task">
	<h6>
		1) Реализуйте класс Country со свойствами name, age, population и геттерами для них. Пусть наш класс для сокращения своего кода использует уже созданный нами трейт Helper.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	trait Helper {
		private $name;
		private $age;
		function getName(){
			return $this->name;
		}
		function getAge(){
			return $this->age;
		}
	}
	class Country {
		use Helper;
		private int $population;
		public function __construct(string $name, int $age, int $population){
			$this->name = $name;
			$this->age = $age;
			$this->population = $population;
		}
		public function getPopulation(){
			return $this->population;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	trait Helper {
		private $name;
		private $age;
		function getName(){
			return $this->name;
		}
		function getAge(){
			return $this->age;
		}
	}
	class Country {
		use Helper;
		private int $population;
		public function __construct(string $name, int $age, int $population){
			$this->name = $name;
			$this->age = $age;
			$this->population = $population;
		}
		public function getPopulation(){
			return $this->population;
		}
	}
	?>
</div>
<h5 class="text-center mt-3">
	Несколько трейтов
</h5>
<p>
В классе можно использовать не один, а несколько трейтов. В этом и проявляется их преимущество перед наследованием. Нужные для использования в классе трейты можно указать через запятую после ключевого слова use.
</p>
<div class="task">
	<h6>
		2) Сделайте 3 трейта с названиями Trait1, Trait2 и Trait3. Пусть в первом трейте будет метод method1, возвращающий 1, во втором трейте - метод method2, возвращающий 2, а в третьем трейте - метод method3, возвращающий 3. Пусть все эти методы будут приватными.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	trait Trait1{
		private function method1(){
			return 1;
		}
	}
	trait Trait2{
		private function method2(){
			return 2;
		}
	}
	trait Trait3{
		private function method3(){
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
		private function method1(){
			return 1;
		}
	}
	trait Trait2{
		private function method2(){
			return 2;
		}
	}
	trait Trait3{
		private function method3(){
			return 3;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте класс Test, использующий все три созданных нами трейта. Сделайте в этом классе публичный метод getSum, возвращающий сумму результатов методов подключенных трейтов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Test{
		use Trait1,Trait2,Trait3;
		public function getSum(){
			return $this->method1() + $this->method2() + $this->method3(); 
		}
	}
	echo (new Test)->getSum()
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Test{
		use Trait1,Trait2,Trait3;
		public function getSum(){
			return $this->method1() + $this->method2() + $this->method3(); 
		}
	}
	echo (new Test)->getSum()
	?>
</div>

<p class="text-center">
	<a href="/page/interfaces/functions" class="p-2">Назад</a>
	<a href="/page/traits/methods-conflicts"  class="p-2">Далее</a>
</p>
</main>