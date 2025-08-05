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
<p>
	Пример использования класса Arr:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr; // создаем объект
	
	$arr->add(1); // добавляем в массив число 1
	$arr->add(2); // добавляем в массив число 2
	$arr->push([3, 4]); // добавляем группу чисел
	
	echo $arr->getSum(); // находим сумму элементов массива
?>
</pre>
</code>
<p>
	Пусть теперь мы хотим сделать так, чтобы методы вызывались не отдельно, а цепочкой, вот так:
</p>
<code>
<pre>
&lt;?php
	echo $arr->add(1)->add(2)->push([3, 4])->getSum(); // это наша цель
?>
</pre>
</code>
<p>
	Для того, чтобы можно было написать такую цепочку, нужно, чтобы все методы, которые участвуют в цепочке возвращали $this (кроме последнего). Поправим наш класс Arr:
</p>
<code>
<pre>
&lt;?php
		class Arr
	{
		private $numbers = []; // массив чисел
		
		public function add($number)
		{
			$this->numbers[] = $number;
			return $this; // вернем ссылку сами на себя
		}
		
		public function push($numbers)
		{
			$this->numbers = array_merge($this->numbers, $numbers);
			return $this; // вернем ссылку сами на себя
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
	Проверим, что все работает:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	echo $arr->add(1)->add(2)->push([3, 4])->getSum(); // выведет 10
?>
</pre>
</code>
<p>
	Можно упростить еще больше:
</p>
<code>
<pre>
&lt;?php
	echo (new Arr)->add(1)->add(2)->push([3, 4])->getSum(); // выведет 10
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в мой код самостоятельно реализуйте такой же класс Arr, методы которого будут вызываться в виде цепочки.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Arr {
	private $numbers = [];


	public function add($num){
		$this->numbers[] = $num;
		return $this;
	}
	public function push($num){
			$this->numbers = array_merge($this->numbers, $num);
			return $this; // вернем ссылку сами на себя
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
}
$arr = new Arr();
echo $arr->add(1)->push([2,3])->getSum();
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
class Arr {
	private $numbers = [];


	public function add($num){
		$this->numbers[] = $num;
			return $this;
		
	}
	public function push($num){
			$this->numbers = array_merge($this->numbers, $num);
			return $this; // вернем ссылку сами на себя
	}
	public function getSum(){
		return array_sum($this->numbers);
	}
}
$arr = new Arr();
echo $arr->add(1)->push([2,3])->getSum();

?>

<hr/>




<p class="text-center">
	<a href="/page/oop/methods-chains" class="p-2">Назад</a>
	<a href="/page/oop/class-as-methods-set"  class="p-2">Далее</a>
</p>
</main>