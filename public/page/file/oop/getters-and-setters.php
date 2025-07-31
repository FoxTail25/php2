<main>
	<h2 class="text-center pt-2">Работа с геттерами и сеттерами в ООП на PHP</h2>
	<p>
		Давайте рассмотрим следующий класс:
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
Как вы видите, у нас есть публичные свойства name и age, публичный метод setAge для изменения возраста и приватный метод проверки возраста isAgeCorrect.
Очевидно, что предполагается, что возраст всегда будет меняться через метод setAge, так как в нем выполняется проверка возраста на корректность.
Однако, ничего не мешает сделать так:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	// Вместо вызова setAge установим некорректный возраст напрямую:
	$user->age = 100500; // и у нас получится!
?>
</pre>
</code>
<p>
	Упс... Получается, что мы надеемся, что везде и всегда возраст будет меняться через setAge, но случайно другой программист или мы сами можем напрямую обратиться к свойству и записать в него все, что угодно. Это ошибкоопасное место и с этим нужно что-то сделать. Для решения проблемы можно объявить возраст приватным:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		private $age; // объявим возраст приватным
		
		public function setAge($age)
		{
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		private function isAgeCorrect($age)
		{
			return $age >= 18 and $age <= 60;
		}
	}
?>
</pre>
</code>
<p>
	Теперь установить возраст напрямую (корректный или нет - не важно) не получится:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	// Теперь установить возраст напрямую не получится:
	$user->age = 100500; // увидим ошибку PHP!
?>
</pre>
</code>
<p>
	Отлично, мы получили то, что хотели. Но теперь есть другая проблема: мы не можем прочитать возраст снаружи, так как он приватный:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	// Правильным образом установим возраст:
	$user->setAge(50);
	
	// Попытка прочитать новый возраст приведет к ошибке PHP:
	echo $user->age; // а нам бы этого не хотелось...
?>
</pre>
</code>
<p>
	Для решения проблемы сделаем еще один метод getAge, с помощью которого мы будем прочитывать значения свойства age:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		private $age; // объявим возраст приватным
		
		// Метод для чтения возраста юзера:
		public function getAge()
		{
			return $this->age;
		}
		
		public function setAge($age)
		{
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		private function isAgeCorrect($age)
		{
			return $age >= 18 and $age <= 60;
		}
	}
?>
</pre>
</code>
<p>
	Теперь мы свободно можем и менять, и получать возраст:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	// Установим возраст:
	$user->setAge(50);
	
	// Прочитаем новый возраст:
	echo $user->getAge(); // выведет 50
?>
</pre>
</code>
<p>
	Такой подход, который мы сейчас сделали, - стандартный. Его удобно использовать тогда, когда нам нужна какая-то проверка в сеттере. В терминах этого подхода метод getAge называется геттером (англ. getter), а метод setAge - сеттером (англ. setter). Очень часто бывает так, что даже если нам не нужны никакие проверки - все равно свойство объявляется приватным, а для доступа к нему используются геттеры и сеттеры. Почему? Потому что, возможно, нам захочется добавить проверку в дальнейшем и, если все изменения свойства в коде делаются через сеттер, нам не придется вносить правки в код снаружи класса - мы просто внесем одну правку в сам сеттер.
</p>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс Employee, в котором будут следующие приватные свойства: name, age и salary.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $age;
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
	// 	private $age;
	// 	private $salary;
	// }
?>
<hr/>

