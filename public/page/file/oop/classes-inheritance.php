<main>
	<h2 class="text-center pt-2">Наследование классов</h2>
	<p>
	Представьте, что у вас есть класс User. Он нужен вам для каких-то целей и в общем-то полностью вас устраивает - доработки этому классу в не нужны.<br/>
	Вот этот класс:
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
А теперь представим себе ситуацию, когда нам понадобился еще и класс Employee. Работник очень похож на юзера, имеет те же свойства и методы, но еще и добавляет свои - свойство salary, а также геттер и сеттер для этого свойства. Вот этот класс:
</p>
<code>
<pre>
&lt;?php
	class Employee
	{
		private $name;
		private $age;
		private $salary; // зарплата
		
		// Геттер зарплаты
		public function getSalary()
		{
			return $this->salary;
		}
		
		// Сеттер зарплаты
		public function setSalary($salary)
		{
			$this->salary = $salary;
		}
		
		public function getName()
		{
			return $this->age;
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
	Как мы видим, код классов User и Employee практически полностью совпадает. Было бы намного лучше сделать так, чтобы общая часть была записана только в одном месте.

Для решения проблемы существует такая вещь, как наследование. С помощью наследования мы можем заставить наш класс Employee позаимствовать (унаследовать) методы и свойства класса User и просто дополнить их своими методами и свойствами.

Класс, от которого наследуют называется родителем (англ. parent), а класс, который наследует - потомком. Класс-потомок наследует только публичные методы и свойства, но не приватные.

Наследование реализуется с помощью ключевого слова extends (переводится как расширяет). Перепишем наш класс Employee так, чтобы он наследовал от User:
</p>
<code>
<pre>
&lt;?php
	class Employee extends User
	{
		private $salary;
		
		public function getSalary()
		{
			return $this->salary;
		}
		
		public function setSalary($salary)
		{
			$this->salary = $salary;
		}
		
	}
?>
</pre>
</code>
<p>
	Проверим работу нового класса Employee:
</p>
<code>
<pre>
&lt;?php
	$employee = new Employee;
	
	$employee->setSalary(1000); // метод класса Employee
	$employee->setName('john'); // метод унаследован от родителя
	$employee->setAge(25); // метод унаследован от родителя
	
	echo $employee->getSalary(); // метод класса Employee
	echo $employee->getName(); // метод унаследован от родителя
	echo $employee->getAge(); // метод унаследован от родителя
?>
</pre>
</code>
<div class="bg-body-tertiary p-3">
	Класс-потомок не унаследовал от своего родителя приватные свойства name и age - попытка обратится к ним вызовет ошибку. При этом, однако, в классе-потомке доступны геттеры и сеттеры этих свойств, так как эти геттеры и сеттеры являются публичными.
</div>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в код выше реализуйте такие же классы User, Employee.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	private $name;
	private $age;

	public function setName($newName){
		$this->name = $newName;
	}
	public function getName(){
		return $this->name;
	}
	public function setAge($newAge){
		$this->age = $newAge;
	}
	public function getAge(){
		return $this->age;
	}
}
class Exployee extends User {
	private $salary;

	public function setSalary($newSalary){
		$this->salary = $newSalary;
	}

	public function getSalary(){
		return $this->salary;
	}
}
$exp1 = new Exployee;
$exp1->setName('john');
echo $exp1->getName();
echo '&lt;br/>';
$exp1->setAge('30');
echo $exp1->getAge();
echo '&lt;br/>';
$exp1->setSalary('3000$');
echo $exp1->getSalary();

?>

	</pre>
</code>
<p>
	Результат:
</p>
<?php
class User {
	private $name;
	private $age;

	public function setName($newName){
		$this->name = $newName;
	}
	public function getName(){
		return $this->name;
	}
	public function setAge($newAge){
		$this->age = $newAge;
	}
	public function getAge(){
		return $this->age;
	}
}
class Exployee extends User {
	private $salary;

	public function setSalary($newSalary){
		$this->salary = $newSalary;
	}

	public function getSalary(){
		return $this->salary;
	}
}
$exp1 = new Exployee;
$exp1->setName('john');
echo $exp1->getName();
echo '<br/>';
$exp1->setAge('30');
echo $exp1->getAge();
echo '<br/>';
$exp1->setSalary('3000$');
echo $exp1->getSalary();
?>
<hr/>
<h5>
	Несколько потомков
</h5>
<p>
	Преимущества наследования в том, что каждый класс может несколько потомков. Давайте посмотрим на примере. Пусть кроме работника нам нужен еще и класс Student - давайте также унаследуем его от User:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course; // курс
		
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
	Проверим работу нашего класса:
</p>
<code>
<pre>
&lt;?php
	$student = new Student;
	
	$student->setCourse(3); // метод класса Student
	$student->setName('john'); // метод унаследован от родителя
	$student->setAge(25); // метод унаследован от родителя
	
	echo $student->getCourse(); // метод класса Student
	echo $student->getName(); // метод унаследован от родителя
	echo $student->getAge(); // метод унаследован от родителя
?>
</pre>
</code>
<h6>
	2) Не подсматривая в мой код реализуйте такой же класс Student, наследующий от класса User.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Student extends User {
	private $course;

	public function setCourse($newCourse){
		$this->course = $newCourse;
	}
	public function getCourse(){
		return $this->course;
	}
}
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php

