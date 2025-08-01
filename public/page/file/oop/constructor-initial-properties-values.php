<main>
	<h2 class="text-center pt-2">Начальные значения свойств в конструкторе</h2>
	<p>
		Пусть у нас есть какой-то класс с двумя свойствами:
	</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public $prop1;
		public $prop2;
	}
?>
</pre>
</code>
<p>
	Давайте сделаем так, чтобы при создании объекта класса эти свойства имели какие-либо значения. Как вы уже знаете, в момент создания объекта вызывается метод-конструктор. Зададим начальные значения свойства в этом методе:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public $prop1;
		public $prop2;
		
		public function __construct()
		{
			$this->prop1 = 'value1'; // начальное значение свойства
			$this->prop2 = 'value2'; // начальное значение свойства
		}
	}
	
	$test = new Test;
	echo $test->prop1; // выведет 'value1'
	echo $test->prop2; // выведет 'value2'
?>
</pre>
</code>
<h6 class="text-center">Применение</h6>
<p>
	Пусть у нас есть класс Student с двумя свойствами - name и course (курс студента). Сделаем так, чтобы имя студента приходило параметром при создании объекта, а курс автоматически принимал значение 1:
</p>
<code>
<pre>
&lt;?php
	class Student
	{
		private $name;
		private $course;
		
		public function __construct($name)
		{
			$this->name = $name;
			$this->course = 1; // курс изначально равен 1
		}
	}
?>
</pre>
</code>
<p>
	Сделаем геттеры для наших свойств:
</p>
<code>
<pre>
&lt;?php
	class Student
	{
		private $name;
		private $course;
		
		public function __construct($name)
		{
			$this->name = $name;
			$this->course = 1;
		}
		
		// Геттер имени:
		public function getName()
		{
			return $this->name;
		}
		
		// Геттер курса:
		public function getCourse()
		{
			return $this->course;
		}
	}
?>
</pre>
</code>
<p>
	Пусть имя созданного студента будет неизменяемым и доступным только для чтения, а вот для курса мы сделаем метод, который будет переводить нашего студента на следующий курс:
</p>
<code>
<pre>
&lt;?php
	class Student
	{
		private $name;
		private $course;
		
		public function __construct($name)
		{
			$this->name = $name;
			$this->course = 1;
		}
		
		// Геттер имени:
		public function getName()
		{
			return $this->name;
		}
		
		// Геттер курса:
		public function getCourse()
		{
			return $this->course;
		}
		
		// Перевод студента на новый курс:
		public function transferToNextCourse()
		{
			$this->course++;
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
	$student = new Student('john'); // создаем объект класса
	
	echo $student->getCourse(); // выведет 1 - начальное значение
	$student->transferToNextCourse(); // переведем студента на следующий курс
	echo $student->getCourse(); // выведет 2
?>
</pre>
</code>


<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в мой код реализуйте такой же класс Student.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Student {
		private $name;
		private $course;

		public function __construct($name){
			$this->name = $name;
			$this->course = 1;
		}
		public function getName(){
			return $this->name;
		}
		public function getCourse(){
			return $this->course;
		}
		public function TransferToNextCourse(){
			$this->course +=1;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Student {
	// 	private $name;
	// 	private $course;

	// 	public function __construct($name){
	// 		$this->name = $name;
	// 		$this->course = 1;
	// 	}
	// 	public function getName(){
	// 		return $this->name;
	// 	}
	// 	public function getCourse(){
	// 		return $this->course;
	// 	}
	// 	public function TransferToNextCourse(){
	// 		$this->course +=1;
	// 	}
	// }
?>
<hr/>

<h6>
	2) Модифицируйте метод transferToNextCourse так, чтобы при переводе на новый курс выполнялась проверка того, что новый курс не будет больше 5.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Student {
		private $name;
		private $course;

		public function __construct($name){
			$this->name = $name;
			$this->course = 1;
		}
		public function getName(){
			return $this->name;
		}
		public function getCourse(){
			return $this->course;
		}
		public function TransferToNextCourse(){
			if($this->course++ <= 5) {
				$this->course +=1;
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
	class Student {
		private $name;
		private $course;

		public function __construct($name){
			$this->name = $name;
			$this->course = 1;
		}
		public function getName(){
			return $this->name;
		}
		public function getCourse(){
			return $this->course;
		}
		public function TransferToNextCourse(){
			if($this->course++ <= 5) {
				$this->course +=1;
			}
		}
	}
?>
<hr/>


<p class="text-center">
	<a href="/page/oop/objects-in-array" class="p-2">Назад</a>
	<a href="/page/oop/declaring-initial-properties-values"  class="p-2">Далее</a>
</p>
</main>