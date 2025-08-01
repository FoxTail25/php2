<main>
	<h2 class="text-center pt-2">Хранение объектов в массивах в ООП на PHP</h2>
	<p>
		Пусть у нас дан вот такой класс User:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
Подключим файл с нашим классом к файлу index.php:
</p>
<code>
<pre>
&lt;?php
	require_once 'User.php';
?>
</pre>
</code>
<p>
Создадим три объекта нашего класса:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 21);
	$user2 = new User('eric', 22);
	$user3 = new User('kyle', 23);
?>
</pre>
</code>
<p>
	Давайте теперь запишем созданные нами объекты в массив $users:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 21);
	$user2 = new User('eric', 22);
	$user3 = new User('kyle', 23);
	
	$users[] = $user1;
	$users[] = $user2;
	$users[] = $user3;
	
	var_dump($users);
?>
</pre>
</code>
<p>
	В общем-то переменные, в которые мы сохраняем наши объекты, и не нужны. Можем сократить наш код:
</p>
<code>
<pre>
&lt;?php
	$users[] = new User('john', 21);
	$users[] = new User('eric', 22);
	$users[] = new User('kyle', 23);
	
	var_dump($users);
?>
</pre>
</code>
<p>
	Давайте теперь переделаем наш код в другом стиле - добавим элементы в массив сразу при его создании:
</p>
<code>
<pre>
&lt;?php
	$user1 = new User('john', 21);
	$user2 = new User('eric', 22);
	$user3 = new User('kyle', 23);
	
	$users = [$user1, $user2, $user3];
	var_dump($users);
?>
</pre>
</code>
<p>
	Здесь также можно избавится от промежуточных переменных:
</p>
<code>
<pre>
&lt;?php
	$users = [
		new User('john', 21),
		new User('eric', 22),
		new User('kyle', 23)
	];
	
	var_dump($users);
?>
</pre>
</code>
<p>
	Неважно каким способом мы создаем наш массив с объектами - важен сам принцип: объекты можно хранить в массивах. Затем эти объекты можно, к примеру, перебрать циклом. Давайте сделаем это:
</p>
<code>
<pre>
&lt;?php
	$users = [
		new User('john', 21),
		new User('eric', 22),
		new User('kyle', 23)
	];
	
	// Переберем созданный массив циклом:
	foreach ($users as $user) {
		echo $user->name . ' ' . $user->age . '<br>';
	}
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>
<h6>
	1) Сделайте класс City, в котором будут следующие свойства: name, population (количество населения).
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class City {
		public $name;
		public $population;
		
		public function __construct($name, $population){
		$this->name = $name;
		$this->population = $population;
		}
		public function getName(){
		return $this->name;
		}
		public function getPopulation(){
		return $this->population;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	class City {
		public $name;
		public $population;
		
		public function __construct($name, $population){
		$this->name = $name;
		$this->population = $population;
		}
		public function getName(){
		return $this->name;
		}
		public function getPopulation(){
		return $this->population;
		}
	}
?>
<hr/>
<h6>
	2) Создайте 5 объектов класса City, заполните их данными и запишите в массив.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
$cityArr = [
	new City('Москва', 13258262),
	new City('Минск', 1996730),
	new City('Казань', 1329825),
	new City('Рязань', 523200),
	new City('Коломна', 190000),
];
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
$cityArr = [
	new City('Москва', 13258262),
	new City('Минск', 1996730),
	new City('Казань', 1329825),
	new City('Рязань', 523200),
	new City('Коломна', 190000),
];
?>
<hr/>
<h6>
	3) Переберите созданный вами массив с городами циклом и выведите города и их население на экран.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
foreach($cityArr as $city){
	echo "&lt;p>город: $city->name, количество населения: $city->population&lt;/p>";
}
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
foreach($cityArr as $city){
	echo "<p>город: $city->name, количество населения: $city->population</p>";
}
?>
<hr/>












<p class="text-center">
	<a href="/page/oop/one-class-one-file" class="p-2">Назад</a>
	<a href="/page/oop/constructor-initial-properties-values"  class="p-2">Далее</a>
</p>
</main>