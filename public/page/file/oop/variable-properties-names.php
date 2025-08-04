<main>
	<h2 class="text-center pt-2">Переменные названия свойств объектов в PHP</h2>
	<p>
		Пусть у нас есть вот такой класс User:
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
	
	$user = new User('john', 21);
	echo $user->name; // выведет 'john'
?>
</pre>
</code>
<p>
На примере этого класса мы сейчас разберем то, что названия свойств можно хранить в переменной.

К примеру, пусть у нас есть переменная $prop, в которой лежит строка 'name'. Тогда обращение $user->$prop по сути эквивалентно обращению $user->name. Такое хитрое обращения к свойствам класса используется редко, но иногда бывает полезно.

Посмотрим на примере:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 21);
	
	$prop = 'name';
	echo $user->$prop; // выведет 'john'
?>
</pre>
</code>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс City, в котором будут следующие свойства - name, foundation (дата основания), population (население). Создайте объект этого класса.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class City {
		public $name;
		public $foundation;
		public $population;
		public function __construct($name, $foundation, $population){
			$this->name = $name;
			$this->foundation = $foundation;
			$this->population = $population;
		}
	}
	$moscow = new City('Москва', 1147, 13300000);
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	class City {
		public $name;
		public $foundation;
		public $population;
		public function __construct($name, $foundation, $population){
			$this->name = $name;
			$this->foundation = $foundation;
			$this->population = $population;
		}
	}
	$moskow = new City('Москва', 1147, 13300000);
?>
<hr/>

<h6>
	2) Пусть дана переменная $props, в которой хранится массив названий свойств класса City. Переберите этот массив циклом foreach и выведите на экран значения соответствующих свойств.
</h6>
<h6>
	Решение:
</h6>
<code>
	<pre>
&lt;?php
$props =['name', 'foundation', 'population'];
foreach($props as $prop){
	echo $prop.': '.$moskow->$prop.'&lt;br/>';
}
?>
	</pre>
</code>
<h6>
	Результат:
</h6>
<?php
$props =['name', 'foundation', 'population'];
foreach($props as $prop){
	echo $prop.': '.$moskow->$prop.'<br/>';
}
?>
<hr/>
<h5 class="text-center">Массив свойств</h5>
<p>Пусть теперь дан вот такой класс User:</p>
<code>
	<pre>
&lt;?php
	class User
	{
		public $surname; // фамилия
		public $name; // имя
		public $patronymic; // отчество
		
		public function __construct($surname, $name, $patronymic)
		{
			$this->surname = $surname;
			$this->name = $name;
			$this->patronymic = $patronymic;
		}
	}
?>
	</pre>
</code>
<p>
	И пусть дан массив свойств
</p>
<code>
	<pre>
&lt;?php
$props = ['surname', 'name', 'patronymic'];
?>
	</pre>
</code>
<p>
	Попробуем теперь вывести значение свойства, которое хранится в нулевом элементе массива, то есть в $props[0]. Просто так, однако, это не будет работать:
</p>
<code>
	<pre>
&lt;?php
	$user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['surname', 'name', 'patronymic'];
	echo $user->$props[0]; // так работать не будет
?>
	</pre>
</code>
<p>
	Для того, чтобы такое сложное имя свойства заработало, его нужно взять в фигурные скобки, вот так:
</p>
<code>
	<pre>
&lt;?php
	$user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['surname', 'name', 'patronymic'];
	echo $user->{$props[0]}; // выведет 'Иванов'
?>
	</pre>
</code>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Скопируйте мой код класса User и массив $props. В моем примере на экран выводится фамилия юзера. Выведите еще и имя, и отчество.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class User
	{
		public $surname; // фамилия
		public $name; // имя
		public $patronymic; // отчество
		
		public function __construct($surname, $name, $patronymic)
		{
			$this->surname = $surname;
			$this->name = $name;
			$this->patronymic = $patronymic;
		}
	}

	$user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['surname', 'name', 'patronymic'];
	echo $user->{$props[0]}.'&lt;br/>'; // выведет 'Иванов'
	echo $user->{$props[1]}.'&lt;br/>'; // выведет 'Иван'
	echo $user->{$props[2]}; // выведет 'Иванович'
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User
	{
		public $surname; // фамилия
		public $name; // имя
		public $patronymic; // отчество
		
		public function __construct($surname, $name, $patronymic)
		{
			$this->surname = $surname;
			$this->name = $name;
			$this->patronymic = $patronymic;
		}
	}

	$user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['surname', 'name', 'patronymic'];
	echo $user->{$props[0]}.'<br/>'; // выведет 'Иванов'
	echo $user->{$props[1]}.'<br/>'; // выведет 'Иван'
	echo $user->{$props[2]}; // выведет 'Иванович'
?>
<hr/>
<h5 class="text-center">Ассоциативный массив</h5>
<p>
	Массив, кстати, может быть и ассоциативным:
</p>
<code>
	<pre>
&lt;?php
	$user = new User('Иванов', 'Иван', 'Иванович');
	
	$props = ['prop1' => 'surname', 'prop2' => 'name', 'prop3' => 'patronymic'];
	echo $user->{$props['prop1']}; // выведет 'Иванов'
?>
	</pre>
</code>
<h5 class="text-center">Имя свойства из функции</h5>
<p>
	Имя свойства также может быть из функции:
</p>
<code>
	<pre>
&lt;?php
	function getProp()
	{
		return 'surname';
	}
	
	$user = new User('Иванов', 'Иван', 'Иванович');
	echo $user->{getProp()}; // выведет 'Иванов'
?>
	</pre>
</code>
<h5 class="text-center">Имя свойства из свойства другого объекта</h5>
<p>
	Имя свойства может быть даже свойством другого объекта.

Проиллюстрируем кодом. Пусть для примера дан объект Prop, который в свойстве value будет содержать название свойства объекта User:
</p>
<code>
	<pre>
&lt;?php
	class Prop
	{
		public $value;
		
		public function __construct($value)
		{
			$this->value = $value;
		}
	}
?>
	</pre>
</code>
<p>
Давайте выведем фамилию юзера с помощью объекта Prop:
</p>
<code>
	<pre>
&lt;?php
	$user = new User('Иванов', 'Иван', 'Иванович');
	$prop = new Prop('surname'); // будем выводить значение свойства surname
	
	echo $user->{$prop->value}; // выведет 'Иванов'
?>
	</pre>
</code>
<h5 class="text-center">
Имя свойства из метода другого объекта</h5>
<p>
Имя свойства также может браться из метода другого объекта:
</p>
<code>
	<pre>
&lt;?php
	class Prop
	{
		private $value;
		
		public function __construct($value)
		{
			$this->value = $value;
		}
		
		public function getValue()
		{
			return $this->value;
		}
	}
?>
	</pre>
</code>
<p>
	Давайте выведем фамилию юзера:
</p>
<code>
	<pre>
&lt;?php
	$user = new User('Иванов', 'Иван', 'Иванович');
	$prop = new Prop('surname'); // будем выводить значение свойства surname
	
	echo $user->{$prop->getValue()}; // выведет 'Иванов'
?>
	</pre>
</code>






<p class="text-center">
	<a href="/page/oop/declaring-initial-properties-values" class="p-2">Назад</a>
	<a href="/page/oop/variable-methods-names"  class="p-2">Далее</a>
</p>
</main>