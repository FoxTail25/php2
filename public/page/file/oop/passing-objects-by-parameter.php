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
	1) Самостоятельно повторите описанные мною классы Arr и SumHelper.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class SumHelper {
	public function getSum2($arr) {
		return $this->getSum($arr, 2);
	}
	public function getSum3($arr) {
		return $this->getSum($arr, 3);
	}
	private function getSum($arr, $pow){
		$sum = 0;
		foreach($arr as $num) {
			$sum += $num**$pow;
		}
		return $sum;
	}
}
class Arr {
	private $numbers = [];
	private $sumHelper;

		public function __construct(){
			$this->sumHelper = new SumHelper;
		}
	public function addNumber($num){
		$this->numbers[] = $num;
	}
	public function getArrSum2(){
		return $this->sumHelper->getSum2($this->numbers);
	}
	public function getArrSum3(){
		return $this->sumHelper->getSum3($this->numbers);
	}
}
$arr = new Arr;
$arr->addNumber(2);
$arr->addNumber(3);
echo $arr->getArrSum2();
echo '&lt;br/>';
echo $arr->getArrSum3();
?>
</pre>
</code>
<p>
	Результат:
</p>
<?php
class SumHelper {
	public function getSum2($arr) {
		return $this->getSum($arr, 2);
	}
	public function getSum3($arr) {
		return $this->getSum($arr, 3);
	}
	private function getSum($arr, $pow){
		$sum = 0;
		foreach($arr as $num) {
			$sum += $num**$pow;
		}
		return $sum;
	}
}
class Arr {
	private $numbers = [];
	private $sumHelper;

		public function __construct(){
			$this->sumHelper = new SumHelper;
		}
	public function addNumber($num){
		$this->numbers[] = $num;
	}
	public function getArrSum2(){
		return $this->sumHelper->getSum2($this->numbers);
	}
	public function getArrSum3(){
		return $this->sumHelper->getSum3($this->numbers);
	}
}
$arr = new Arr;
$arr->addNumber(2);
$arr->addNumber(3);
echo $arr->getArrSum2();
echo '<br/>';
echo $arr->getArrSum3();
?>
<hr/>
<h6>
	2) Создайте класс AvgHelper с методом getAvg, который параметром будет принимать массив и возвращать среднее арифметическое этого массива (сумма элементов делить на количество).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class AvgHelper {
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
}
echo (new AvgHelper)->getAvg([1,2,3])
?>	</pre>
</code>
<p>
	Результат:
</p>
<code>
	<pre>
<?php
class AvgHelper1 {
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
}
echo (new AvgHelper1)->getAvg([1,2,3])
?>
	</pre>
</code>
<hr/>
<h6>
	3) Добавьте в класс AvgHelper еще и метод getMeanSquare, который параметром будет принимать массив и возвращать среднее квадратичное этого массива (квадратный корень, извлеченный из суммы квадратов элементов, деленной на количество).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class AvgHelper {
	private $sumHelper;

	public function __construct(){
		$this->sumHelper = new SumHelper;
	}
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
	public function getMeanSquare($arr){
		return sqrt($this->sumHelper->getSum2($arr) / count($arr));
	}
}
echo (new AvgHelper)->getMeanSquare([1,2,3])
?>	</pre>
</code>
<p>
	Результат:
</p>
<code>
	<pre>
<?php
class AvgHelper2 {
	private $sumHelper;

	public function __construct(){
		$this->sumHelper = new SumHelper;
	}
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
	public function getMeanSquare($arr){
		return sqrt($this->sumHelper->getSum2($arr) / count($arr));
	}
}
echo (new AvgHelper2)->getMeanSquare([1,2,3]);
?>
	</pre>
</code>
<hr/>
<h6>
	4) Добавьте в класс Arr метод getAvgMeanSum, который будет находить сумму среднего арифметического и среднего квадратичного из массива $this->nums.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class AvgHelper {
	private $sumHelper;

	public function __construct(){
		$this->sumHelper = new SumHelper;
	}
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
	public function getMeanSquare($arr){
		return sqrt($this->sumHelper->getSum2($arr) / count($arr));
	}
	public function getAvgMeanSum($arr){
		return $this->getMeanSquare($arr) + $this->getAvg($arr);
	}
}
echo (new AvgHelper)->getAvgMeanSum([1,2,3]);
?>	</pre>
</code>
<p>
	Результат:
</p>
<code>
	<pre>
<?php
class AvgHelper3 {
	private $sumHelper;

	public function __construct(){
		$this->sumHelper = new SumHelper;
	}
	public function getAvg($arr){
		return array_sum($arr) / count($arr);
	}
	public function getMeanSquare($arr){
		return sqrt($this->sumHelper->getSum2($arr) / count($arr));
	}
	public function getAvgMeanSum($arr){
		return $this->getMeanSquare($arr) + $this->getAvg($arr);
	}
}
echo (new AvgHelper3)->getAvgMeanSum([1,2,3]);
?> </pre>
</code>
<hr/>




<p class="text-center">
	<a href="/page/oop/using-objects-in-class" class="p-2">Назад</a>
	<a href="/page/oop/"  class="p-2">Далее</a>
</p>
</main>