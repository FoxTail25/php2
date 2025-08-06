<main>
	<h2 class="text-center pt-2">Перезапись методов родителя в классе потомке</h2>
	<p>
Пусть дан класс User с приватными свойствами name и age, а также геттерами и сеттерами этих свойств. При этом в сеттере возраста выполняется проверка возраста на то, что он равен или больше 18 лет:
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
			if ($age >= 18) {
				$this->age = $age;
			}
		}
	}
?>
</pre>
</code>
<p>
От класса User наследует класс Student с приватным свойством course, его геттером и сеттером:
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
	Предположим теперь, что метод setAge, который Student наследует от User нам чем-то не подходит, например, нам нужна также проверка того, что возраст студента до 25 лет.

То есть проверка на то, что возраст более 18 лет нас устраивает, но хотелось бы иметь добавочную проверку на то, что он меньше 25.

Для решения проблемы мы используем то, что в PHP в классе-потомке разрешено сделать метод с таким же именем, как и у родителя, таким образом переопределив этот метод родителя на свой.

Как раз то, что нам нужно.

Итак, давайте напишем свой setAge в классе Student. Наш метод будет проверять то, что возраст студента от 18 до 25 лет:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		// Перезаписываем метод родителя:
		public function setAge($age)
		{
			if ($age >= 18 and $age <= 25) {
				$this->age = $age;
			}
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
	Так как наш метод setAge использует свойство age от родителя, то в родителе это свойство надо объявить как защищенное:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		protected $age; // изменим модификатор доступа на protected
		
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
			if ($age >= 18) {
				$this->age = $age;
			}
		}
	}
?>
</pre>
</code>
<p>
	Давайте проверим работу переопределенного метода setAge:
</p>
<code>
<pre>
&lt;?php
	$student = new Student;
	
	$student->setAge(24);    // укажем корректный возраст
	echo $student->getAge(); // выведет 24 - возраст поменялся
	
	$student->setAge(30);    // укажем некорректный возраст
	echo $student->getAge(); // выведет 24 - возраст не поменялся
?>
</pre>
</code>
<h5>
	Работа с parent
</h5>
<p>
	Сейчас в нашем новом методе setAge мы выполняем проверку того, что возраст от 18 до 25 лет. Однако, проверку, того, что возраст от 18 лет выполняет и метод setAge родителя. Это значит, что если мы захотим изменить нижнюю границу возраста - нам придется сделать это в двух местах: в коде класса родителя и в коде класса потомка.

	Было бы удобно, если мы метод setAge потомка мог использовать метод setAge от родителя, ведь в методе родителя расположена часть кода, которая нам подходит и мы не хотим ее дублировать в методе потомка.

	Такое можно сделать с помощью ключевого слова parent, указывающего на родителя. С его помощью к переопределенному методу родителя можно обратиться так: parent::setAge(), то есть ключевое слово parent, затем два двоеточия и сам метод.

	Давайте доработаем наш класс Student так, чтобы использовался метод setAge родителя:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		public function setAge($age)
		{
			// Если возраст меньше или равен 25:
			if ($age <= 25) {
				// Вызываем метод родителя:
				parent::setAge($age); // в родителе выполняется проверка age >= 18
			}
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
	Мы добились того, что хотели. Более того, теперь метод setAge потомка не использует свойство age напрямую. Это значит, что в классе-родителе можно поменять его модификатор доступа с protected обратно на private.
</p>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Модифицируйте код класса User так, чтобы в методе setName выполнялась проверка того, что длина имени более 3-х символов.<br/>
	2) Добавьте в класс Student метод setName, в котором будет выполняться проверка того, что длина имени более 3-х символов и менее 10 символов. Пусть этот метод использует метод setName своего родителя, чтобы выполнить часть проверки.
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

	public function setAge($newAge){
		if($newAge>=1 and $newAge <=100){
			$this->age = $newAge;
		}
	}
	public function getAge(){
		return $this->age;
	}
	public function setName($newName){
		if(strlen($newName)>3){
			$this->name = $newName;
		}
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
	public function setName($newName){
		if(strlen($newName) < 10) {
			parent::setName($newName);
		}
	}
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class User {
	private $name;
	private $age;

	public function setAge($newAge){
		if($newAge>=1 and $newAge <=100){
			$this->age = $newAge;
		}
	}
	public function getAge(){
		return $this->age;
	}
	public function setName($newName){
		if(strlen($newName)>3){
			$this->name = $newName;
		}
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
	public function setName($newName){
		if(strlen($newName) < 10) {
			parent::setName($newName);
		}
	}
}
?>
<hr/>








<p class="text-center">
	<a href="/page/oop/access-modifier-protected" class="p-2">Назад</a>
	<a href="/page/oop/parent-constructor-overriding"  class="p-2">Далее</a>
</p>
</main>