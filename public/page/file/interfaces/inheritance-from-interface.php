<main>
	<h2 class="text-center pt-2">Наследование интерфейсов друг от друга</h2>
<p>
	Интерфейсы, так же, как и классы, могут наследовать друг от друга с помощью оператора extends. Давайте посмотрим на примере. Пусть у нас есть такой интерфейс из прошлого урока:
</p>
<code>
<pre>
&lt;?php
	interface iRectangle
	{
		public function __construct($a, $b);
		public function getSquare();
		public function getPerimeter();
	}
?></pre>
</code>
<p>
	Однако у нас уже есть интерфейс iFigure, описывающий часть методов нашего интерфейса:
</p>
<code>
<pre>
&lt;?php
	interface iFigure
	{
		public function getSquare();
		public function getPerimeter();
	}
?></pre>
</code>
<p>
	Давайте сделаем так, чтобы интерфейс iRectangle наследовал методы интерфейса iFigure:
</p>
<code>
<pre>
&lt;?php
	interface iRectangle extends iFigure
	{
		public function __construct($a, $b);
	}
?></pre>
</code>
<div class="task">
	<h6>
		1) Сделайте интерфейс iUser с методами getName, setName, getAge, setAge.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iUser{
		public function getName();
		public function getAge();
		public function setName(string $name);
		public function setAge(int $age);
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iUser{
		public function getName();
		public function getAge();
		public function setName(string $name);
		public function setAge(int $age);
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте интерфейс iEmployee, наследующий от интерфейса iUser и добавляющий в него методы getSalary и setSalary.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iEmoloyee extends iUser{
		public function getSalary();
		public function setSalary(int $newSalary);
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iEmoloyee extends iUser{
		public function getSalary();
		public function setSalary(int $newSalary);
	}
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте класс Employee, реализующий интерфейс iEmployee.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Emoloyee implements iEmoloyee{
		private string $name;
		private int $age;
		private int $salary;
		public function getSalary(){
			return $this->salary;
		}
		public function setSalary(int $newSalary){
			$this->salary = $newSalary;
		}
		public function getName(){
			return $this->name;
		}
		public function setName(string $name){
			$this->name = $name;
		}
		public function getAge(){
			return $this->age;
		}
		public function setAge(int $age){
			$this->age = $age;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Emoloyee implements iEmoloyee{
		private string $name;
		private int $age;
		private int $salary;
		public function getSalary(){
			return $this->salary;
		}
		public function setSalary(int $newSalary){
			$this->salary = $newSalary;
		}
		public function getName(){
			return $this->name;
		}
		public function setName(string $name){
			$this->name = $name;
		}
		public function getAge(){
			return $this->age;
		}
		public function setAge(int $age){
			$this->age = $age;
		}
	}
	?>
</div>




<p class="text-center">
	<a href="/page/interfaces/constructor-declaring" class="p-2">Назад</a>
	<a href="/page/interfaces/instanceof"  class="p-2">Далее</a>
</p>
</main>