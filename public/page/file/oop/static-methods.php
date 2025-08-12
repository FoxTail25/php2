<main>
	<h2 class="text-center pt-2">Статические методы в ООП на PHP</h2>
<p>
При работе с классами можно делать методы, которые для своего вызова не требуют создания объекта. Такие методы называются статическими. Чтобы объявить метод статическим, нужно после модификатора доступа написать ключевое слово static:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		// Статический метод:
		public static function method()
		{
			return '!!!';
		}
	}
?>
</pre>
</code>
<p>
	Чтобы обратиться к статическому методу, нужно написать имя класса, потом два двоеточия и имя метода, объект класса при этом создавать не надо, вот так:
</p>
<code>
<pre>
&lt;?php
	echo Test::method(); // выведет '!!!'
?>
</pre>
</code>
<h5 class="text-center">Пример</h5>
<p>
	Давайте рассмотрим статические методы на более практическом примере. Пусть у нас дан вот такой математический класс Math (пока без статических методов):
</p>
<code>
<pre>
&lt;?php
	class Math
	{
		// Находит сумму:
		public function getSum($a, $b)
		{
			return $a + $b;
		}
		
		// Находит произведение:
		public function getProduct($a, $b)
		{
			return $a * $b;
		}
	}
?>
</pre>
</code>
<p>
	Давайте воспользуемся нашим классом:
</p>
<code>
<pre>
&lt;?php
	$math = new Math; // создаем объект класса
	echo $math->getSum(1, 2) + $math->getProduct(3, 4); // используем методы
?>
</pre>
</code>
<p>
	Наш класс Math представляет собой просто набор методов и, фактически, нам нужен только один объект этого класса. В таком случае удобно объявить методы класса статическими и вообще не создавать объект этого класса, а сразу использовать его методы. Сделаем это:
</p>
<code>
<pre>
&lt;?php
	class Math
	{
		public static function getSum($a, $b)
		{
			return $a + $b;
		}
		
		public static function getProduct($a, $b)
		{
			return $a * $b;
		}
	}
?>
</pre>
</code>
<p>
	Воспользуемся методами нашего класса без создания объекта класса:
</p>
<code>
<pre>
&lt;?php
echo Math::getSum(1, 2) + Math::getProduct(3, 4);
?>
</pre>
</code>
<h5 class="text-center">Статические методы внутри класса</h5>
<p>
	Если вы хотите использовать статические методы внутри класса, то к ним следует обращаться не через $this->, а с помощью self::.
	<br/>Для примера добавим в наш класс Math метод getDoubleSum, который будет находить удвоенную сумму чисел. Используем внутри нового метода уже существующий метод getSum:
</p>
<code>
<pre>
&lt;?php
	class Math
	{
		// Найдем удвоенную сумму:
		public static function getDoubleSum($a, $b)
		{
			return 2 * self::getSum($a, $b); // используем другой метод
		}
		
		public static function getSum($a, $b)
		{
			return $a + $b;
		}
		
		public static function getProduct($a, $b)
		{
			return $a * $b;
		}
	}
?>
</pre>
</code>
<p>
	Воспользуемся новым методом:
</p>
<code>
<pre>
&lt;?php
	echo Math::getDoubleSum(1, 2);
?>
</pre>
</code>
<h5 class="text-center">Практика</h5>
<p>
Пусть у нас дан вот такой класс ArraySumHelper, который мы рассматривали в одном из предыдущих уроков:
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
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		1) Переделайте методы класса ArraySumHelper на статические.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class ArraySumHelper{
		public static function getSum1($arr){
			return self::getSum($arr, 1);
		}		
		public static function getSum2($arr){
			return self::getSum($arr, 2);
		}		
		public static function getSum3($arr){
			return self::getSum($arr, 3);
		}		
		public static function getSum4($arr){
			return self::getSum($arr, 4);
		}	
		private static function getSum($arr, $power) {
			$sum = 0;			
			foreach ($arr as $elem) {
				$sum += pow($elem, $power);
			}		
			return $sum;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class ArraySumHelper{
		public static function getSum1($arr){
			return self::getSum($arr, 1);
		}		
		public static function getSum2($arr){
			return self::getSum($arr, 2);
		}		
		public static function getSum3($arr){
			return self::getSum($arr, 3);
		}		
		public static function getSum4($arr){
			return self::getSum($arr, 4);
		}	
		private static function getSum($arr, $power) {
			$sum = 0;			
			foreach ($arr as $elem) {
				$sum += pow($elem, $power);
			}		
			return $sum;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) Пусть дан массив с числами. Найдите с помощью класса ArraySumHelper сумму квадратов элементов этого массива.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$arr = [1,2,3,4,5];
	echo ArraySumHelper::getSum2($arr);
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$arr = [1,2,3,4,5];
	echo ArraySumHelper::getSum2($arr);
	?>
</div>


	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/static-properties"  class="p-2">Далее</a>
</p>
</main>