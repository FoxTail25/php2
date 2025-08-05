<main>
	<h2 class="text-center pt-2">Вызов метода сразу после создания объекта</h2>
	<p>
	Пусть у нас дан класс Arr, который хранит в себе массив чисел и может вычислять сумму этих чисел с помощью метода getSum. Сами числа приходят в виде массива в конструктор объекта, а также могут добавляться по одному с помощью метода add:
	</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $numbers = []; // массив чисел
		
		public function __construct($numbers)
		{
			$this->numbers = $numbers; // записываем массив $numbers в свойство
		}
		
		// Добавляем еще одно число в наш массив:
		public function add($number)
		{
			$this->numbers[] = $number;
		}
		
		// Находим сумму чисел:
		public function getSum()
		{
			return array_sum($this->numbers);
		}
	}
?>
</pre>
</code>
<p>
Вот пример использования класса Arr:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr([1, 2, 3]); // создаем объект, записываем в него массив [1, 2, 3]
	$arr->add(4); // добавляем в конец массива число 4
	$arr->add(5); // добавляем в конец массива число 5
	
	// Находим сумму элементов массива:
	echo $arr->getSum(); // выведет 15
?>
</pre>
</code>
<p>
	Может такое быть, что все нужные числа мы передадим в момент создания объекта, а затем сразу захотим найти их сумму:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr([1, 2, 3]);
	echo $arr->getSum(); // выведет 6
?>
</pre>
</code>
<p>
Если мы больше не планируем делать никаких манипуляций с объектом, то код выше можно переписать короче: можно создать объект и сразу вызвать его метод getSum:
</p>
<code>
<pre>
&lt;?php
echo (new Arr([1, 2, 3]))->getSum(); // выведет 6
?>
</pre>
</code>
<p>
	Вот еще пример - найдем сумму двух массивов:
</p>
<code>
<pre>
&lt;?php
	echo (new Arr([1, 2, 3]))->getSum() + (new Arr([4, 5, 6]))->getSum();
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в мой код реализуйте такой же класс Arr и вызовите его метод getSum сразу после создания объекта.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Arr {
		private $numbers;

		public function __construct($num){
			$this->numbers = $num;
		}
		public function getSum(){
			return array_sum($this->numbers);
		}
	}
?>
&lt;p>Сумма 1,2,3 = &lt;?= (new Arr([1,2,3]))->getSum()?>&lt;/p>
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class Arr {
		private $numbers;

		public function __construct($num){
			$this->numbers = $num;
		}
		public function getSum(){
			return array_sum($this->numbers);
		}
	}
?>
<p>Сумма 1,2,3 = <?= (new Arr([1,2,3]))->getSum()?></p>
<hr/>

<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/methods-chains"  class="p-2">Далее</a>
</p>
</main>