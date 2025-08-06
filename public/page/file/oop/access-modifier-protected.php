<main>
	<h2 class="text-center pt-2">Модификатор доступа protected в ООП на PHP</h2>
	<p>
	Как вы уже знаете, приватные свойства и методы не наследуются. Если вы хотите, чтобы метод или свойство появились у потомка, вы должны объявить их как public. Проблема, однако, в том, что публичные методы будут также доступны и извне класса, а мы бы этого не хотели.<br/>Другими словами, мы хотели бы, чтобы некоторые методы или свойства родителя наследовались потомками, но при этом для всего остального мира вели себя как приватные.<br/>Для решения этой проблемы существует специальный модификатор protected, который и реализует описанное. Давайте изучим его работу на реальном примере. Пусть у нас дан вот такой класс User с приватными свойствами name и age:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		public function getName()
		{
			return $this->name;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
		
		public function setAge($age)
		{
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
Пусть от класса User наследует класс Student:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		public function getCourse()
		{
			return $this->course;
		}
		
		public function setCourse($course)
		{
			$this->course = $course;
		}
	}
?>
</pre>
</code>
<p>
	Пока все отлично и все работает.

Пусть теперь мы решили в классе Student сделать метод addOneYear, который будет добавлять 1 год к свойству age. Давайте реализуем указанный метод:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		// Реализуем этот метод:
		public function addOneYear()
		{
			$this->age++;
		}
		
		public function getCourse()
		{
			return $this->course;
		}
		
		public function setCourse($course)
		{
			$this->course = $course;
		}
	}
?>
</pre>
</code>
<p>
	Проблема в том, что если оставить свойство age приватным, то мы не сможем обратится к нему в классе-потомке - это выдаст ошибку при попытке вызова метода addOneYear:
</p>
<code>
<pre>
&lt;?php
	$student = new Student();
	
	$student->setAge(25);
	$student->addOneYear(); // выдаст ошибку
?>
</pre>
</code>
<p>
	Для исправления ошибки поправим класс User - объявим свойство age как protected, а не как private:
</p>

<p>
	Теперь метод addOneYear потомка сможет менять свойство age, но оно по-прежнему не будет доступно извне наших классов. Проверим работу класса Student:
</p>
<code>
<pre>
&lt;?php
	$student = new Student();
	
	$student->setName('john'); // установим имя
	$student->setCourse(3);    // установим курс
	$student->setAge(25);      // установим возраст в 25
	
	$student->addOneYear();    // увеличим возраст на единицу
	echo $student->getAge();   // выведет 26
?>
</pre>
</code>
<p>
	Попытка обратится к свойству age снаружи класса выдаст ошибку, как нам и нужно:
</p>
<code>
<pre>
&lt;?php
	$student = new Student();
	$student->age = 30; // выдаст ошибку
?>
</pre>
</code>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Скопируйте мой код класса User. Самостоятельно не подсматривая в мой код реализуйте описанный класс Student с методами getCourse, setCourse и addOneYear.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	private $name;
	protected $age;

	public function setAge($newAge){
		if($newAge>=1 and $newAge <=100){
			$this->age = $newAge;
		}
	}
	public function getAge(){
		return $this->age;
	}
	public function setName($newName){
			$this->name = $newName;
	}
	public function getName(){
		return $this->name;
	}
}

class Student extends User {
	private $course;

	public function setCourse($newCourse) {
		if($newCourse >=1 and $newCourse<=5) {
			$this->course = $newCourse;
		}
	}
	public function getCourse(){
		return $this->course;
	}
	public function AddOneYear(){
		$this->age++;
	}
}
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class User {
	private $name;
	protected $age;

	public function setAge($newAge){
		if($newAge>=1 and $newAge <=100){
			$this->age = $newAge;
		}
	}
	public function getAge(){
		return $this->age;
	}
	public function setName($newName){
			$this->name = $newName;
	}
	public function getName(){
		return $this->name;
	}
}

class Student extends User {
	private $course;

	public function setCourse($newCourse) {
		if($newCourse >=1 and $newCourse<=5) {
			$this->course = $newCourse;
		}
	}
	public function getCourse(){
		return $this->course;
	}
	public function AddOneYear(){
		$this->age++;
	}
}

?>
<hr/>

<p class="text-center">
	<a href="/page/oop/classes-inheritance" class="p-2">Назад</a>
	<a href="/page/oop/overriding-of-parent-methods"  class="p-2">Далее</a>
</p>
</main>