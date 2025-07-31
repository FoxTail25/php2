<main>
	<h2 class="text-center pt-2">Обращение к свойствам класса через $this</h2>
	<p>
		Пусть теперь наш метод show() выводит нечто полезное - имя пользователя, которое хранится в свойстве name. Для того, чтобы обратиться к свойству класса внутри метода этого класса, вместо имени объекта следует писать специальную переменную $this:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		public function show()
		{
			return $this->name; // вернем имя из свойства
		}
	}
?>
</pre>
</code>
<p>
	Почему внутри класса нельзя написать так - $user->name? Потому что это имя переменной снаружи класса и сам класс про это имя ничего не знает (более того, у нас же могут быть несколько объектов одного класса, и у них будут разные имена переменных). Давайте создадим объект нашего класса и проверим работу метода show():
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		public function show()
		{
			// Возвращаем имя:
			return $this->name;
		}
	}
	
	$user = new User; // создаем объект класса
	$user->name = 'john'; // записываем имя
	$user->age = 25; // записываем возраст
	
	// Вызываем наш метод:
	echo $user->show(); // выведет 'john'
?>
</pre>
</code>

<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс Employee, в котором будут следующие свойства - name, age, salary.
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
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	public $name;
	// 	public $age;
	// 	public $salary;
	// }
?>

<h6>
	2) Сделайте в классе Employee метод getName, который будет возвращать имя работника.
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
		function getName(){
			return this->name;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	public $name;
	// 	public $age;
	// 	public $salary;
	// 	function getName(){
	// 		return this->name;
	// 	}
	// }
?>

<h6>
	3) Сделайте в классе Employee метод getAge, который будет возвращать возраст работника.
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
		function getName(){
			return this->name;
		}
		function getAge(){
			return this->age;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	public $name;
	// 	public $age;
	// 	public $salary;
	// 	function getName(){
	// 		return this->name;
	// 	}
	// 	function getAge(){
	// 		return this->age;
	// 	}
	// }
?>

<h6>
	4) Сделайте в классе Employee метод getSalary, который будет возвращать зарплату работника.
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
		function getName(){
			return this->name;
		}
		function getAge(){
			return this->age;
		}
		function getSalary(){
			return this->salary;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	public $name;
	// 	public $age;
	// 	public $salary;
	// 	function getName(){
	// 		return this->name;
	// 	}
	// 	function getAge(){
	// 		return this->age;
	// 	}
	// function getSalary(){
	// 	return this->salary;
	// }
	// }
?>

<h6>
	5) Сделайте в классе Employee метод checkAge, который будет проверять то, что работнику больше 18 лет и возвращать true, если это так, и false, если это не так.
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
		function getName(){
			return this->name;
		}
		function getAge(){
			return this->age;
		}
		function getSalary(){
			return this->salary;
		}
		function checkAge(){
			return this->age > 18 ? true : false;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class Employee {
	// 	public $name;
	// 	public $age;
	// 	public $salary;
	// 	function getName(){
	// 		return this->name;
	// 	}
	// 	function getAge(){
	// 		return this->age;
	// 	}
	// function getSalary(){
	// 	return this->salary;
	// }
	// function checkAge(){
	// return this->age > 18 ? true : false;
	// }
	// }
?>

<h6>
	6) Создайте два объекта класса Employee, запишите в их свойства какие-либо значения. С помощью метода getSalary найдите сумму зарплат созданных работников.
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
		function getName(){
			return this->name;
		}
		function getAge(){
			return this->age;
		}
		function getSalary(){
			return this->salary;
		}
		function checkAge(){
			return this->age > 18 ? true : false;
		}
	}
	$employe1 = new Employee;
	$employe1->salary = 1500;
	$employe1->name = 'Rick';
	$employe2 = new Employee;
	$employe2->name = 'Morty';
	$employe2->salary = 2000;
?>
<p>
	Сумма зарплат &lt;?=$employe1->name ?> и &lt;?=$employe2->name?> равна &lt;?=$employe1->salary + $employe2->salary?>
</p>
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
		function getName(){
			return this->name;
		}
		function getAge(){
			return this->age;
		}
		function getSalary(){
			return this->salary;
		}
		function checkAge(){
		return this->age > 18 ? true : false;
		}
	}
	$employe1 = new Employee;
	$employe1->salary = 1500;
	$employe1->name = 'Rick';
	$employe2 = new Employee;
	$employe2->name = 'Morty';
	$employe2->salary = 2000;
?>
<p>
	Сумма зарплат <?=$employe1->name ?> и <?=$employe2->name?> равна <?=$employe1->salary + $employe2->salary?>
</p>
	<h2 class="text-center pt-2">Запись свойств</h2>
	<p>
		С помощью $this свойства можно не только прочитывать, но и записывать. Давайте сделаем метод setName(), который параметром будем принимать имя пользователя и записывать его в свойство name:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения имени юзера:
		public function setName($name)
		{
			$this->name = $name; // запишем новое значение свойства name
		}
	}
	
	$user = new User; // создаем объект класса
	$user->name = 'john'; // записываем имя
	$user->age = 25; // записываем возраст
	
	// Установим новое имя:
	$user->setName('eric');
	
	// Проверим, что имя изменилось:
	echo $user->name; // выведет 'eric'
?>
</pre>
</code>


<h5 class="text-center">Задачи</h5>

<h6>
	7) Сделайте класс User, в котором будут следующие свойства - name и age.
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
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class User {
	// 	public $name;
	// 	public $age;
	// }
?>

<h6>
	8) Сделайте метод setAge, который параметром будет принимать новый возраст пользователя.
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
		public function setAge($num)
		{
			$this->age = $num;
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class User {
	// 	public $name;
	// 	public $age;
	// 	public function setAge($num)
	// {
	// 	$this->age = $num;
	// }
	// }
?>

<h6>
	9) Создайте объект класса User с именем 'john' и возрастом 25. С помощью метода setAge поменяйте возраст на 30. Выведите новое значение возраста на экран.
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
		public function setAge($num)
		{
			$this->age = $num;
		}
	}
	$user = new User;
	$user->name = 'john';
	$user->age = 25;
	$user->setAge(30);
?>
&lt;p>
	Возраст &lt;?=$user->name?> : &lt;?=$user->age?>
&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	class User {
		public $name;
		public $age;
		public function setAge($num)
		{
			$this->age = $num;
		}
	}
	$user = new User;
	$user->name = 'john';
	$user->age = 25;
	$user->setAge(30);
?>
<p>
	Возраст <?=$user->name?> : <?=$user->age?>
</p>

<h6>
	10) Модифицируйте метод setAge так, чтобы он вначале проверял, что переданный возраст больше или равен 18. Если это так - пусть метод меняет возраст пользователя, а если не так - то ничего не делает.
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
		public function setAge($num)
		{
			if($num >= 18) {
			$this->age = $num;
			}
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	class User2 {
		public $name;
		public $age;
		public function setAge($num)
		{
			if($num >= 18) {
				$this->age = $num;
			}
		}
	}
?>





<p class="text-center">
	<a href="/page/oop/properties" class="p-2">Назад</a>
	<a href="/page/oop/properties-and-this"  class="p-2">Далее</a>
</p>
</main>