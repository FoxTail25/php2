<main>
	<h2 class="text-center pt-2">Сравнение объектов в ООП на PHP</h2>
<p>
Сейчас мы с вами научимся сравнивать объекты с помощью операторов == и ===.

Вы должны уже знать, что для примитивов (то есть не объектов) оператор == сравнивает данные по значению без учета типа, а оператор === - учитывая тип:	
</p>
<code>
<pre>
&lt;?php
	var_dump(3 == 3);    // выведет true
	var_dump(3 == '3');  // выведет true
	
	var_dump(3 === 3);   // выведет true
	var_dump(3 === '3'); // выведет false
?>
</pre>
</code>
<p>
Давайте теперь посмотрим, как работает сравнение объектов.

При использовании оператора == для сравнения двух объектов выполняется сравнение свойств объектов: два объекта равны, если они имеют одинаковые свойства и их значения (значения свойств сравниваются через ==) и являются экземплярами одного и того же класса.

При сравнении через ===, переменные, содержащие объекты, считаются равными только тогда, когда они ссылаются на один и тот же экземпляр одного и того же класса.

Давайте посмотрим на примере. Пусть у нас дан вот такой класс User:
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
<p>
	Создадим два объекта нашего класса с одинаковыми значениями свойств и сравним созданные объекты:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 30);
	$user2 = new User('john', 30);
	
	var_dump($user1 == $user2); // выведет true
?>
</pre>
</code>
<p>
	Пусть теперь значения свойств одинаковые, но у них разный тип:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 30); // возраст - число
	$user2 = new User('john', '30'); // возраст - строка
	
	var_dump($user1 == $user2); // выведет true
?>
</pre>
</code>
<p>
	Пусть значения свойств разные:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 30);
	$user2 = new User('john', 25);
	
	var_dump($user1 == $user2); // выведет false
?>
</pre>
</code>
<p>
	Давайте теперь сравним два наших объекта через ===:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 30);
	$user2 = new User('john', 30);
	
	var_dump($user1 === $user2); // выведет false
?>
</pre>
</code>
<p>
	Чтобы две переменных с объектами действительно были равными при сравнении через ===, они должны указывать на один и тот же объект. Давайте сделаем, чтобы это было так, и сравним переменные:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 30);
	$user2 = $user1; // передача объекта по ссылке
	
	var_dump($user1 === $user2); // выведет true
?>
</pre>
</code>


<h6>
	1) Сделайте функцию compare, которая параметром будет принимать два объекта и возвращать true, если они имеют одинаковые свойства и значения являются экземплярами одного и того же класса, и false, если это не так.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	function comoare($ob1, $obj2) {
		return $obj1 == $obj2;
	}
?>	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<code>
	<pre>
<?php
	// function comoare($ob1, $obj2) {
	// 	return $obj1 == $obj2;
	// }
?> </pre>
</code>
<hr/>
<h6>
	2) Сделайте функцию compare, которая параметром будет принимать два объекта и возвращать true, если переданные переменные ссылаются на один и тот же объект, и false, если на разные.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	function comoare($ob1, $obj2) {
		return $obj1 === $obj2;
	}
?>	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<code>
	<pre>
<?php
	// function comoare($ob1, $obj2) {
	// 	return $obj1 === $obj2;
	// }
?> </pre>
</code>
<hr/>
<h6>
	3) Сделайте функцию compare, которая параметром будет принимать два объекта и сравнивать их. Функция должна возвращать 1, если переданные переменные ссылаются на один и тот же объект. Функция должна возвращать 0, если объекты разные, но одного и того же класса и с теми же свойствами и их значениями. Функция должна возвращать -1 в противном случае.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	function comoare($ob1, $obj2) {
		if($obj1 === $obj2){
			return 1;
		} else if($obj1 == $obj2){
			return 0;
		} else {
			return -1;
		}
	}
?>	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<code>
	<pre>
<?php
	// function comoare($ob1, $obj2) {
	// 	return $obj1 === $obj2;
	// }
?> </pre>
</code>
<hr/>
<h5>Применение</h5>
<p>
	Давайте рассмотрим применение изученной теории. Пусть у нас дан вот такой класс Employee:
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
?> </pre>
</code>
<p>
	Пусть также дан такой класс EmployeesCollection для хранения коллекции работников:
</p>
<code>
	<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = []; // массив работников
		
		// Добавляем нового работника:
		public function add($newEmployee)
		{
			$this->employees[] = $newEmployee;
		}
		
		// Получаем всех работников в виде массива:
		public function get()
		{
			return $this->employees;
		}
	}
?> </pre>
</code>
<p>
	Давайте сделаем так, чтобы работник, который уже есть в нашем наборе, не добавлялся еще раз. Для этого сделаем вспомогательный метод exists, который будет принимать объект с новым работником и проверять его наличие в массиве $this->employees:
</p>
<code>
	<pre>
