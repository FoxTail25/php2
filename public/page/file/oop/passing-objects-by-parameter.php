<main>
	<h2 class="text-center pt-2">Передача объектов параметрами</h2>
<p>
Пусть у нас дан вот такой класс Employee:	
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
?>
</pre>
</code>
<p>
Давайте сделаем еще и класс EmployeesCollection, который будет хранить массив работников, то есть массив объектов класса Employee.

Пусть работники будут храниться в свойстве employees, а для добавления работников будет существовать метод add. Этот метод параметром будет принимать объект класса Employee и записывать его в конец массива $this->employees:
</p>
<code>
<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = []; // массив работников, по умолчанию пустой
		
		// Добавляем нового работника:
		public function add($employee)
		{
			$this->employees[] = $employee; // $employee - объект класса Employee
		}
	}
?>
</pre>
</code>
<p>
	Давайте также добавим в наш класс метод getTotalSalary, который будет находить суммарную зарплату всех хранящихся работников:
</p>
<code>
<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = [];
		
		public function add($employee)
		{
			$this->employees[] = $employee;
		}
		
		// Находим суммарную зарплату:
		public function getTotalSalary()
		{
			$sum = 0;
			
			// Перебираем работников циклом:
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary(); // получаем з/п работника через метод getSalary()
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>
<p>
Давайте проверим работу класса EmployeesCollection:
</p>
<code>
<pre>
&lt;?php
	$employeesCollection = new EmployeesCollection;
	
	$employeesCollection->add(new Employee('john', 100));
	$employeesCollection->add(new Employee('eric', 200));
	$employeesCollection->add(new Employee('kyle', 300));
	
	echo $employeesCollection->getTotalSalary(); // выведет 600
?>
</pre>
</code>
<p>
Давайте сделаем наш класс EmployeesCollection более жизненным и добавим метод получения всех работников и метод подсчета:
</p>
<code>
<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = [];
		
		// Получаем всех работников в виде массива:
		public function get()
		{
			return $this->employees;
		}
		
		// Подсчитываем количество хранимых работников:
		public function count()
		{
			return count($this->employees);
		}
		
		public function add($employee)
		{
			$this->employees[] = $employee;
		}
		
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>


<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс Product, в котором будут приватные свойства name, price и quantity. Пусть все эти свойства будут доступны только для чтения.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Product {
	private $name;
	private $price;
	private $quantity;
	
	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getQuantity(){
		return $this->quantity;
	}
}
?>
</pre>
</code>
<p>
	Результат:
</p>
<?php
// class Product {
// 	private $name;
// 	private $price;
// 	private $quantity;

// 	public function getName(){
// 		return $this->name;
// 	}
// 	public function getPrice(){
// 		return $this->price;
// 	}
// 	public function getQuantity(){
// 		return $this->quantity;
// 	}
// }
?>
<hr/>
<h6>
	2) Добавьте в класс Product метод getCost, который будет находить полную стоимость продукта (сумма умножить на количество).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Product {
	private $name;
	private $price;
	private $quantity;
	
	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getQuantity(){
		return $this->quantity;
	}
	public function getCost(){
		return $this->price * $this->quantity;
	}
}
?>
</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class Product {
	private $name;
	private $price;
	private $quantity;

	public function getName(){
		return $this->name;
	}
	public function getPrice(){
		return $this->price;
	}
	public function getQuantity(){
		return $this->quantity;
	}
	public function getCost(){
		return $this->price * $this->quantity;
	}
}
?>
<hr/>
<h6>
	3) Сделайте класс Cart. Данный класс будет хранить список продуктов (объектов класса Product) в виде массива. Пусть продукты хранятся в свойстве products.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Cart {
	private $products = [];
}
?>
</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
// class Cart {
// 	private $products = [];
// }
?>
<hr/>
<h6>
	4) Реализуйте в классе Cart метод add для добавления продуктов.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Cart {
	private $products = [];
	
	public function addProduct($product){
		$this->products[] = $product;
	}
}
?>
</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class Cart {
	private $products = [];

	public function addProduct($product){
		$this->products[] = $product;
	}
}
?>
<hr/>




<p class="text-center">
	<a href="/page/oop/using-objects-in-class" class="p-2">Назад</a>
	<a href="/page/oop/"  class="p-2">Далее</a>
</p>
</main>