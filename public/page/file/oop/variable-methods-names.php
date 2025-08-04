<main>
	<h2 class="text-center pt-2">Переменные названия методов</h2>
	<p>
		По аналогии с названиями свойств в переменной также можно хранить и имена методов. Давайте посмотрим на примере. Пусть у нас дан вот такой класс User с геттерами свойств:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?>
</pre>
</code>
<p>
Пусть в переменной $method хранится имя метода. Давайте вызовем метод с таким именем:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 21);
	
	$method = 'getName';
	echo $user->$method(); // выведет 'john'
?>
</pre>
</code>
<p>
	Если имя метода получается из массива, то такое обращение к методу следует брать в фигурные скобки вот таким образом (круглые скобки будут снаружи фигурных):
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 21);
	
	$methods = ['getName', 'getAge'];
	echo $user->{$methods[0]}(); // выведет 'john'
?>
</pre>
</code>
<p>
	Все остальные нюансы точно такие же, как и при работе со свойствами из переменной.
</p>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Пусть массив $methods будет ассоциативным с ключами method1 и method2:
<code>
	<pre class="m-0">

&lt;?php
	$methods = ['method1' => 'getName', 'method2' => 'getAge'];
?>
	</pre></code>
Выведите имя и возраст пользователя с помощью этого массива.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class User {
		private $name;
		private $age;

		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
	}
	$methods = ['method1' => 'getName', 'method2' => 'getAge'];
?>
&lt;p>Имя пользователя: &lt;?= $user->{$methods['method1']}()?>.&lt;/p> 
&lt;p>Возраст пользователя: &lt;?= $user->{$methods['method2']}()?>. &lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User {
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
	$user = new User('john', 25);
	$methods = ['method1' => 'getName', 'method2' => 'getAge'];
?>
<p>Имя пользователя: <?= $user->{$methods['method1']}()?>.</p> 
<p>Возраст пользователя: <?= $user->{$methods['method2']}()?>. </p>
<hr/>


<p class="text-center">
	<a href="/page/oop/variable-properties-names" class="p-2">Назад</a>
	<a href="/page/oop/method-call-after-object-creation"  class="p-2">Далее</a>
</p>
</main>