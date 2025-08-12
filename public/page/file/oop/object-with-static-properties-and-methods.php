<main>
	<h2 class="text-center pt-2">Объект со статическими свойствами и методами</h2>
<p>
Вы уже знаете, что статические свойства и методы можно использовать, не создавая объект класса. На самом деле, однако, класс может содержать как статические свойства и методы, так и обычные.

Давайте посмотрим, как с этим работать и какие преимущества это дает. Пусть у нас есть класс Test одновременно и со статическим свойством, и с обычным:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public static $staticProperty; // публичное статическое свойство
		public $usualProperty; // обычное свойство
	}
?>
</pre>
</code>
<p>
Давайте, к примеру, поработаем с его обычным свойством:
</p>
<code>
<pre>
&lt;?php
	$test = new Test; // создаем объект класса
	
	$test->usualProperty = 'usual'; // записываем значение
	echo $test->usualProperty; // выведет 'usual'
?>
</pre>
</code>
<p>
	А теперь используем статическое свойство, не создавая объект этого класса:
</p>
<code>
<pre>
&lt;?php
	Test::$staticProperty = 'static'; // записываем значение
	echo Test::$staticProperty; // выведет 'static'
?>
</pre>
</code>
<p>
	На самом деле, если у нас есть переменная с объектом класса, то у этой переменной также будет доступно статическое свойство:
</p>
<code>
<pre>
&lt;?php
	$test = new Test; // создаем объект класса
	
	$test::$staticProperty = 'static'; // записываем значение
	echo $test::$staticProperty; // выведет 'static'
?>
</pre>
</code>
<p>
	Разницы нет - мы к одному и тому же статическому свойству можем обращаться и так, и так. Вот пример, иллюстрирующий это:
</p>
<code>
<pre>
&lt;?php
	// Записываем значение еще ДО создания объекта:
	Test::$staticProperty = 'static';
	
	// Cоздаем объект класса:
	$test = new Test;
	
	// Выводим статическое свойство:
	echo $test::$staticProperty; // выведет 'static'
?>
</pre>
</code>
<p>
	Вот еще пример:
</p>
<code>
<pre>
&lt;?php
	// Cоздаем объект класса:
	$test = new Test;
	
	// Записываем значение в статическое свойство:
	$test::$staticProperty  = 'static';
	
	// Выводим значение, обратившись к классу:
	echo Test::$staticProperty; // выведет 'static'
	
	// Выводим значение, обратившись к объекту класса:
	echo $test::$staticProperty; // выведет 'static'
?>
</pre>
</code>
<h5 class="text-center mt-3">Несколько объектов</h5>
<p>
	Статические свойства принадлежат не какому-то объекту класса, а самому классу, хотя объекты класса и имеют доступ к этим свойствам.

	На практике это означает то, что если у нас есть несколько объектов класса - статические свойства у них будут общие. То есть, если в одном объекте поменять значение статического свойства - изменения произойдут во всех объектах.

	Давайте посмотрим на примере:
</p>
<code>
<pre>
&lt;?php
	$test1 = new Test; // первый объект
	$test2 = new Test; // второй объект
	
	$test1::$staticProperty = 'static'; // запишем значение, используя первый объект
	
	echo $test1::$staticProperty; // выведет 'static'
	echo $test2::$staticProperty; // также выведет 'static'
?>
</pre>
</code>
<h5 class="text-center mt-3">Статические методы и $this</h5>
<p>
Пусть у нас есть класс Test с двумя свойствами, статическим и обычным:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public static $staticProperty = 'static'; // статическое свойство
		public $usualProperty = 'usual'; // обычное свойство
	}
?>
</pre>
</code>
<p>
	Давайте выведем значения этих свойств в обычном методе method:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public static $staticProperty = 'static'; // статическое свойство
		public $usualProperty = 'usual'; // обычное свойство
		
		// Обычный метод:
		public function method()
		{
			var_dump(self::$staticProperty); // выведет 'static'
			var_dump($this->usualProperty);  // выведет 'usual'
		}
	}
	
	$test = new Test;
	$test->method(); // обычный метод - вызываем через ->
?>
</pre>
</code>
<p>
	Из примера видно, что в обычном методе доступны как статические, так и обычные свойства (и методы). Пусть теперь наш метод method будет статическим. В этом случае он сможет обратиться с статическим методом и свойствам, но к обычным - нет.

	Почему: потому что внутри статических методов недоступен $this. Это происходит из-за того, что статические методы могут вызываться вне контекста объекта, просто обращаясь к имени класса.

	А ведь $this внутри класса как раз-таки ссылается на объект этого класса. Нет объекта - $this ни на что не ссылается. Убедимся в этом: переделаем наш метод на статический - теперь обращение к обычному свойству внутри нашего метода будет выдавать ошибку:
</p>
<code>
<pre>
&lt;?php
	class Test
	{
		public static $staticProperty = 'static'; // статическое свойство
		public $usualProperty = 'usual'; // обычное свойство
		
		// Переделали на статический метод:
		public static function method()
		{
			var_dump(self::$staticProperty); // выведет 'static'
			var_dump($this->usualProperty);  // выдаст ошибку
		}
	}
	
	$test = new Test;
	$test::method(); // статический метод - вызываем через ::
?>
</pre>
</code>

<h5 class="text-center mt-3">Применение</h5>
<p>
	Пусть у нас есть вот такой класс User:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		
		public function __construct($name)
		{
			$this->name = $name;
		}
	}
?>
</pre>
</code>
<p>
	Давайте сделаем так, чтобы этот класс подсчитывал количество своих объектов. Для этого сделаем статическое свойство count. Изначально запишем в него значение 0, а при создании каждого нового объекта будем увеличивать это значение на 1.

	Будем увеличивать значение нашего счетчика в конструкторе объекта:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public static $count = 0; // счетчик объектов
		public $name;
		
		public function __construct($name)
		{
			$this->name = $name;
			
			// Увеличиваем счетчик при создании объекта:
			self::$count++;
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
	$user1 = new User('user1'); // создаем первый объект класса
	echo User::$count; //выведет 1
	
	$user2 = new User('user2'); // создаем второй объект класса
	echo User::$count; //выведет 2
?>
</pre>
</code>
<div class="task">
	<h6>
		1) Не подсматривая в код выше реализуйте такой же класс User, подсчитывающий количество своих объектов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class User {
		private static $quantity = 0;
		public static function getQuantity(){
			return self::$quantity;
		}

		private $name;
		private $age;

		public function __construct(string $name, int $age){
			$this->name = $name;
			$this->age = $age;
			self::$quantity++;
		}
	}
	echo User::getQuantity();
	echo '&lt;br/>';
	$user1 = new User('patrick',20);
	$user2 = new User('john',20);
	echo User::getQuantity();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class User {
		private static $quantity = 0;
		public static function getQuantity(){
			return self::$quantity;
		}

		private $name;
		private $age;

		public function __construct(string $name, int $age){
			$this->name = $name;
			$this->age = $age;
			self::$quantity++;
		}
	}
	echo User::getQuantity();
	echo '<br/>';
	$user1 = new User('patrick',20);
	$user2 = new User('john',20);
	echo User::getQuantity();
	?>
</div>

	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/class-constants"  class="p-2">Далее</a>
</p>
</main>