&lt;?php
	private function exists($newEmployee)
	{
		foreach ($this->employees as $employee) {
			if ($employee == $newEmployee) { // сравниваем через ==
				return true;
			}
		}
		
		return false;
	}
?> </pre>
</code>
<p>
	Давайте применим новый метод в нашем классе:
</p>
<code>
	<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = [];
		
		public function add($newEmployee)
		{
			// Если такого работника нет - то добавляем:
			if (!$this->exists($newEmployee)) {
				$this->employees[] = $newEmployee;
			}
		}
		
		public function get()
		{
			return $this->employees;
		}
		
		private function exists($newEmployee)
		{
			foreach ($this->employees as $employee) {
				if ($employee == $newEmployee) {
					return true;
				}
			}
			
			return false;
		}
	}
?> </pre>
</code>
<p>
	Давайте проверим работу нашего класса:
</p>
<code>
	<pre>
&lt;?php
	$employeesCollection = new EmployeesCollection;
	
	$employeesCollection->add(new Employee('john', 100));
	$employeesCollection->add(new Employee('john', 100)); // второго такого же не добавит
	
	var_dump($employeesCollection->get()); // убедимся в этом
?> </pre>
</code>
<p>
	В общем-то, мы получили устраивающий нас код. Но давайте попробуем поиграться с ним: поменяем при сравнении двойное равно на тройное:
</p>
<code>
	<pre>
&lt;?php
	private function exists($newEmployee)
	{
		foreach ($this->products as $product) {
			if ($product === $newEmployee) { // сравниваем через ===
				return true;
			}
		}
		
		return false;
	}
?> </pre>
</code>
<p>
	Теперь при попытке добавить нового работника с такими же значениями свойств он будет добавляться:
</p>
<code>
	<pre>
&lt;?php
	$employeesCollection = new EmployeesCollection;
	
	$employeesCollection->add(new Employee('john', 100));
	$employeesCollection->add(new Employee('john', 100)); // добавит
	
	var_dump($employeesCollection->get());
?> </pre>
</code>
<p>
	Но если попытаться добавить тот же объект, то добавления не произойдет:
</p>
<code>
	<pre>
&lt;?php
	$employeesCollection = new EmployeesCollection;
	
	$employee = new Employee('john', 100);
	
	$employeesCollection->add($employee);
	$employeesCollection->add($employee); // не добавит, тк тот же объект
	
	var_dump($employeesCollection->get());
?> </pre>
</code>
<h6>
	4) Скопируйте код выше класса Employee, затем самостоятельно реализуйте описанный класс EmployeesCollection, проверьте его работу.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		private $name;
		private $salary;
		
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
		public function getName(){
			return $this->name;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
	class EmployeesCollection {
		private $employees = [];

		public function addEmployee($employee){
			if(!$this->exist($employee)) {
				$this->employees[] = $employee;
			}
		}
		private function exist($newEmployee){
			foreach($this->employees as $employee) {
				if ($newEmployee === $employee) {
					return true;
				}
				return false;
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
	class Employee
	{
		private $name;
		private $salary;
		
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
		public function getName(){
			return $this->name;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
	class EmployeesCollection {
		private $employees = [];

		public function addEmployee($employee){
			if(!$this->exist($employee)) {
				$this->employees[] = $employee;
			}
		}
		private function exist($newEmployee){
			foreach($this->employees as $employee) {
				if ($newEmployee === $employee) {
					return true;
				}
				return false;
			}
		}
	}
?>
<hr/>

<h5 class="text-center">Функция in_array</h5>
<p>
	На самом деле код метода exists можно заменить стандартной PHP функцией in_array. Нужно только знать, как она выполняет сравнение - по двойному равно или по тройному. Из документации следует, что эта функция имеет третий необязательный параметр. Если он не установлен или равен false - функция сравнивает по двойному равно, а равен true - то по тройному. Давайте упростим код класса при условии сравнения объектов через двойное равно:
</p>
<code>
	<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = [];
		
		public function add($newEmployee)
		{
			if (!in_array($newEmployee, $this->employees, false)) {
				$this->employees[] = $newEmployee;
			}
		}
		
		public function get()
		{
			return $this->employees;
		}
	}
?>
	</pre>
</code>
<p>
	А теперь при условии сравнения на тройное равно:
</p>
<code>
	<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = [];
		
		public function add($newEmployee)
		{
			// Эквивалентно методу exists с ===
			if (!in_array($newEmployee, $this->employees, true)) {
				$this->employees[] = $newEmployee;
			}
		}
		
		public function get()
		{
			return $this->employees;
		}
	}
?>
	</pre>
</code>





<p class="text-center">
	<a href="/page/oop/parent-constructor-overriding" class="p-2">Назад</a>
	<a href="/page/oop/passing-objects-by-parameter"  class="p-2">Далее</a>
</p>
</main>