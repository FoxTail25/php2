<main>
	<h2 class="text-center pt-2">Статические свойства в ООП на PHP</h2>
<p>
Кроме статических методов можно также делать и статические свойства. Такие свойства также объявляются с помощью ключевого слова static:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public static $property; // статическое свойство
	}
?>
</pre>
</code>
<p>
Можно что-то записать в статическое свойство и прочитать из него. При этом имя свойства указывается вместе с долларом:
</p>
<code>
<pre>
&lt;?php
	Test::$property = 'test';
	echo Test::$property; // выведет 'test'
?>
</pre>
</code>
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		1) Сделайте класс Num, у которого будут два публичных статических свойства: num1 и num2. Запишите в первое свойство число 2, а во второе - число 3. Выведите сумму значений свойств на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Num {
		public static $num1;
		public static $num2;
	}
	Num::$num1 = 2;
	Num::$num2 = 3;
	echo Num::$num1 + Num::$num2;
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Num_1 {
	public static $num1;
	public static $num2;
}
Num_1::$num1 = 2;
Num_1::$num2 = 3;
echo Num_1::$num1 + Num_1::$num2;
	?>
</div>
<h5 class="text-center mt-3">Статическое свойство внутри класса</h5>
<p>
	Можно также обращаться к статическим свойствам внутри самого класса, используя self::, смотрите пример:
</p>
<code>
<pre>&lt;?php
	class Test
	{
		// Приватное статическое свойство:
		private static $property;
		
		// Статический метод для задания значения свойства:
		public static function setProperty($value)
		{
			self::$property = $value; // записываем данные в наше static свойство
		}
		
		// Статический метод для получения значения свойства:
		public static function getProperty()
		{
			return self::$property; // прочитываем записанные данные
		}
	}
?></pre>
</code>
<p>
	оспользуемся нашим классом:
</p>
<code>
<pre>&lt;?php
	Test::setProperty('test'); // запишем данные в свойство
	echo Test::getProperty(); // выведем на экран
?></pre>
</code>
<p>
	Можно также задать начальное значение свойства:
</p>
<code>
<pre>&lt;?php
	class Test
	{
		// Начальное значение свойства:
		private static $property = 'test';
		
		public static function getProperty()
		{
			return self::$property;
		}
	}
	
	echo Test::getProperty(); // выведет 'test'
?></pre>
</code>
<div class="task">
	<h6>
		2) Сделайте класс Num, у которого будут два приватны статических свойства: num1 и num2. Пусть по умолчанию в свойстве num1 хранится число 2, а в свойстве num2 - число 3.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Num {
	private static $num1=2;
	private static $num2=3;
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
// class Num {
// 	private static $num1=2;
// 	private static $num2=3;
// }
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте в классе Num метод getSum, который будет выводить на экран сумму значений свойств num1 и num2.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Num {
		private static $num1=2;
		private static $num2=3;

		public function getSum(){
			return self::$num1 + self::$num2;
		}
	}
	echo (new Num)->getSum();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Num_2 {
	private static $num1=2;
	private static $num2=3;

	public function getSum(){
		return self::$num1 + self::$num2;
	}
}
echo (new Num_2)->getSum();
	?>
</div>
<h5 class="text-center mt-5">Применение</h5>
<p>
	Пусть у нас есть класс Geometry для работы с геометрическими фигурами. В этом классе есть методы для определения площади круга и длины окружности:
</p>
<code>
	<pre>
&lt;?php
class Geometry
{
	// Площадь круга:
	public static function getCircleSquare($radius)
	{
		return 3.14 * $radius * $radius;
	}
	
	// Длина окружности:
	public static function getCircleСircuit($radius)
	{
		return 2 * 3.14 * $radius;
	}
}
?></pre>
</code>
<p>
	Как вы видите, в обоих методах используется число Пи, равное 3.14. Было бы удобно вынести это число в статическое свойство класса - в этом случае значение числа Пи будет задаваться в одном месте и мы легко сможем поменять его в случае необходимости (например, написать больше знаков в дробной части).

Давайте сделаем это:
</p>
<code>
	<pre>
&lt;?php
	class Geometry
	{
		private static $pi = 3.14; // вынесем Пи в свойство
		
		public static function getCircleSquare($radius)
		{
			return self::$pi * $radius * $radius;
		}
		
		public static function getCircleСircuit($radius)
		{
			return 2 * self::$pi * $radius;
		}
	}
?></pre>
</code>
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		4) Добавьте в наш класс Geometry метод, который будет находить объем шара по радиусу. С помощью этого метода выведите на экран объем шара с радиусом 10.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Geometry
	{
		private static $pi = 3.14; // вынесем Пи в свойство
		
		public static function getCircleSquare($radius)
		{
			return self::$pi * $radius * $radius;
		}
		
		public static function getCircleСircuit($radius)
		{
			return 2 * self::$pi * $radius;
		}
		public static function getCircleVolume($radius)
		{
			return  self::$pi * ($radius**3) * (3/4);
		}
	}
	?>
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	// class Geometry
	// {
	// 	private static $pi = 3.14; // вынесем Пи в свойство
		
	// 	public static function getCircleSquare($radius)
	// 	{
	// 		return self::$pi * $radius * $radius;
	// 	}
		
	// 	public static function getCircleСircuit($radius)
	// 	{
	// 		return 2 * self::$pi * $radius;
	// 	}
	// 	public static function getCircleVolume($radius)
	// 	{
	// 		return  self::$pi * ($radius**3) * (3/4);
	// 	}
	// }
	// ?>
</div>

	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/object-with-static-properties-and-methods"  class="p-2">Далее</a>
</p>
</main>