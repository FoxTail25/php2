<main>
	<h2 class="text-center pt-2">Конструктор объекта в ООП на PHP</h2>
	<p>
		Давайте рассмотрим следующий код:
	</p>
<code>
<pre>
&lt;?php
	// Класс с публичными свойствами name и age:
	class User
	{
		public $name;
		public $age;
	}
	
	// Создаем объект класса:
	$user = new User;
	
	// Записываем данные:
	$user->name = 'john';
	$user->age = 25;
	
	// Прочитываем данные:
	echo $user->name; // выведет 'john'
	echo $user->age; // выведет 25
?>
</pre>
</code>
<p>
	В данном коде не очень удобно то, что легко можно забыть записать данные в какое-нибудь свойство объекта, особенно если этих свойств много.
<br/>
Было бы удобно этот код:
</p>
<code>
<pre>
&lt;?php
	// Создаем объект класса:
	$user = new User;
	
	// Записываем данные:
	$user->name = 'john';
	$user->age = 25;
?>
</pre>
</code>
<p>
	Заменить на вот этот:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 25); // создадим объект, сразу заполнив его данными
?>
</pre>
</code>
<p>
	То есть сделать так, чтобы поля объекта заполнялись при его создании - в этом случае мы никак не сможем забыть задать значения этих полей.

	Для решения проблемы нам поможет метод конструктор с названием __construct. Суть в следующем - если в коде класса существует метод с таким названием - он будет вызываться в момент создания объекта:
</p>
<code>
<pre>
&lt;?php
		class User
	{
		public $name;
		public $age;
		
		// Конструктор объекта:
		public function __construct()
		{
			echo '!!!';
		}
	}
	
	$user = new User; // выведет '!!!'
?>
</pre>
</code>
<p>
	Конструктор в общем-то такой же метод, как и все остальные и может принимать параметры, смотрите на примере:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		public function __construct($var1, $var2)
		{
			echo $var1 + $var2; // найдем сумму параметров
		}
	}
	
	$user = new User(1, 2); // выведет 3
?>
</pre>
</code>
<p>
	Итак, давайте переделаем наш код, применив конструктор:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Конструктор объекта:
		public function __construct($name, $age)
		{
			$this->name = $name; // запишем данные в свойство name
			$this->age = $age; // запишем данные в свойство age
		}
	}
	
	$user = new User('john', 25); // создадим объект, сразу заполнив его данными
	
	echo $user->name; // выведет 'john'
	echo $user->age; // выведет 25
?>
</pre>
</code>


<h5 class="text-center">Задачи</h5>

<h6>
	1) Не подсматривая в код выше создайте такой же класс User с такими же методами.
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
		public function __construct($name, $age){
			$this->name = $name;
			$this->age = $age;
		}
	}
	$user = new User('rick', 18);
?>
&lt;p>Возраст пользователь &lt;?=$user->name?> = &lt;?=$user->age?>&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User {
		public $name;
		public $age;
		public function __construct($name, $age){
			$this->name = $name;
			$this->age = $age;
		}
	}
	$user = new User('rick', 18);
?>
<p>Возраст пользователь <?=$user->name?> = <?=$user->age?></p>
<hr/>

<h6>
	1) Создайте объект класса Employee с именем 'eric', возрастом 25, зарплатой 1000.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	class Employee {
		public $name;
		public $age;
		public $salary;
		public function __construct($name, $age, $salary){
			$this->name = $name;
			$this->age = $age;
			$this->salary = $salary;
		}
	}
	$emp = new Employee('morti', 70, 2000);
?>
&lt;p>Работник: &lt;?=$emp->name?>, возраст: &lt;?=$emp->age?>, зарплата: &lt;?=$emp->salary?>&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class Employee {
		public $name;
		public $age;
		public $salary;
		public function __construct($name, $age, $salary){
			$this->name = $name;
			$this->age = $age;
			$this->salary = $salary;
		}
	}
	$emp = new Employee('morti', 70, 2000);
?>
<p>Работник: <?=$emp->name?>, возраст: <?=$emp->age?>, зарплата: <?=$emp->salary?></p>
<hr/>

<h6>
	2) Создайте объект класса Employee с именем 'eric', возрастом 25, зарплатой 1000.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$emp1 = new Employee('kyle', 25, 1000);
?>
&lt;p>Работник: &lt;?=$emp1->name?>, возраст: &lt;?=$emp1->age?>, зарплата: &lt;?=$emp1->salary?>&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	$emp1 = new Employee('eric', 25, 1000);
?>
<p>Работник: <?=$emp1->name?>, возраст: <?=$emp1->age?>, зарплата: <?=$emp1->salary?></p>
<hr/>

<h6>
	3) Создайте объект класса Employee с именем 'kyle', возрастом 30, зарплатой 2000.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$emp2 = new Employee('kyle', 30, 2000);
?>
&lt;p>Работник: &lt;?=$emp2->name?>, возраст: &lt;?=$emp2->age?>, зарплата: &lt;?=$emp2->salary?>&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	$emp2 = new Employee('kyle', 30, 2000);
?>
<p>Работник: <?=$emp2->name?>, возраст: <?=$emp2->age?>, зарплата: <?=$emp2->salary?></p>

<h6>
	4) Выведите на экран сумму зарплат созданных вами юзеров.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$salarySumm = $emp->salary + $emp1->salary + $emp2->salary;
?>
&lt;p>Сумма зарплат созданных работников равна &lt;?=$salarySumm?>&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	$salarySumm = $emp->salary + $emp1->salary + $emp2->salary;
?>
<p>Сумма зарплат созданных работников равна <?=$salarySumm?></p>
<hr/>





<p class="text-center">
	<a href="/page/oop/access-modifiers-public-and-private" class="p-2">Назад</a>
	<a href="/page/oop/getters-and-setters"  class="p-2">Далее</a>
</p>
</main>