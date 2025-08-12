<main>
	<h2 class="text-center pt-2">Определение принадлежности объекта к классу</h2>
<p>
Сейчас мы с вами изучим оператор instanceof. Данный оператор используется для определения того, является ли текущий объект экземпляром указанного класса. 
Давайте посмотрим на примере. Пусть у нас даны какие-то два класса:
</p>
<code>
<pre>
&lt;?php
	// Первый класс:
	class Class1
	{
		
	}
	
	// Второй класс:
	class Class2
	{
		
	}
?>
</pre>
</code>
<p>
	Создадим объект первого класса:
</p>
<code>
<pre>
&lt;?php
	$obj = new Class1;
?>
</pre>
</code>
<p>
	Проверим принадлежность объекта из переменной $obj первому классу и второму:
</p>
<code>
<pre>
&lt;?php
	// Выведет true, тк объект принадлежит классу Class1:
	var_dump($obj instanceof Class1);
	
	// Выведет false, тк объект НЕ принадлежит классу Class2:
	var_dump($obj instanceof Class2);
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>
<div class="task">
	<h6>
		1) Сделайте класс Employee с публичными свойствами name (имя) и salary (зарплата).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		public $name;
		public $salary;
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Employee2 {
		public $name;
		public $salary;
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте класс Student с публичными свойствами name (имя) и scholarship (стипендия).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Student {
		public $name;
		public $scholarship;
		public function __construct($name, $scholarship){
			$this->name = $name;
			$this->salary = $scholarship;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Student {
		public $name;
		public $scholarship;
		public function __construct($name, $scholarship){
			$this->name = $name;
			$this->scholarship = $scholarship;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		3) Cоздайте по 3 объекта каждого класса и в произвольном порядке запишите их в массив $arr.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$emp1 = new Employee('john',1000);
	$emp2 = new Employee('rick',1100);
	$emp3 = new Employee('jack',1200);

	$std1 = new Student('bill',100);
	$std2 = new Student('mat',120);
	$std3 = new Student('liz',110);

	$arr = [$std2,$std1,$emp2,$std3,$emp1,$emp3];
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
$emp1 = new Employee2('john',1000);
$emp2 = new Employee2('rick',1100);
$emp3 = new Employee2('jack',1200);

$std1 = new Student('bill',100);
$std2 = new Student('mat',120);
$std3 = new Student('liz',110);

$arr = [$std2,$std1,$emp2,$std3,$emp1,$emp3];
	?>
</div>
<div class="task">
	<h6>
		4) Переберите циклом массив $arr и выведите на экран столбец имен всех работников.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if($elem instanceof Employee){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $elem){
		if($elem instanceof Employee2){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		5) Аналогичным образом выведите на экран столбец имен всех студентов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if($elem instanceof Student){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $elem){
		if($elem instanceof Student){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		6) Переберите циклом массив $arr и с его помощью найдите сумму зарплат работников и сумму стипендий студентов. После цикла выведите эти два числа на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$scholarshipSum = 0;
	$salarySum = 0;
	foreach($arr as $elem){
		if($elem instanceof Student){
			$scholarshipSum += $elem->scholarship;
		} else {
			$salarySum += $elem->salary;
		}
	}
	echo 'Сумма стипендий: '.$scholarshipSum.'&lt;br/>';
	echo 'Сумма зарплат: '.$salarySum.'&lt;br/>';
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$scholarshipSum = 0;
	$salarySum = 0;
	foreach($arr as $elem){
		if($elem instanceof Student){
			$scholarshipSum += $elem->scholarship;
		} else {
			$salarySum += $elem->salary;
		}
	}
	echo 'Сумма стипендий: '.$scholarshipSum.'<br/>';
	echo 'Сумма зарплат: '.$salarySum.'<br/>';
	?>
</div>
<h5 class="text-center mt-3">Оператор instanceof и наследование</h5>
<p>
	Пусть теперь у нас есть родительский класс и дочерний:
</p>
<code>
	<pre>
&lt;?php
	// Родительский класс:
	class ParentClass
	{
		
	}
	
	// Дочерний класс:
	class ChildClass extends ParentClass
	{
		
	}
?>
	</pre>
</code>
<p>
	Создадим объект дочернего класса:
</p>
<code>
	<pre>
&lt;?php
	$obj = new ChildClass;
?>
	</pre>
</code>
<p>
	Проверим теперь с помощью instanceof, принадлежит ли наш объект классу ParentClass и классу ChildClass:
</p>
<code>
	<pre>
&lt;?php
	var_dump($obj instanceof ChildClass);  // выведет true
	var_dump($obj instanceof ParentClass); // тоже выведет true
?>
	</pre>
</code>
<p>
	Как вы видите из примера - оператор instanceof не делает различия при проверки между родительскими и дочерними классами.
	
	Не путайтесь - если объект будет действительно родительского класса то, конечно же, проверка на принадлежность к дочернему классу вернет false:
</p>
<code>
	<pre>
&lt;?php
	$obj = new ParentClass; // объект родительского класса
	
	var_dump($obj instanceof ParentClass); // выведет true
	var_dump($obj instanceof ChildClass); // выведет false
?>
	</pre>
</code>
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		7) Сделайте класс User с публичным свойствами name и surname.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	lass User{
		public $name;
		public $surname;
		public function __construct($name, $surname) {
			$this->name = $name;
			$this->surname = $surname;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class User{
		public $name;
		public $surname;
		public function __construct($name, $surname) {
			$this->name = $name;
			$this->surname = $surname;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		8) Сделайте класс Employee, который будет наследовать от класса User и добавлять свойство salary.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee extends User{
		public $salary;
		public function __construct($salary) {
			$this->salary = $salary;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Employee extends User{
		public $salary;
		public function __construct($name, $surname, $salary) {
			$this->salary = $salary;
			parent::__construct($name,$surname);
		}
	}
	?>
</div>
<div class="task">
	<h6>
		9) Сделайте класс City с публичными свойствами name и population.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class City{
		public $name;
		public $population;
		public function __construct($name, $population) {
			$this->name = $name;
			$this->population = $population;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class City{
		public $name;
		public $population;
		public function __construct($name, $population) {
			$this->name = $name;
			$this->population = $population;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		10) Создайте 3 объекта класса User, 3 объекта класса Employee, 3 объекта класса City, и в произвольном порядке запишите их в массив $arr.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$city1 = new City('Москва', 13300000);
	$city2 = new City('Минск', 900000);
	$city3 = new City('Казань', 700000);

	$emp1 = new Employee(3000);
	$emp2 = new Employee(4000);
	$emp3 = new Employee(5000);
	
	$user1 = new User('john', 'dou');
	$user2 = new User('bart', 'simpson');
	$user3 = new User('liz', 'simpson');

	$arr = [$city1,$city2,$city3,$emp1,$emp2,$emp3,$user1,$user2,$user3];
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	$city1 = new City('Москва', 13300000);
	$city2 = new City('Минск', 900000);
	$city3 = new City('Казань', 700000);

	$emp1 = new Employee('rob', 'firs',3000);
	$emp2 = new Employee('tack', 'bind',4000);
	$emp3 = new Employee('andry', 'wils',5000);
	
	$user1 = new User('john', 'dou');
	$user2 = new User('bart', 'simpson');
	$user3 = new User('liz', 'simpson');

	$arr = [$city1,$city2,$city3,$emp1,$emp2,$emp3,$user1,$user2,$user3];
	?>
</div>
<div class="task">
	<h6>
		11) Переберите циклом массив $arr и выведите на экран столбец свойств name тех объектов, которые принадлежат классу User или потомку этого класса.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if ($elem instanceof User){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	foreach($arr as $elem){
		if ($elem instanceof User){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		12) Переберите циклом массив $arr и выведите на экран столбец свойств name тех объектов, которые принадлежат классу Employee или потомку этого класса.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if ($elem instanceof Employee){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	foreach($arr as $elem){
		if ($elem instanceof Employee){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		13) Переберите циклом массив $arr и выведите на экран столбец свойств name тех объектов, которые принадлежат именно классу User, то есть не классу City и не классу Employee.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if (!($elem instanceof Employee) and !($elem instanceof City)){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	foreach($arr as $elem){
		if (!($elem instanceof Employee) and !($elem instanceof City)){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<h5 class="text-center">Применение</h5>
<p>
	Давайте рассмотрим применение оператора instanceof на достаточно сложном примере. Пусть у нас есть вот такой класс для работников:
</p>
	<code>
		<pre>
	&lt;?php
		class Employee
	{
		private $name;
		private $salary;
		
		public function __construct($name, $salary)
		{
			$this->name = $name;
			$this->salary = $salary;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getSalary()
		{
			return $this->salary;
		}
	}
	?></pre>
	</code>
<p>
	Пусть также есть такой класс для студентов:
</p>
	<code>
		<pre>
	&lt;?php
	class Student
	{
		private $name;
		private $scholarship; // стипендия
		
		public function __construct($name, $scholarship)
		{
			$this->name = $name;
			$this->scholarship = $scholarship;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getScholarship()
		{
			return $this->scholarship;
		}
	}
	?></pre>
	</code>
	<p>
		Как вы видите, и работник, и студент имеют имя и какой-то доход: у работника это зарплата, а у студента - стипендия.
		<br/>
		Пусть теперь мы хотим сделать класс UsersCollection, предназначенный для хранения работников и студентов. Работников мы будем хранить в свойстве employees, а студентов - в свойстве students:
	</p>
		<code>
		<pre>
	&lt;?php
	class UsersCollection
	{
		private $employees = []; // массив работников
		private $students = []; // массив студентов
	}
	?></pre>
	</code>
	<p>
		Давайте теперь реализуем единый метод add для добавления и работников, и студентов. Этот метод параметром будет принимать объект и, если это работник - добавлять его в массив работников, а если студент - в массив студентов. Пример того, как мы будем пользоваться методом нашим методом после его реализации:
	</p>
			<code>
		<pre>
	&lt;?php
	$usersCollection = new UsersCollection;
	
	$usersCollection->add(new Employee('john', 200)); // попадет к работникам
	$usersCollection->add(new Student('eric', 100));  // попадет к студентам
	?></pre>
	</code>
	<p>
Итак, давайте реализуем описанный метод add. Здесь нам и поможет изученный нами оператор instanceof:
	</p>
			<code>
		<pre>
	&lt;?php
	class UsersCollection
	{
		private $employees = []; // массив работников
		private $students = [];  // массив студентов
		
		// Добавление в массивы:
		public function add($user)
		{
			// Если передан объект класса Employee:
			if ($user instanceof Employee) {
				$this->employees[] = $user; // добавляем к работникам
			}
			
			// Если передан объект класса Student:
			if ($user instanceof Student) {
				$this->students[] = $user; // добавляем к студентам
			}
		}
	}
	?></pre>
	</code>
	<p>
Давайте также реализуем методы для нахождения суммарной зарплаты и суммарной стипендии:
	</p>
			<code>
		<pre>
	&lt;?php
	class UsersCollection
	{
		private $employees = [];
		private $students = [];
		
		public function add($user)
		{
			if ($user instanceof Employee) {
				$this->employees[] = $user;
			}
			
			if ($user instanceof Student) {
				$this->students[] = $user;
			}
		}
		
		// Получаем суммарную зарплату:
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
		
		// Получаем суммарную стипендию:
		public function getTotalScholarship()
		{
			$sum = 0;
			
			foreach ($this->students as $student) {
				$sum += $student->getScholarship();
			}
			
			return $sum;
		}
	}
	?></pre>
	</code>
	<p>
		Реализуем также метод, который будет находить общую сумму платежей и работникам, и студентам:
	</p>
			<code>
		<pre>
	&lt;?php
	class UsersCollection
	{
		private $employees = [];
		private $students = [];
		
		public function add($user)
		{
			if ($user instanceof Employee) {
				$this->employees[] = $user;
			}
			
			if ($user instanceof Student) {
				$this->students[] = $user;
			}
		}
		
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
		
		public function getTotalScholarship()
		{
			$sum = 0;
			
			foreach ($this->students as $student) {
				$sum += $student->getScholarship();
			}
			
			return $sum;
		}
		
		// Получаем общую сумму платежей и работникам, и студентам:
		public function getTotalPayment()
		{
			return $this->getTotalScholarship() + $this->getTotalSalary();
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
	$usersCollection = new UsersCollection;
	
	$usersCollection->add(new Student('kyle', 100));
	$usersCollection->add(new Student('luis', 200));
	
	$usersCollection->add(new Employee('john', 300));
	$usersCollection->add(new Employee('eric', 400));
	
	// Получим полную сумму стипендий:
	echo $usersCollection->getTotalScholarship();
	
	// Получим полную сумму зарплат:
	echo $usersCollection->getTotalSalary();
	
	// Получим полную сумму платежей:
	echo $usersCollection->getTotalPayment();
	?></pre>
	</code>



	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/types-control"  class="p-2">Далее</a>
</p>
</main>