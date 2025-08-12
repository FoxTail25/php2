<main>
	<h2 class="text-center pt-2">Определение принадлежности объекта к классу</h2>
<p>
Сейчас мы с вами изучим оператор instanceof. Данный оператор используется для определения того, является ли текущий объект экземпляром указанного класса. 
Давайте посмотрим на примере. Пусть у нас даны какие-то два класса:
</p>
<code>
<pre>
&lt;?php
	// Первый класс:
	class Class1
	{
		
	}
	
	// Второй класс:
	class Class2
	{
		
	}
?>
</pre>
</code>
<p>
	Создадим объект первого класса:
</p>
<code>
<pre>
&lt;?php
	$obj = new Class1;
?>
</pre>
</code>
<p>
	Проверим принадлежность объекта из переменной $obj первому классу и второму:
</p>
<code>
<pre>
&lt;?php
	// Выведет true, тк объект принадлежит классу Class1:
	var_dump($obj instanceof Class1);
	
	// Выведет false, тк объект НЕ принадлежит классу Class2:
	var_dump($obj instanceof Class2);
?>
</pre>
</code>
<h5 class="text-center">Задачи</h5>
<div class="task">
	<h6>
		1) Сделайте класс Employee с публичными свойствами name (имя) и salary (зарплата).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		public $name;
		public $salary;
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Employee2 {
		public $name;
		public $salary;
		public function __construct($name, $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте класс Student с публичными свойствами name (имя) и scholarship (стипендия).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Student {
		public $name;
		public $scholarship;
		public function __construct($name, $scholarship){
			$this->name = $name;
			$this->salary = $scholarship;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Student {
		public $name;
		public $scholarship;
		public function __construct($name, $scholarship){
			$this->name = $name;
			$this->scholarship = $scholarship;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		3) Cоздайте по 3 объекта каждого класса и в произвольном порядке запишите их в массив $arr.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$emp1 = new Employee('john',1000);
	$emp2 = new Employee('rick',1100);
	$emp3 = new Employee('jack',1200);

	$std1 = new Student('bill',100);
	$std2 = new Student('mat',120);
	$std3 = new Student('liz',110);

	$arr = [$std2,$std1,$emp2,$std3,$emp1,$emp3];
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
$emp1 = new Employee2('john',1000);
$emp2 = new Employee2('rick',1100);
$emp3 = new Employee2('jack',1200);

$std1 = new Student('bill',100);
$std2 = new Student('mat',120);
$std3 = new Student('liz',110);

$arr = [$std2,$std1,$emp2,$std3,$emp1,$emp3];
	?>
</div>
<div class="task">
	<h6>
		4) Переберите циклом массив $arr и выведите на экран столбец имен всех работников.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if($elem instanceof Employee){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $elem){
		if($elem instanceof Employee2){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		5) Аналогичным образом выведите на экран столбец имен всех студентов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $elem){
		if($elem instanceof Student){
			echo $elem->name.'&lt;br/>';
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $elem){
		if($elem instanceof Student){
			echo $elem->name.'<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		6) Переберите циклом массив $arr и с его помощью найдите сумму зарплат работников и сумму стипендий студентов. После цикла выведите эти два числа на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$scholarshipSum = 0;
	$salarySum = 0;
	foreach($arr as $elem){
		if($elem instanceof Student){
			$scholarshipSum += $elem->scholarship;
		} else {
			$salarySum += $elem->salary;
		}
	}
	echo 'Сумма стипендий: '.$scholarshipSum.'&lt;br/>';
	echo 'Сумма зарплат: '.$salarySum.'&lt;br/>';
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$scholarshipSum = 0;
	$salarySum = 0;
	foreach($arr as $elem){
		if($elem instanceof Student){
			$scholarshipSum += $elem->scholarship;
		} else {
			$salarySum += $elem->salary;
		}
	}
	echo 'Сумма стипендий: '.$scholarshipSum.'<br/>';
	echo 'Сумма зарплат: '.$salarySum.'<br/>';
	?>
</div>
<h5 class="text-center mt-3">Оператор instanceof и наследование</h5>
<p>
	Пусть теперь у нас есть родительский класс и дочерний:
</p>
<code>
	<pre>
&lt;?php
	// Родительский класс:
	class ParentClass
	{
		
	}
	
	// Дочерний класс:
	class ChildClass extends ParentClass
	{
		
	}
?>
	</pre>
</code>
<p>
	Создадим объект дочернего класса:
</p>
<code>
	<pre>
&lt;?php
	$obj = new ChildClass;
?>
	</pre>
</code>
<p>
	Проверим теперь с помощью instanceof, принадлежит ли наш объект классу ParentClass и классу ChildClass:
</p>
<code>
	<pre>
&lt;?php
	var_dump($obj instanceof ChildClass);  // выведет true
	var_dump($obj instanceof ParentClass); // тоже выведет true
?>
	</pre>
</code>
<p>
	Как вы видите из примера - оператор instanceof не делает различия при проверки между родительскими и дочерними классами.
	
	Не путайтесь - если объект будет действительно родительского класса то, конечно же, проверка на принадлежность к дочернему классу вернет false:
</p>
<code>
	<pre>
&lt;?php
	$obj = new ParentClass; // объект родительского класса
	
	var_dump($obj instanceof ParentClass); // выведет true
	var_dump($obj instanceof ChildClass); // выведет false
?>
	</pre>
</code>
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		7) Сделайте класс User с публичным свойствами name и surname.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	lass User{
		public $name;
		public $surname;
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class User{
		public $name;
		public $surname;
	}
	?>
</div>
<div class="task">
	<h6>
		8) Сделайте класс Employee, который будет наследовать от класса User и добавлять свойство salary.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee extends User{
		public $salary;
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Employee extends User{
		public $salary;
	}
	?>
</div>