<h6>
	2) Сделайте геттеры и сеттеры для всех свойств класса Employee.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $age;
		private $salary;

		public function setName($name){
			$this->name = $name;
		}
		public function getName($name){
			return $this->name;
		}
		public function setAge($age){
			$this->age = $age;
		}
		public function getAge(){
			return $this->age;
		}
		public function setSalary($salary){
			$this->salary = $salary;
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
	// class Employee {
	// 	private $name;
	// 	private $age;
	// 	private $salary;

	// 	public function setName($name){
	// 		$this->name = $name;
	// 	}
	// 	public function getName($name){
	// 		return $this->name;
	// 	}
	// 	public function setAge($age){
	// 		$this->age = $age;
	// 	}
	// 	public function getAge(){
	// 		return $this->age;
	// 	}
	// 	public function setSalary($salary){
	// 		$this->salary = $salary;
	// 	}
	// 	public function getSalary(){
	// 		return $this->salary;
	// 	}
	// }
?>
<hr/>
<h6>
	3) Дополните класс Employee приватным методом isAgeCorrect, который будет проверять возраст на корректность (от 1 до 100 лет). Этот метод должен использоваться в сеттере setAge перед установкой нового возраста (если возраст не корректный - он не должен меняться).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $age;
		private $salary;

		public function setName($name){
			$this->name = $name;
		}
		public function getName($name){
			return $this->name;
		}
		public function setAge($age){
			$this->isAgeCorrect($age);
		}
		public function getAge(){
			return $this->age;
		}
		public function setSalary($salary){
			$this->salary = $salary;
		}
		public function getSalary(){
			return $this->salary;
		}
		private function isAgeCorrect($newAge){
			if($newAge > 1 and $nameAge < 100) {
				$this->setAge($newAge);
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
	// class Employee {
	// 	private $name;
	// 	private $age;
	// 	private $salary;

	// 	public function setName($name){
	// 		$this->name = $name;
	// 	}
	// 	public function getName($name){
	// 		return $this->name;
	// 	}
	// 	public function setAge($age){
	// 		$this->isAgeCorrect($age);
	// 	}
	// 	public function getAge(){
	// 		return $this->age;
	// 	}
	// 	public function setSalary($salary){
	// 		$this->salary = $salary;
	// 	}
	// 	public function getSalary(){
	// 		return $this->salary;
	// 	}
	// 	private function isAgeCorrect($newAge){
	// 		if($newAge > 1 and $nameAge < 100) {
	// 			$this->setAge($newAge);
	// 		}
	// 	}
	// }
?>
<hr/>
<h6>
	4) Пусть зарплата наших работников хранится в долларах. Сделайте так, чтобы геттер getSalary добавлял в конец числа с зарплатой значок доллара. Говоря другими словами в свойстве salary зарплата будет хранится просто числом, но геттер будет возвращать ее с долларом на конце.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $age;
		private $salary;

		public function setName($name){
			$this->name = $name;
		}
		public function getName($name){
			return $this->name;
		}
		public function setAge($age){
			$this->isAgeCorrect($age);
		}
		public function getAge(){
			return $this->age;
		}
		public function setSalary($salary){
			$this->salary = $salary;
		}
		public function getSalary(){
			return $this->salary.'$';
		}
		private function isAgeCorrect($newAge){
			if($newAge > 1 and $nameAge < 100) {
				$this->setAge($newAge);
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
	// class Employee {
	// 	private $name;
	// 	private $age;
	// 	private $salary;

	// 	public function setName($name){
	// 		$this->name = $name;
	// 	}
	// 	public function getName($name){
	// 		return $this->name;
	// 	}
	// 	public function setAge($age){
	// 		$this->isAgeCorrect($age);
	// 	}
	// 	public function getAge(){
	// 		return $this->age;
	// 	}
	// 	public function setSalary($salary){
	// 		$this->salary = $salary;
	// 	}
	// 	public function getSalary(){
	// 		return $this->salary.'$';
	// 	}
	// 	private function isAgeCorrect($newAge){
	// 		if($newAge > 1 and $nameAge < 100) {
	// 			$this->setAge($newAge);
	// 		}
	// 	}
	// }
?>
<hr/>

<p class="text-center">
	<a href="/page/oop/access-modifiers-public-and-private" class="p-2">Назад</a>
	<a href="/page/oop/read-only-properties"  class="p-2">Далее</a>
</p>
</main>