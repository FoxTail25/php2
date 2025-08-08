<main>
	<h2 class="text-center pt-2">Перезапись конструктора родителя в потомке</h2>
	<p>
Пусть у нас есть вот такой класс User, у которого свойства name и age задаются в конструкторе и в дальнейшем доступны только для чтения (то есть приватные и имеют только геттеры, но не сеттеры):
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?>
</pre>
</code>
<p>
От этого класса наследует класс Student:
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
	}
?>
</pre>
</code>
<p>
	Класс-потомок не имеет своего конструктора - это значит что при создании объекта класса сработает конструктор родителя:
</p>
<code>
<pre>
&lt;?php
	$student = new Student('john', 19); // сработает конструктор родителя
	
	echo $student->getName(); // выведет 'john'
	echo $student->getAge();  // выведет 19
?>
</pre>
</code>
<p>
	Все замечательно, но есть проблема: мы бы хотели при создании объекта класса Student третьим параметром передавать еще и курс, вот так:
</p>
<code>
<pre>
&lt;?php
$student = new Student('john', 19, 2); // это пока не работает
?>
</pre>
</code>
<p>
	Самое простое, что можно сделать, это переопределить конструктор родителя своим конструктором, забрав из родителя его код:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		// Конструктор объекта:
		public function __construct($name, $age, $course)
		{
			// Дублируем код конструктора родителя:
			$this->name = $name;
			$this->age = $age;
			
			// Наш код:
			$this->course = $course;
		}
		
		public function getCourse()
		{
			return $this->course;
		}
	}
?>
</pre>
</code>
<p>
При этом мы в классе потомке обращаемся к приватным свойствам родителя name и age, что, конечно же, не будет работать так, как нам нужно. Переделаем их на protected:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		protected $name; // объявим свойство защищенным
		protected $age;  // объявим свойство защищенным
		
		// Конструктор объекта:
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?>
</pre>
</code>
<p>
Теперь при создании студента третьим параметром мы можем передать и курс:
</p>

<h5 class="text-center">Задачи</h5>
<h6>
1) Не подсматривая в мой код реализуйте такой же класс Student, наследующий от User.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	protected $name;
	protected $age;

	public function __construct($name, $age){
		$this->name = $name;
		$this->age = $age;
	}
	public function getName(){
		return $this->name;
	}
	public function getAge(){
		return $this->age;
	}
}
class Student extends User {
	private $cours;

	public function __constract($name, $age, $cours){
		$this->name = $name;
		$this->age = $age;
		$this->course = $cours;
	}
	public function getCours(){
		return $this->cours;
	}
}
?>
&lt;p>
	Студент: &lt;?=$stud1->getName()?>
	&lt;br/>
	Возраст: &lt;?=$stud1->getAge()?>
	&lt;br/>
	Курс: &lt;?=$stud1->getCours()?>
&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class User {
	protected $name;
	protected $age;

	public function __construct($name, $age){
		$this->name = $name;
		$this->age = $age;
	}
	public function getName(){
		return $this->name;
	}
	public function getAge(){
		return $this->age;
	}
}
class Student extends User {
	private $cours;

	public function __construct($name, $age, $cours){
		$this->name = $name;
		$this->age = $age;
		$this->cours = $cours;
	}
	public function getCours(){
		return $this->cours;
	}
}
$stud1 = new Student('max',20, 1);
?>
<p>
	Студент: <?=$stud1->getName()?>
	<br/>
	Возраст: <?=$stud1->getAge()?>
	<br/>
	Курс: <?=$stud1->getCours()?>
</p>
<hr/>
<h5 class="text-center">Используем конструктор родителя</h5>
<p>
Понятно, что дублирование кода родителя в классе потомке - это не очень хорошо. Давайте вместо дублирования кода в конструкторе потомка вызовем конструктор родителя.

Для полной ясности распишу все по шагам. Вот так выглядит конструктор класса User, он принимает два параметра $name и $age и записывает их в соответствующие свойства:
</p>
<code>
	<pre>
&lt;?php
			// Конструктор объекта класса User:
public function __construct($name, $age)
{
	$this->name = $name;
	$this->age  = $age;
}
?>
	</pre>
</code>
<p>
	Вот конструктор класса Student, который мы хотим переписать:
</p>
<code>
	<pre>
&lt;?php
// Конструктор объекта класса Student:
public function __construct($name, $age, $course)
{
	// Этот код хотим заменить на вызов конструктора родителя:
	$this->name = $name;
	$this->age  = $age;
	
	// Наш код:
	$this->course = $course;
}
?>
	</pre>
</code>
<p>
	Конструктор родителя можно вызвать внутри потомка с помощью parent. При этом конструктор родителя первым параметром ожидает имя, а вторым - возраст, и мы должны ему их передать, вот так:
</p>
<code>
	<pre>
&lt;?php
	// Конструктор объекта класса Student:
	public function __construct($name, $age, $course)
	{
		// Вызовем конструктор родителя, передав ему два параметра:
		parent::__construct($name, $age);
			
		// Запишем свойство course:
		$this->course = $course;
	}
?>
	</pre>
</code>
<p>
	Напишем полный код класса Student:
</p>
<code>
	<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		// Конструктор объекта:
		public function __construct($name, $age, $course)
		{
			parent::__construct($name, $age); // вызываем конструктор родителя
			$this->course = $course;
		}
		
		public function getCourse()
		{
			return $this->course;
		}
	}
?>
	</pre>
