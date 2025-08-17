<main>
	<h2 class="text-center pt-2">Магический метод toString в ООП на PHP</h2>
<p>
Методы PHP, начинающиеся с двойного подчеркивания __, называются магическим. Магия таких методов состоит в том, что они могут вызываться при совершении какого-то действия автоматически.
Первый магический метод, который мы с вами изучим, называется __toString. Он вызывается при попытке приведения экземпляра класса к строке. Давайте разберемся, что это значит. Пусть у нас дан вот такой класс User:
</p>
<code>
<pre>
&lt;?php
	class User{
		private $name;
		private $age;
		public function __construct($name, $age){
			$this->name = $name;
			$this->age = $age;
		}
		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
	}
?></pre>
</code>
<p>
	Давайте создадим объект этого класса:
</p>
<code>
<pre>
&lt;?php
$user = new User('john', 25);
?></pre>
</code>
<p>
	А теперь попытаемся вывести созданный объект через echo:
</p>
<code>
<pre>
&lt;?php
$user = new User('john', 25);
echo $user;
?></pre>
</code>
<p>
	Попытка сделать вывод объекта через echo и есть преобразование к строке. В данном случае PHP выдаст ошибку, так как просто так объекты в строку не преобразуются.
	Для того, чтобы убрать ошибку, мы должны в явном виде сказать PHP, что делать при попытке преобразовать объект в строку. Для этого и существует магический метод __toString.
	Если в коде нашего класса сделать такой метод, то результат этого метода (то есть то, что он вернет через return) и будет строковым представлением объекта.
	Пусть мы хотим, чтобы при попытке вывести объект через echo, выводилось имя юзера. Значит сделаем метод __toString и вернем в нем значение свойства name:
</p>
<code>
<pre>
&lt;?php
	class User{
		private $name;
		private $age;
		
		public function __construct($name, $age){
			$this->name = $name;
			$this->age = $age;
		}	
		// Реализуем указанный метод:
		public function __toString(){
			return $this->name;
		}		
		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
	}
?></pre>
</code>
<p>
	Проверим:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 25);
	echo $user; // выведет 'john' - все работает!
?></pre>
</code>
<div class="task">
	<h6>
		1) Сделайте класс User, в котором будут следующие свойства - name, surname, patronymic. Сделайте так, чтобы при выводе объекта через echo на экран выводилось ФИО пользователя.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class User {
		private string $name;
		private string $surname;
		private string $patronymic;
		public function __construct(string $name, string $surname, string $patronymic){
			$this->name = $name;
			$this->surname = $surname;
			$this->patronymic = $patronymic;
		}
		public function __toString(){
			return $this->surname.' '.$this->name.' '.$this->patronymic;
		}
	}
	$user = new User('Иван', 'Сидоров', 'Петрович');
	echo $user
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class User {
		private string $name;
		private string $surname;
		private string $patronymic;
		public function __construct(string $name, string $surname, string $patronymic){
			$this->name = $name;
			$this->surname = $surname;
			$this->patronymic = $patronymic;
		}
		public function __toString(){
			return $this->surname.' '.$this->name.' '.$this->patronymic;
		}
	}
	$user = new User('Иван', 'Сидоров', 'Петрович');
	echo $user
	?>
</div>
<h5 class="mt-3 text-center">Применение</h5>
<p>
	Пусть у нас есть вот такой класс, с помощью которого можно добавлять элементы в массив и находить их сумму:
</p>
<code>
<pre>
&lt;?php
	class Arr{
		private $numbers = [];
		public function add($num){
			$this->numbers[] = $num;
			return $this;
		}
		public function getSum(){
			return array_sum($this->numbers);
		}
	}
?></pre>
</code>
<p>
	Давайте вспомним, как мы пользовались этим классом:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	echo $arr->add(1)->add(2)->add(3)->getSum(); // выведет 6
?></pre>
</code>
<p>
	Как вы видите, у нас будет цепочка методов add, а последним методом мы всегда должны вызвать getSum, чтобы получить сумму.
	Давайте сделаем так, чтобы этот метод не нужно было писать, если мы выводим результат через echo. Для этого нам и пригодится изученный метод __toString.
	Есть, однако, один нюанс, мы сейчас рассмотрим. Пусть наша реализация метода __toString будет такой:
</p>
<code>
<pre>
&lt;?php
	public function __toString(){
		return array_sum($this->numbers);
	}
?></pre>
</code>
<p>
	анный код выдаст ошибку, так как __toString обязательно должен вернуть строку, а результатом array_sum будет число.
	Исправим проблему, принудительно преобразовав результат в строку:
</p>
<code>
<pre>
&lt;?php
	public function __toString(){
		return (string) array_sum($this->numbers);
	}
?></pre>
</code>
<p>
	Применим изменения:
</p>
<code>
<pre>
&lt;?php
	class Arr{
		private $numbers = [];	
		public function add($num){
			$this->numbers[] = $num;
			return $this;
		}	
		public function __toString(){
			return (string) array_sum($this->numbers);
		}
	}
?></pre>
</code>
<p>
	Проверим:
</p>
<code>
<pre>
&lt;?php
	$arr = new Arr;
	echo $arr->add(1)->add(2)->add(3); // выведет '6'
?></pre>
</code>
<div class="task">
	<h6>
		2) Не подсматривая в код выше, реализовать такой же класс Arr
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Arr {
		private array $numbers = [];
		public function add(int $num){
			$this->numbers[]=$num;
			return $this;
		}
		public function __toString(){
			return (string) array_sum($this->numbers);
		}
	}
	$arr = new Arr();
	echo $arr->add(3)->add(2);
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Arr {
		private array $numbers = [];
		public function add(int $num){
			$this->numbers[]=$num;
			return $this;
		}
		public function __toString(){
			return (string) array_sum($this->numbers);
		}
	}
	$arr = new Arr();
	echo $arr->add(3)->add(2);
	?>
</div>

<p class="text-center">
	<a href="/page/traits/functions/" class="p-2">Назад</a>
	<a href="/page/magic/get"  class="p-2">Далее</a>
</p>
</main>