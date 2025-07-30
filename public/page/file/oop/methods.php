<main>
	<h2 class="text-center pt-2">Работа с методами объектов</h2>
	<p>
		Перейдем теперь к методам. Методы - это по сути функции которые может вызывать каждый объект. При написании кода разница между методами и свойствами в том, что для методов надо писать круглые скобки в конце, а для свойств - не надо. Давайте потренируемся - сделаем метод show(), который будет выводить некоторый текст:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Создаем метод:
		public function show()
		{
			return '!!!';
		}
	}
	
	$user = new User;
	$user->name = 'john';
	$user->age = 25;
	
	// Вызовем наш метод:
	echo $user->show(); // выведет '!!!'
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в код выше, реализуйте такой же класс User с методом show().
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class User {
		public $name;
		public $age;
		public function show(){
			return '!!!';
		}
	}
	$user = new User;
	$user->name = 'rick';
	$user->age = '27';
	echo $user->show();
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User {
		public $name;
		public $age;
		public function show(){
			return '!!!';
		}
	}
	$user = new User;
	$user->name = 'rick';
	$user->age = '27';
	echo $user->show();
?>
	<h2 class="text-center pt-2">Параметры метода</h2>
	<p>
		Так как метод - это по сути обычная функция, он может принимать параметры так же, как и все функции. Давайте сделаем так, чтобы наш метод show() параметром принимал какую-нибудь строку и добавлял ей в конец '!!!':
	</p>
<code>
	<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Создаем метод:
		public function show($str)
		{
			return $str . '!!!';
		}
	}
	
	$user = new User;
	$user->name = 'john';
	$user->age = 25;
	
	// Вызовем наш метод:
	echo $user->show('hello'); // выведет 'hello!!!'
?>
	</pre>
</code>

<h6>
	2) Не подсматривая в код выше, реализуйте такой же класс User с методом show().
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class User2 {
		public $name;
		public $age;
		public function show($str){
			return $str.'!!!';
		}
	}
	$user2 = new User;
	$user2->name = 'rick';
	$user2->age = '27';
	echo $user2->show('hello');
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User2 {
		public $name;
		public $age;
		public function show($str){
			return $str.'!!!';
		}
	}
	$user2 = new User2;
	$user2->name = 'rick';
	$user2->age = '27';
	echo $user2->show('hello');
?>

<p class="text-center">
	<a href="/page/oop/properties" class="p-2">Назад</a>
	<a href="/page/oop/properties-and-this"  class="p-2">Далее</a>
</p>
</main>