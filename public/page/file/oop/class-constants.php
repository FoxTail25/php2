<main>
	<h2 class="text-center pt-2">Константы классов в ООП на PHP</h2>
<p>
Сейчас мы с вами разберем константы классов. Константы по сути являются свойствами, значения которых нельзя изменить. Неизменяемые свойства нужны для того, чтобы хранить какие-то значения, которые являются постоянными и не должны быть случайно изменены.
Чтобы создать константу, ее нужно объявить через ключевое слово const, затем написать имя константы без доллара и обязательно сразу же задать ее значение:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		const constant = 'test'; // задаем константу
	}
?>
</pre>
</code>
<p>
Общепринято имена констант писать большими буквами, то есть не constant, а CONSTANT. Это делается для того, чтобы визуально легко было отличать константы в коде.

Давайте поправим наш класс:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		// Задаем константу:
		const CONSTANT = 'test';
	}
?>
</pre>
</code>
<p>
Давайте теперь рассмотрим, как прочитать значения константы. Здесь следует сказать то, что константы класса больше похожи не на обычные свойства, а на статические.

Это значит, что константы класса задаются один раз для всего класса, а не отдельно для каждого объекта этого класса.

Поэтому обращение к константам происходит почти так же, как и для статических свойств: пишем имя класса, два двоеточия и название константы без доллара перед именем:
</p>
<code>
<pre>
&lt;?php
echo Test::CONSTANT; // выведет 'test'
?>
</pre>
</code>
<p>
	Как уже упоминалось выше, значения констант можно прочитывать, но не записывать. Попытка что-то записать в нее выдаст ошибку:
</p>
<code>
<pre>
&lt;?php
Test::CONSTANT = 'test'; // выдаст ошибку
?>
</pre>
</code>
<h5 class="text-center mt-5">Обращение к константам внутри класса</h5>
<p>
	Внутри класса также можно обратится к константе через ::self, вот так:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		const CONSTANT = 'test';
		
		function getConstant() {
			return self::CONSTANT;
		}
	}
?>
</pre>
</code>
<p>
	Воспользуемся нашим методом:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	echo $test->getConstant(); // выведет 'test'
?>
</pre>
</code>
<h5 class="text-center mt-5">Применение</h5>
<p>
	Давайте сделаем класс Circle, с помощью которого можно будет найти площадь круга и длину окружности. Для работы с кругом нам понадобится число Пи, равное 3.14. Логично будет для хранения этого числа использовать константу, чтобы случайно где-нибудь в коде наше число Пи вдруг не поменялось.

	Вот частичная реализация нашего класса:
</p>
<code>
<pre>
&lt;?php
	class Circle
	{
		const PI = 3.14; // запишем число ПИ в константу
		private $radius; // радиус круга
		
		public function __construct($radius)
		{
			$this->radius = $radius;
		}
		
		// Найдем площадь:
		public function getSquare()
		{
			// Пи умножить на квадрат радиуса
		}
		
		// Найдем длину окружности:
		public function getCircuit()
		{
			// 2 Пи умножить на радиус
		}
	}
?>
</pre>
</code>
<div class="task">
	<h6>
		1) Реализовать класс Circle самостоятельно.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Circle {
		const PI = 3.14;
		private int $radious;

		public function __construct(int $radius){
			$this->radius = $radius;
		}
		public function getSquare(){
			return $this->radius**2 * self::PI;
		}
		public function getCircuit(){
			return 2 * self::PI * $this->radius;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Circle {
		const PI = 3.14;
		private int $radius;

		public function __construct(int $radius){
			$this->radius = $radius;
		}
		public function getSquare(){
			return $this->radius**2 * self::PI;
		}
		public function getCircuit(){
			return 2 * self::PI * $this->radius;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) С помощью написанного класса Circle найдите длину окружности и площадь круга с радиусом 10.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$circle = new Circle(10);
	echo $circle->getSquare();
	echo '&lt;br/>';
	echo $circle->getCircuit();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$circle = new Circle(10);
	echo $circle->getSquare();
	echo '<br/>';
	echo $circle->getCircuit();
	?>
</div>

	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/functions"  class="p-2">Далее</a>
</p>
</main>