<main>
	<h2 class="text-center pt-2">Использование классов внутри других классов</h2>
	<p>
	Бывает такое, что мы хотели бы использовать методы одного класса внутри другого, но не хотели бы наследовать от этого класса.

	Почему мы не хотим наследовать?

	Во-первых, используемый класс может являться вспомогательным и по логике нашего кода может не подходить на роль родителя.

	Во-вторых, мы можем захотеть использовать несколько классов внутри другого класса, а с наследованием это не получится, ведь в PHP у класса может быть только один родитель.

	Давайте посмотрим на практическом примере. Пусть у нас дан следующий класс Arr, в объект которого мы можем добавлять числа с помощью метода add:
	</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $nums = []; // массив чисел
		
		// Добавляем число в массив:
		public function add($num)
		{
			$this->nums[] = $num;
		}
	}
?>
</pre>
</code>
<p>
	Давайте теперь добавим в наш класс метод, который будет находить сумму квадратов элементов и прибавлять к ней сумму кубов элементов.

	Пусть у нас уже существует класс SumHelper, имеющий методы для нахождения сумм элементов массивов:
</p>
<code>
<pre>
&lt;?php
$user = new User('john', 30);
?>
</pre>
</code>
<code>
<pre>
&lt;?php
	class SumHelper
	{
		// Сумма квадратов:
		public function getSum2($arr)
		{
			return $this->getSum($arr, 2);
		}
		
		// Сумма кубов:
		public function getSum3($arr)
		{
			return $this->getSum($arr, 3);
		}
		
		// Вспомогательная функция для нахождения суммы:
		private function getSum($arr, $power) {
			$sum = 0;
			
			foreach ($arr as $elem) {
				$sum += pow($elem, $power);
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>
<p>
	Логично будет не реализовывать нужные нам методы еще раз в классе Arr, а воспользоваться методами класса SumHelper внутри класса Arr.

	Для этого в классе Arr внутри конструктора создадим объект класса SumHelper и запишем его в свойство sumHelper:
</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $nums = []; // массив чисел
		private $sumHelper; // сюда запишется объект класса SumHelper
		
		// Конструктор класса:
		public function __construct()
		{
			// Запишем объект вспомогательного класса в свойство:
			$this->sumHelper = new SumHelper;
		}
		
		// Добавляем число в массив:
		public function add($num)
		{
			$this->nums[] = $num;
		}
	}
?>
</pre>
</code>
<p>
	Теперь внутри Arr доступно свойство $this->sumHelper, в котором хранится объект класса SumHelper с его публичными методами и свойствами (если бы публичные свойства были, сейчас их там нет, только публичные методы).

	Создадим теперь в классе Arr метод getSum23, который будет находить сумму квадратов элементов и прибавлять к ней сумму кубов элементов, используя методы класса SumHelper:
</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $nums = [];
		private $sumHelper;
		
		public function __construct()
		{
			$this->sumHelper = new SumHelper;
		}
		
		// Находим сумму квадратов и кубов элементов массива:
		public function getSum23()
		{
			// Для краткости запишем $this->nums в переменную:
			$nums = $this->nums;
			
			// Найдем описанную сумму:
			return $this->sumHelper->getSum2($nums) + $this->sumHelper->getSum3($nums);
		}
		
		public function add($number)
		{
			$this->nums[] = $number;
		}
	}
?>
</pre>
</code>
<p>
Давайте воспользуемся созданным классом Arr:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr(); // создаем объект
	
	$arr->add(1); // добавляем в массив число 1
	$arr->add(2); // добавляем в массив число 2
	$arr->add(3); // добавляем в массив число 3
	
	// Находим сумму квадратов и кубов:
	echo $arr->getSum23();
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
	<a href="/page/oop/parent-constructor-overriding" class="p-2">Назад</a>
	<a href="/page/oop/passing-objects-by-parameter"  class="p-2">Далее</a>
</p>
</main>