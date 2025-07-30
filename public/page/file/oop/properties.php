<main>
	<h2 class="text-center pt-2">Работа со свойствами объектов на PHP</h2>
	<p>
		Сейчас мы с вами научимся работать с объектами и их свойствами на более практическом примере. Давайте сделаем класс
		User, который будет описывать юзера нашего сайта. Пусть у нашего пользователя будет два свойства: имя и возраст. Напишем
		код нашего класса:
	</p>
<code>
<pre>
&lt;?php
	class Car
	{
	public $name; // свойство для имени
	public $age; // свойство для возраста	}
?>
</pre>
</code>
<p>
	Пока наш класс ничего не делает - он просто описывает, что будут иметь объекты этого класса (в нашем случае каждый
	объект будет иметь имя и возраст). По сути, пока мы не создадим хотя бы один объект нашего класса - ничего полезного не
	произойдет.
	
	Давайте создадим объект нашего класса. При этом нужно иметь ввиду, что классы принято называть большими буквами, а
	объекты этих классов - маленькими:
</p>
<code>
	<pre>
&lt;?php
	// Объявляем класс:
	class User
	{
	public $name;
	public $age;
	}
	
	// Создаем объект нашего класса:
	$user = new User;
?>
	</pre>
</code>
<p>
	Давайте теперь что-нибудь запишем в свойства нашего объекта, а потом выведем эти данные на экран:
</p>
<code>
	<pre>
&lt;?php
	class User
	{
	public $name;
	public $age;
	}
	
	$user = new User; // создаем объект нашего класса
	$user->name = 'john'; // записываем имя в свойство name
	$user->age = 25; // записываем возраст в свойство age
	
	echo $user->name; // выводим записанное имя
	echo $user->age; // выводим записанный возраст
?>
	</pre>
</code>
<p>
	Как вы уже поняли - в свойства объекта можно что-то записывать и из свойств можно выводить их содержимое. Давайте теперь
	сделаем 2 объекта-юзера: 'john' и 'eric', заполним их данными и выведем на экран сумму их возрастов:
</p>
<code>
	<pre>
&lt;?php
	class User
	{
	public $name;
	public $age;
	}
	
	// Первый объект
	$user1 = new User; // создаем первый объект
	$user1->name = 'john'; // записываем имя
	$user1->age = 25; // записываем возраст
	
	// Второй объект
	$user2 = new User; // создаем второй объект
	$user2->name = 'eric'; // записываем имя
	$user2->age = 30; // записываем возраст
	
	// Найдем сумму возрастов:
	echo $user1->age + $user2->age; // выведет 55
?>
	</pre>
</code>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс Employee (работник), в котором будут следующие свойства - name (имя), age (возраст), salary (зарплата).
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
}
?>
	</pre>
</code>
<?php
class Employee {
	public $name;
	public $age;
	public $salary;
}
?>
<h6>
	2) Создайте объект класса Employee, затем установите его свойства в следующие значения - имя 'john', возраст 25, зарплата 1000.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$Employee1 = new Employee;
	$Employee1->name = 'john';
	$Employee1->age = '25';
	$Employee1->salary = '1000';
?>
	</pre>
</code>

<?php
$employee1 = new Employee;
$employee1->name ='john';
$employee1->age ='25';
$employee1->salary ='1000';
?>
<h6>
	3) Создайте второй объект класса Employee, установите его свойства в следующие значения - имя 'eric', возраст 26, зарплата 2000.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$employee2 = new Employee;
	$employee2->name = 'eric';
	$employee2->age = '26';
	$employee2->salary = '2000';
?>
	</pre>
</code>

<?php
$employee2 = new Employee;
$employee2->name = 'eric';
$employee2->age = '26';
$employee2->salary = '2000';
?>
<h6>
	4) Выведите на экран сумму зарплат созданных юзеров.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
$salarySumm = $employee1->salary + $employee2->salary;
&lt;p>Сумма зарплат работников: &lt;?=$salarySumm;?>&lt;/p>
?>
	</pre>
</code>

<?php
$salarySumm = $employee1->salary + $employee2->salary;
?>
<p>
	Результат:
</p>
<p>Сумма зарплат работников: <?=$salarySumm;?></p>
<h6>
	5) Выведите на экран сумму возрастов созданных юзеров.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
$ageSumm = $employee1->age + $employee2->age;
&lt;p>Сумма возрастов работников: &lt;?=$ageSumm;?>&lt;/p>
?>
</pre>
</code>

<?php
$ageSumm = $employee1->age + $employee2->age;
?>
<p>
	Результат:
</p>
<p>Сумма возрастов работников: <?=$ageSumm;?></p>




<p class="text-center">
	<a href="/page/oop/intro" class="p-2">Назад</a>
	<a href="/page/oop/methods"  class="p-2">Далее</a>
</p>
</main>