class Student extends User {
	private $course;

	public function setCourse($newCourse){
		$this->course = $newCourse;
	}
	public function getCourse(){
		return $this->course;
	}
}
?>
<hr/>
<h5>
	Наследование от наследников
</h5>
<p>
	Пусть у нас есть класс-родитель и класс-потомок. От этого потомка также могут наследовать другие классы, от его потомков другие и так далее. Для примера пусть от класса User наследует Student, а от него в свою очередь наследует класс StudentBSU:
</p>
<code>
	<pre>
&lt;?php
	class StudentBSU extends Student
	{
		// добавляем свои свойства и методы
	}
?>		
	</pre>
</code>
<h6>
	3) Сделайте класс Programmer, который будет наследовать от класса Employee. Пусть новый класс имеет свойство langs, в котором будет хранится массив языков, которыми владеет программист. Сделайте также геттер и сеттер для этого свойства.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Programmer extends Exployee {
	private $langs = [];

	public function pushLang($newLang){
		array_push($this->langs, $newLang);
	}
	public function setLangs($arrLangs){
		$this->lang = array_merge($this->langs, $arrLangs);
	}
	public function getLangs(){
		return implode(', ', $this->langs);			
	}
}
$prog1 = new Programmer;
$prog1->setLangs(['JavaScript', 'Node.js']);
$prog1->pushLang('PHP');
echo $prog1->getLangs();
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class Programmer extends Exployee {
	private $langs = [];

	public function pushLang($newLang){
		array_push($this->langs, $newLang);
	}
	public function setLangs($arrLangs){
		$this->langs = array_merge($this->langs, $arrLangs);
	}
	public function getLangs(){
		return implode(', ', $this->langs);			
	}
}
$prog1 = new Programmer;
$prog1->setLangs(['JavaScript', 'Node.js']);
$prog1->pushLang('PHP');
echo $prog1->getLangs();
?>
<hr/>
<h6>
	4) Сделайте класс Driver (водитель), который будет наследовать от класса Employee. Пусть новый класс добавляет следующие свойства: водительский стаж, категория вождения (A, B, C, D), а также геттеры и сеттеры к ним.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Driver extends Exployee {
	private $category = [];
	private $driving_age = 0;

	public function addCategory($newCategory){
		array_push($this->category, $newCategory);
	}
	public function getCategory(){
		return implode(', ', $this->category);			
	}
	public function setDriving_age($driving_age){
		$this->driving_age = $driving_age;
	}
	public function getDriving_age(){
		return $this->driving_age;			
	}
}
$drv1 = new Driver;
$drv1->addCategory('A');
$drv1->addCategory('B');
echo $drv1->getCategory();
echo '&lt;br/>';
$drv1->setDriving_age(5);
echo $drv1->getDriving_age();
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class Driver extends Exployee {
	private $category = [];
	private $driving_age = 0;

	public function addCategory($newCategory){
		array_push($this->category, $newCategory);
	}
	public function getCategory(){
		return implode(', ', $this->category);			
	}
	public function setDriving_age($driving_age){
		$this->driving_age = $driving_age;
	}
	public function getDriving_age(){
		return $this->driving_age;			
	}
}
$drv1 = new Driver;
$drv1->addCategory('A');
$drv1->addCategory('B');
echo $drv1->getCategory();
echo '<br/>';
$drv1->setDriving_age(5);
echo $drv1->getDriving_age();
?>
<hr/>


<p class="text-center">
	<a href="/page/oop/class-as-methods-set" class="p-2">Назад</a>
	<a href="/page/oop/access-modifier-protected"  class="p-2">Далее</a>
</p>
</main>