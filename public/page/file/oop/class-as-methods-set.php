<main>
	<h2 class="text-center pt-2">Класс как набор методов в ООП на PHP</h2>
	<p>
		Часто классы используются просто как набор некоторых методов, сгруппированных вместе. В этом случае нам не нужно создавать много объектов этого класса, а достаточно всего одного. Для примера давайте сделаем класс ArraySumHelper, который предоставит нам набор методов для работы с массивами. Каждый метод нашего класса будет принимать массив, что-то с ним делать и возвращать результат. Пусть у нас будет следующий набор методов:
	</p>
<code>
<pre>
&lt;?php
	class ArraySumHelper
	{
		// Сумма элементов массива:
		public function getSum1($arr)
		{
			
		}
		
		// Сумма квадратов элементов массива:
		public function getSum2($arr)
		{
			
		}
		
		// Сумма кубов элементов массива:
		public function getSum3($arr)
		{
			
		}
		
		// Сумма четвертых степеней элементов массива:
		public function getSum4($arr)
		{
			
		}
	}
?>
</pre>
</code>
<p>
Давайте посмотрим, как мы будем пользоваться нашим классом:
</p>
<code>
<pre>
&lt;?php
	$arraySumHelper = new ArraySumHelper;
	
	$arr = [1, 2, 3];
	echo $arraySumHelper->getSum1($arr);
	echo $arraySumHelper->getSum2($arr);
	echo $arraySumHelper->getSum3($arr);
	echo $arraySumHelper->getSum4($arr);
?>
</pre>
</code>
<p>
	Вот еще пример - найдем сумму квадратов элементов массива и сумму кубов и сложим результат вместе:
</p>
<code>
<pre>
&lt;?php
	$arraySumHelper = new ArraySumHelper;
	
	$arr = [1, 2, 3];
	echo $arraySumHelper->getSum2($arr) + $arraySumHelper->getSum3($arr);
?>
</pre>
</code>
<p>
	Фактически мы получаем набор функций, просто сгруппированных в одном классе. Однако, в отличие от обычного набора функций, мы можем пользоваться преимуществами ООП - например, делать вспомогательные методы приватными, чтобы они не были доступны извне класса. Давайте приступим к написанию кода нашего класса. Если обдумать реализацию методов, то становится очевидно, что они будут фактически одинаковыми, отличие будет только в степени, в которую будут возводится элементы нашего массива. Вот код, иллюстрирующий это:
</p>
<code>
<pre>
&lt;?php
	class ArraySumHelper
	{
		public function getSum1($arr)
		{
			$sum = 0;
			
			foreach ($arr as $elem) {
				$sum += $elem; // первая степень элемента - это сам элемент
			}
			
			return $sum;
		}
		
		public function getSum2($arr)
		{
			$sum = 0;
			
			foreach ($arr as $elem) {
				$sum += pow($elem, 2); // возведем во вторую степень
			}
			
			return $sum;
		}
		
		public function getSum3($arr)
		{
			$sum = 0;
			
			foreach ($arr as $elem) {
				$sum += pow($elem, 3); // возведем в третью степень
			}
			
			return $sum;
		}
		
		public function getSum4($arr)
		{
			$sum = 0;
			
			foreach ($arr as $elem) {
				$sum += pow($elem, 4); // возведем в четвертую степень
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>
<p>
	Вместо того, чтобы реализовывать каждый метод заново, давайте лучше сделаем вспомогательный приватный метод getSum, который параметрами будет принимать массив и степень и возвращать сумму степеней элементов массива:
</p>
<code>
<pre>
&lt;?php
	private function getSum($arr, $power) {
		$sum = 0;
			
		foreach ($arr as $elem) {
			$sum += pow($elem, $power);
		}
		
		return $sum;
	}
?>
</pre>
</code>
<p>
	Давайте поменяем методы нашего класса с использованием нового метода getSum:
</p>
<code>
<pre>
&lt;?php
	class ArraySumHelper
	{
		public function getSum1($arr)
		{
			return $this->getSum($arr, 1);
		}
		
		public function getSum2($arr)
		{
			return $this->getSum($arr, 2);
		}
		
		public function getSum3($arr)
		{
			return $this->getSum($arr, 3);
		}
		
		public function getSum4($arr)
		{
			return $this->getSum($arr, 4);
		}
		
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
	Наш класс ArraySumHelper больше учебный, чем реальный, но тут вам важно понять принцип - то, что часто некоторый класс может использоваться просто как набор методов и при этом создается только один объект класса. В дальнейшем мы будем разбирать более жизненные (но и более сложные) примеры.
</p>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Напишите реализацию методов класса ArrayAvgHelper, заготовки методов которого расположены ниже:
	<code>
	<pre>
&lt;?php
	class ArraySumHelper
	{
		/*
			Находит сумму первых
			степеней элементов массива:
		*/
		public function getAvg1($arr)
		{
		
		}
		
		/*
			Находит сумму вторых степеней
			элементов массива и извлекает
			из нее квадратный корень:
		*/
		public function getAvg2($arr)
		{
		
		}
		
		/*
			Находит сумму третьих степеней
			элементов массива и извлекает
			из нее кубический корень:
		*/
		public function getAvg3($arr)
		{
		
		}
		
		/*
			Находит сумму четвертых степеней
			элементов массива и извлекает
			из нее корень четвертой степени:
		*/
		public function getAvg4($arr)
		{
		
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает массив и степень и возвращает
			сумму степеней элементов массива:
		*/
		private function getSum($arr, $power)
		{
		
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает целое число и степень и возвращает
			корень заданной степени из числа:
		*/
		private function calcSqrt($num, $power)
		{
		
		}
	}
?>
	</pre>
</code>

Математическая подсказка: корень первой степени - это само число. То есть calcSqrt(число, 1) должно просто вернуть само число.

А корень любой степени можно найти с помощью функции pow, просто параметром передав ей дробь. Например, pow(число, 1/3) - так найдем корень третьей степени.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class ArraySumHelper
	{
		/*
			Находит сумму первых
			степеней элементов массива:
		*/
		public function getAvg1($arr)
		{
			return $this->getSum($arr, 1);
		}
		
		/*
			Находит сумму вторых степеней
			элементов массива и извлекает
			из нее квадратный корень:
		*/
		public function getAvg2($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 2), 2);
		}
		
		/*
			Находит сумму третьих степеней
			элементов массива и извлекает
			из нее кубический корень:
		*/
		public function getAvg3($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 3), 3);
		}
		
		/*
			Находит сумму четвертых степеней
			элементов массива и извлекает
			из нее корень четвертой степени:
		*/
		public function getAvg4($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 4), 4);
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает массив и степень и возвращает
			сумму степеней элементов массива:
		*/
		private function getSum($arr, $power)
		{
			$sum = 0;
			foreach($arr as $number){
				$sum += pow($number, $power);
			}
			return $sum;
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает целое число и степень и возвращает
			корень заданной степени из числа:
		*/
		private function calcSqrt($num, $power)
		{
			return pow($num, 1/$power);
		}
	}
		$arraySumHelper = new ArraySumHelper;
	echo $arraySumHelper->getAvg1([4,4]);
	echo '&lt;br/>';
	echo $arraySumHelper->getAvg2([4,4]);
	echo '&lt;br/>';
	echo $arraySumHelper->getAvg3([4,4]);
	echo '&lt;br/>';
	echo $arraySumHelper->getAvg4([4,4]);
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class ArraySumHelper
	{
		/*
			Находит сумму первых
			степеней элементов массива:
		*/
		public function getAvg1($arr)
		{
			return $this->getSum($arr, 1);
		}
		
		/*
			Находит сумму вторых степеней
			элементов массива и извлекает
			из нее квадратный корень:
		*/
		public function getAvg2($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 2), 2);
		}
		
		/*
			Находит сумму третьих степеней
			элементов массива и извлекает
			из нее кубический корень:
		*/
		public function getAvg3($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 3), 3);
		}
		
		/*
			Находит сумму четвертых степеней
			элементов массива и извлекает
			из нее корень четвертой степени:
		*/
		public function getAvg4($arr)
		{
			return $this->calcSqrt($this->getSum($arr, 4), 4);
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает массив и степень и возвращает
			сумму степеней элементов массива:
		*/
		private function getSum($arr, $power)
		{
			$sum = 0;
			foreach($arr as $number){
				$sum += pow($number, $power);
			}
			return $sum;
		}
		
		/*
			Вспомогательный метод, который параметром
			принимает целое число и степень и возвращает
			корень заданной степени из числа:
		*/
		private function calcSqrt($num, $power)
		{
			return pow($num, 1/$power);
		}
	}
	$arraySumHelper = new ArraySumHelper;
	echo $arraySumHelper->getAvg1([4,4]);
	echo '<br/>';
	echo $arraySumHelper->getAvg2([4,4]);
	echo '<br/>';
	echo $arraySumHelper->getAvg3([4,4]);
	echo '<br/>';
	echo $arraySumHelper->getAvg4([4,4]);
?>
<hr/>



<p class="text-center">
	<a href="/page/oop/methods-chains" class="p-2">Назад</a>
	<a href="/page/oop/classes-inheritance"  class="p-2">Далее</a>
</p>
</main>