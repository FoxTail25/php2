<main>
	<h2 class="text-center pt-2">Свойства только для чтения в ООП на PHP</h2>
	<p>
		Сейчас мы с вами сделаем так, чтобы в объекте какое-то свойство было доступно только для чтения, но не для записи (англ. read-only). Это делается следующим образом: для такого свойства нужно сделать геттер, но не делать сеттер. В этом случае свойство можно будет прочитать с помощью геттера, но нельзя будет записать, так как сеттер отсутствует. При этом изначальное значение свойства будет задаваться в конструкторе при создании объекта. Давайте попробуем реализовать описанное. Пусть у нас дан вот такой класс User:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
	}
?>
</pre>
</code>
<p>
Давайте сделаем так, чтобы свойство name было доступно только для чтения, а свойство age - и для чтения и для записи. Для этого свойству name сделаем только геттер, а свойству age - и геттер и сеттер:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		// Геттер для имени:
		public function getName()
		{
			return $this->name;
		}
		
		// Геттер для возраста:
		public function getAge()
		{
			return $this->age;
		}
		
		// Сеттер для возраста:
		public function setAge($age)
		{
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
	Давайте теперь добавим конструктор объекта, в котором будем задавать начальные значения наших свойств:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		// Конструктор объекта:
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		// Геттер для имени:
		public function getName()
		{
			return $this->name;
		}
		
		// Геттер для возраста:
		public function getAge()
		{
			return $this->age;
		}
		
		// Сеттер для возраста:
		public function setAge($age)
		{
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
	Все - наша задача решена, убедимся в этом:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 25); // создаем объект с начальными данными
	
	// Имя можно только читать, но нельзя поменять:
	echo $user->getName(); // выведет 'john'
	
	// Возраст можно и читать, и менять:
	echo $user->getAge(); // выведет 25
	echo $user->setAge(30); // установим возраст в значение 30
	echo $user->getAge(); // выведет 30
?>
</pre>
</code>

<h5>Задачи</h5>
<h6>
	1) Сделайте класс Employee, в котором будут следующие свойства: name, surname и salary.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $surname;
		private $salary;
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	private $name;
	// 	private $surname;
	// 	private $salary;
	// }
?>
<hr/>
<h6>
	2) Сделайте так, чтобы свойства name и surname были доступны только для чтения, а свойство salary - и для чтения, и для записи.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $surname;
		private $salary;

		public function __construct($name, $surname, $salary){
			$this->name = $name;
			$this->surname = $surname;
			$this->salary = $salary;
		}

		public function setSalary($newSalary){
			$this->salary = $newSalary;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	class Employee {
		private $name;
		private $surname;
		private $salary;

		public function __construct($name, $surname, $salary){
			$this->name = $name;
			$this->surname = $surname;
			$this->salary = $salary;
		}

		public function setSalary($newSalary){
			$this->salary = $newSalary;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
?>
<hr/>


<p class="text-center">
	<a href="/page/oop/read-only-properties" class="p-2">Назад</a>
	<a href="/page/oop/one-class-one-file"  class="p-2">Далее</a>
</p>
</main>