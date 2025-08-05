<main>
	<h2 class="text-center pt-2">Модификаторы доступа public и private в PHP</h2>
	<p>
		Ключевое слово public, которое мы пишем перед именами указывает на то, что данные свойства и методы доступны извне (вне кода класса). В противоположность ключевое слово private, которое указывает на то, что свойства и методы недоступны извне.
		Зачем это надо? К примеру, у нас есть класс, реализующий некоторый функционал. Есть набор методов, но часть этих методов является вспомогательными.

		Будет лучше, чтобы эти вспомогательные методы нельзя было использовать вне нашего класса. В этом случае мы легко сможем поредактировать код этих вспомогательных методов и будем уверенными в том, что их снаружи никто не использует и ничего страшного не случится.

		Такой подход называется инкапсуляцией - все лишнее не должно быть доступно извне, в этом случае жизнь программиста станет проще.

		То же самое касается и свойств. Некоторые свойства выполняют чисто вспомогательную функцию и не должны быть доступны вне класса, иначе мы их можем случайно поменять снаружи и сломать работу нашего кода.

		Методы и свойства, которые мы хотим сделать недоступными извне, называются приватными и объявляются с помощью ключевого слова private.

		Давайте попробуем - объявим свойства $name и $age приватными и попытаемся обратиться к ним снаружи - мы сразу увидим ошибку:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
	}
	
	$user = new User;
	
	// Выдаст ошибку, так как свойство name - private:
	$user->name = 'john';
?>
</pre>
</code>

<h5 class="text-center">Применение на практике</h5>
<p>
	Давайте посмотрим на класс User, который мы сделали в предыдущем уроке:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для проверки возраста:
		public function isAgeCorrect($age)
		{
			return $age >= 18 and $age <= 60;
		}
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$newAge = $this->age + $years; // вычислим новый возраст
			
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($newAge)) {
				$this->age = $newAge; // обновим, если новый возраст прошел проверку
			}
		}
	}
?>
</pre>
</code>
<p>
	Как мы знаем, метод isAgeCorrect является вспомогательным и мы не планируем использовать его снаружи класса. Логично сделать его приватным, чтобы другой программист, который будет потом работать над нашим проектом (или мы сами через некоторое время) случайно не использовал этот метод снаружи класса.
<br/>
Сделаем это:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Объявим приватным:
		private function isAgeCorrect($age)
		{
			return $age >= 18 and $age <= 60;
		}
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$newAge = $this->age + $years; // вычислим новый возраст
			
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($newAge)) {
				$this->age = $newAge; // обновим, если новый возраст прошел проверку
			}
		}
	}
?>
</pre>
</code>
<p>
	Обычно все приватные методы размещают в конце класса, давайте перенесем наш метод в самый низ:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$newAge = $this->age + $years; // вычислим новый возраст
			
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($newAge)) {
				$this->age = $newAge; // обновим, если новый возраст прошел проверку
			}
		}
		
		// Метод для проверки возраста:
		private function isAgeCorrect($age)
		{
			return $age >= 18 and $age <= 60;
		}
	}
?>
</pre>
</code>
<p>
	Существует специальное правило: если вы делаете новый метод и не знаете, сделать его публичным или приватным, - делайте приватным. В дальнейшем, если он понадобится снаружи, - вы поменяете его на публичный.
<br/>
	Еще раз резюмируем: слова public и private не нужны для реализации логики программы, а нужны для того, чтобы уберечь программистов от ошибок.
</p>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в код выше внесите такие же правки в класс User.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class User {
		public $name;
		public $age;
		public function addAge($age){
			$newAge = $this->age + $age;
			$this->isCorrectAge($newAge);
		}
		public function setAge($age){
			$newAge = $age;
			$this->isCorrectAge($newAge);
		}
		private function isCorrectAge($newAge){
			if($newAge >= 18 and $newAge <=60) {
				$this->age = $newAge;
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
		public $name;
		public $age;
		public function addAge($age){
			$newAge = $this->age + $age;
			$this->isCorrectAge($newAge);
		}
		public function setAge($age){
			$newAge = $age;
			$this->isCorrectAge($newAge);
		}
		private function isCorrectAge($newAge){
			if($newAge >= 18 and $newAge <=60) {
				$this->age = $newAge;
			}
		}
	}
?>
<hr/>

<h6>
	2) Попробуйте вызвать метод isAgeCorrect снаружи класса. Убедитесь, что это будет вызывать ошибку.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
 $user = new User;
 $user->isCorrectAge(30);
?>
</pre>
</code>
<p>
	Fatal error: Uncaught Error: Call to private method User::isCorrectAge() from global scope in C:\OSPanel\home\php2\public\page\file\oop\access-modifiers-public-and-private.php:236 Stack trace: #0 C:\OSPanel\home\php2\public\page\slug2.php(7): include() #1 C:\OSPanel\home\php2\public\page\slug2.php(12): getFile('page/file/oop/a...') #2 C:\OSPanel\home\php2\public\index.php(17): include('C:\\OSPanel\\home...') #3 {main} thrown in C:\OSPanel\home\php2\public\page\file\oop\access-modifiers-public-and-private.php on line 236
</p>
<!-- <p>
	Результат:
</p> -->
<?php
// $user = new User;
// $user->isCorrectAge(30);
?>
<hr/>

<h6>
	3) Сделайте класс Student со свойствами $name и $course (курс студента, от 1-го до 5-го).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Studen {
		public $name;
		public function setCourse($newCourse){
			$this->isCorrectCourse($newCourse);
		}
		private $course;
		private function isCorrectCourse($course){
			if($course <=5 and $course >=1) {
				$this->course = $course;
			}
		}
	}
?>
</pre>
</code>

<p>
	Результат:
</p>
<?php
	// class Studen {
	// 	public $name;
	// 	public function setCourse($newCourse){
	// 		$this->isCorrectCourse($newCourse);
	// 	}
	// 	private $course;
	// 	private function isCorrectCourse($course){
	// 		if($course <=5 and $course >=1) {
	// 			$this->course = $course;
	// 		}
	// 	}
	// }
?>
<hr/>

<h6>
	4) В классе Student сделайте public метод transferToNextCourse, который будет переводить студента на следующий курс.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Studen {
		public $name;
		public function setCourse($newCourse){
			$this->isCorrectCourse($newCourse);
		}
		public function transferToNextCourse(){
			$newCourse = $this->course + 1;
			$this->isCorrectCourse($newCourse);
		}

		private $course;
		private function isCorrectCourse($course){
			if($course <=5 and $course >=1) {
				$this->course = $course;
			}
		}
	}
?>
</pre>
</code>

<p>
	Результат:
</p>
<?php
	class Studen {
		public $name;
		public function setCourse($newCourse){
			$this->isCorrectCourse($newCourse);
		}
		public function transferToNextCourse(){
			$newCourse = $this->course + 1;
			$this->isCorrectCourse($newCourse);
		}

		private $course;
		private function isCorrectCourse($course){
			if($course <=5 and $course >=1) {
				$this->course = $course;
			}
		}
	}
?>
<hr/>











<p class="text-center">
	<a href="/page/oop/methods-and-this" class="p-2">Назад</a>
	<a href="/page/oop/constructor"  class="p-2">Далее</a>
</p>
</main>