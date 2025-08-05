<main>
	<h2 class="text-center pt-2">Цепочки методов</h2>
	<p>
		Пусть у нас дан класс Arr, который хранит в себе массив чисел и может вычислять сумму этих чисел с помощью метода getSum. Числа могут добавляться по одному с помощью метода add, либо группой с помощью метода push:
	</p>
<code>
<pre>
&lt;?php
	class Arr
	{
		private $numbers = [];
		
		public function add($number)
		{
			$this->numbers[] = $number;
		}
		
		public function push($numbers)
		{
			$this->numbers = array_merge($this->numbers, 
				$numbers); 
		}
		
		public function getSum()
		{
			return array_sum($this->numbers);
		}
	}
?>
</pre>
</code>





<p class="text-center">
	<a href="/page/oop/methods-and-this" class="p-2">Назад</a>
	<a href="/page/oop/constructor"  class="p-2">Далее</a>
</p>
</main>