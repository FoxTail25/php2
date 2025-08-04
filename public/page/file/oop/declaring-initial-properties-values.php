<main>
	<h2 class="text-center pt-2">Начальные значения свойств при объявлении</h2>
	<p>
		Рассмотрим следующий класс:
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
			$this->prop1 = 'value1'; // начальное значение свойства prop1
			$this->prop2 = 'value2'; // начальное значение свойства prop2
		}
	}
	
	$test = new Test;
	echo $test->prop1; // выведет 'value1'
	echo $test->prop2; // выведет 'value2'
?>
</pre>
</code>
<p>
	Как вы видите, в этом коде в конструкторе объекта мы задаем начальные значения свойств. На самом деле можно сократить лишний код, задав начальные значения свойств прямо при их объявлении:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public $prop1 = 'value1'; // начальное значение свойства prop1
		public $prop2 = 'value2'; // начальное значение свойства prop2
	}
	
	$test = new Test;
	echo $test->prop1; // выведет 'value1'
	echo $test->prop2; // выведет 'value2'
?>
</pre>
</code>
<h5 class="text-center">Замечания</h5>
<p>
	Конечно же, не обязательно задавать начальные значения всем свойствам:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public $prop1 = 'value1'; // задаем начальное значение
		public $prop2; // не задаем
	}
?>
</pre>
</code>
<p>
	При задании начальных значений свойств можно выполнять некоторые операции (самые примитивные):
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public $prop = 1 + 2; // найдем сумму чисел
	}
	
	$test = new Test;
	echo $test->prop; // выведет 3
?>
</pre>
</code>
<h5 class="text-center">Применение</h5>
<p>
	Пусть у нас есть вот такой класс Student, в конструкторе которого задается начальное значение свойства course:
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
			$this->course = 1; // начальное значение курса
		}
		
		public function transferToNextCourse()
		{
			$this->course++;
		}
	}
?>
</pre>
</code>
<p>
	Давайте вынесем начальное значение курса в объявление свойства:
</p>
<code>
<pre>
&lt;?php
	class Student
	{
		private $name;
		private $course = 1; // начальное значение курса
		
		public function __construct($name)
		{
			$this->name = $name;
		}
		
		public function transferToNextCourse()
		{
			$this->course++;
		}
	}
?>
</pre>
</code>
<h5 class="text-center">Применение</h5>
<p>
	Пусть у нас есть вот такой класс Arr, у которого есть метод add для добавления чисел и метод getSum для получения суммы всех добавленных чисел:
</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		// Массив для хранения чисел:
		private $numbers;
		
		// Добавляет число в набор:
		public function add($num)
		{
			$this->numbers[] = $num;
		}
		
		// Находит сумму чисел набора:
		public function getSum()
		{
			return array_sum($this->numbers);
		}
	}
?>
</pre>
</code>
<p>
	Давайте воспользуемся нашим классом Arr - добавим несколько чисел и найдем их сумму:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	
	$arr->add(1);
	$arr->add(2);
	$arr->add(3);
	
	echo $arr->getSum(); // выведет 6
?>
</pre>
</code>
<p>
	Все вроде работает, но что будет, если сразу после создания вызвать метод getSum? Вот таким образом:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	echo $arr->getSum();
?>
</pre>
</code>
<p>
	Такой код вызовет ошибку, потому что функция array_sum пытается найти сумму массива из свойства numbers. Но это свойство еще не определено и имеет значение null. Это и приводит к ошибке. Давайте исправим проблему, объявив наше свойство пустым массивом:
</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $numbers = []; // задаем начальное значение свойства как []
		
		public function add($num)
		{
			$this->numbers[] = $num;
		}
		
		public function getSum()
		{
			return array_sum($this->numbers);
		}
	}
?>
</pre>
</code>
<p>
	Проверим:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	echo $arr->getSum(); // выведет 0
?>
</pre>
</code>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Реализуйте класс Arr, похожий на тот, который я реализовал выше. В отличие от моего класса метод add вашего класса параметром должен принимать массив чисел. Все числа из этого массива должны добавляться в конец массива $this->numbers.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Arr {
	private $numbers=[];

	public function add($arrNum){
		$this->numbers = array_merge($this->numbers, $arrNum);
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
}
$arr = new Arr;
$arr->add([1,2,3]);
echo $arr->getSum();
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class Arr {
	private $numbers=[];

	public function add($arrNum){
		$this->numbers = array_merge($this->numbers, $arrNum);
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
}
$arr = new Arr;
$arr->add([1,2,3]);
echo $arr->getSum();
?>
<hr/>
<h6>
	2) Реализуйте также метод getAvg, который будет находить среднее арифметическое чисел.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Arr {
	private $numbers=[];

	public function add($arrNum){
		$this->numbers = array_merge($this->numbers, $arrNum);
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
	public function getAvg(){
		return array_sum($this->numbers)/count($this->numbers);
	}
}
$arr = new Arr2;
$arr->add([1,2,3]);
?>
&lt;p>Сумма элементов: &lt;?=$arr->getSum();?> &lt;/p> 
&lt;p>Среднее арифметическое элементов: &lt;?=$arr->getAvg();?> &lt;/p> 
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class Arr2 {
	private $numbers=[];

	public function add($arrNum){
		$this->numbers = array_merge($this->numbers, $arrNum);
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
		public function getAvg(){
		return array_sum($this->numbers)/count($this->numbers);
	}
}
$arr = new Arr2;
$arr->add([1,2,3]);
?>
<p>Сумма элементов: <?=$arr->getSum();?> </p> 
<p>Среднее арифметическое элементов: <?=$arr->getAvg();?> </p> 
<hr/>





<p class="text-center">
	<a href="/page/oop/properties" class="p-2">Назад</a>
	<a href="/page/oop/methods-and-this"  class="p-2">Далее</a>
</p>
</main>