</code>
<p>
	Проверим, что все работает:
</p>
<code>
	<pre>
&lt;?php
	$student = new Student('john', 19, 2);
	
	echo $student->getName();   // выведет 'john'
	echo $student->getAge();    // выведет 19
	echo $student->getCourse(); // выведет 2
?>
	</pre>
</code>
<p>
	Так как класс Student теперь не обращается напрямую к свойствам name и age родителя, можно их опять сделать приватными:
</p>
<code>
	<pre>
&lt;?php
	class User
	{
		private $name; // объявим свойство приватным
		private $age;  // объявим свойство приватным
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age  = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?>
	</pre>
</code>
<h6>
2) Сделайте класс User, в котором будут следующие свойства только для чтения: name и surname. Начальные значения этих свойств должны устанавливаться в конструкторе. Сделайте также геттеры этих свойств.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	private $name;
	private $surname;

	public function __construct($name, $surname){
		$this->name = $name;
		$this->surname = $surname;
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User2 {
	private $name;
	private $surname;

	public function __construct($name, $surname){
		$this->name = $name;
		$this->surname = $surname;
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
}
?>
<hr/>
<h6>
3) Модифицируйте предыдущую задачу так, чтобы третьим параметром в конструктор передавалась дата рождения работника в формате год-месяц-день. Запишите ее в свойство birthday. Сделайте геттер для этого свойства.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	private $name;
	private $surname;
	private $birthday;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday;
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User3 {
	private $name;
	private $surname;
	private $birthday;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
}
?>
<hr/>
<h6>
4) Модифицируйте предыдущую задачу так, чтобы был приватный метод calculateAge, который параметром будет принимать дату рождения, а возвращать возраст с учетом того, был ли уже день рождения в этом году, или нет.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User {
	private $name;
	private $surname;
	private $birthday;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday;
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = $birthdayTimeStamp - time();
		$secondsInYear = 31536000;
		return $timeDiff / $secondsInYear;
	}
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User4 {
	private $name;
	private $surname;
	private $birthday;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = $birthdayTimeStamp - time();
		$secondsInYear = 31536000;
		return $timeDiff / $secondsInYear;
	}
}
?>
<hr/>
<h6>
5) Модифицируйте предыдущую задачу так, чтобы метод calculateAge вызывался в конструкторе объекта, рассчитывал возраст пользователя и записывал его в приватное свойство age. Сделайте геттер для этого свойства.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User{
	private $name;
	private $surname;
	private $birthday;
	private $age;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
		$this->age = $this->calculateAge();
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = $birthdayTimeStamp - time();
		$secondsInYear = 31536000;
		return $timeDiff / $secondsInYear;
	}
	public function getAge(){
		return $this->age;
	}
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User5 {
	private $name;
	private $surname;
	private $birthday;
	private $age;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
		$this->age = $this->calculateAge();
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = $birthdayTimeStamp - time();
		$secondsInYear = 31536000;
		return $timeDiff / $secondsInYear;
	}
	public function getAge(){
		return $this->age;
	}
}
?>
<h6>
6) Сделайте класс Employee, который будет наследовать от класса User. Пусть новый класс имеет свойство salary, в котором будет хранится зарплата работника. Зарплата должна передаваться четвертым параметром в конструктор объекта. Сделайте также геттер для этого свойства.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class User6 {
	private $name;
	private $surname;
	private $birthday;
	private $age;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
		$this->age = $this->calculateAge();
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = $birthdayTimeStamp - time();
		$secondsInYear = 31536000;
		return $timeDiff / $secondsInYear;
	}
	public function getAge(){
		return $this->age;
	}
}

class Employee extends User6{
	private $salary;

	public function __constract($name, $surname, $birthday, $salary) {
		parent:: __constract($name, $surname, $birthday);
		$this->salary = $salary;
	}
	public function getSalary(){
		return $this->salary;
	}
}
$emp1 = new Employee('john', 'bertoff', '1980-1-15', 2000);
echo $emp1->getAge();
echo '&lt;br/>';
echo $emp1->getSalary();
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User6 {
	private $name;
	private $surname;
	private $birthday;
	private $age;
	

	public function __construct($name, $surname, $birthday){
		$this->name = $name;
		$this->surname = $surname;
		$this->birthday = $birthday; // приходит в формате год-месяц-день.
		$this->age = $this->calculateAge();
	}
	public function getName(){
		return $this->name;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function getBirthday(){
		return $this->birthday;
	}
	private function calculateAge(){
		$birthdayTimeStamp = strtotime($this->birthday);
		$timeDiff = time() - $birthdayTimeStamp;
		// $secondsInYear = 31536000;
		$secondsInYear = 60 * 60 * 24 * 365;
		return floor($timeDiff / $secondsInYear);
	}
	public function getAge(){
		return $this->age;
	}
}

class Employee extends User6{
	private $salary;

	public function __construct($name, $surname, $birthday, $salary) {
		parent:: __construct($name, $surname, $birthday);
		$this->salary = $salary;
	}
	public function getSalary(){
		return $this->salary;
	}
}
$emp1 = new Employee('john', 'bertoff', '1980-1-15', 2000);
echo $emp1->getAge();
echo '<br/>';
echo $emp1->getSalary();
?>
<hr/>




<p class="text-center">
	<a href="/page/oop/overriding-of-parent-methods" class="p-2">Назад</a>
	<a href="/page/oop/passing-objects-by-reference"  class="p-2">Далее</a>
</p>
</main>