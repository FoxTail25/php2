<main>
	<h2 class="text-center pt-2">Обращение к методам класса через $this</h2>
	<p>
		Через $this можно обращаться не только к свойствам объекта, но и к его методам. Посмотрим на примере. Пусть у нас есть класс User, а в нем метод setAge для изменения возраста юзера:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
	Давайте добавим проверку введенного возраста: если он от 18 до 60, то будем менять возраст на новый, а если нет - то менять не будем:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Если возраст от 18 до 60:
			if ($age >= 18 and $age <= 60) {
				$this->age = $age;
			}
		}
	}
?>
</pre>
</code>
<p>
	Пусть также нам нужен метод addAge, который будет добавлять некоторое количество лет к текущему возрасту:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Если возраст от 18 до 60:
			if ($age >= 18 and $age <= 60) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$this->age = $this->age + $years;
		}
	}
?>
</pre>
</code>
<p>
	В метод addAge, конечно же, также необходимо добавить проверку возраста, сделаем это:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Если возраст от 18 до 60:
			if ($age >= 18 and $age <= 60) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$newAge = $this->age + $years; // вычислим новый возраст
			
			// Если НОВЫЙ возраст от 18 до 60:
			if ($newAge >= 18 and $newAge <= 60) {
				$this->age = $newAge; // обновим, если новый возраст прошел проверку
			}
		}
	}
?>
</pre>
</code>
<p>
	Получится, что ограничения на возраст теперь задаются в двух местах (в методе setAge и в методе addAge), что не очень хорошо: если мы захотим поменять ограничение, нам придется сделать это в двух местах - это неудобно, и в каком-то из мест мы можем забыть внести изменения - это опасно, ведь наш код получится с трудноуловимой ошибкой.

	Давайте вынесем проверку возраста на корректность в отдельный вспомогательный метод isAgeCorrect, в который параметром будет передаваться возраст для проверки, и используем его внутри методов setAge и addAge:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		public $name;
		public $age;
		
		// Метод для проверки возраста:
		public function isAgeCorrect($age)
		{
			if ($age >= 18 and $age <= 60) {
				return true;
			} else {
				return false;
			}
		}
		
		// Метод для изменения возраста юзера:
		public function setAge($age)
		{
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($age)) {
				$this->age = $age;
			}
		}
		
		// Метод для добавления к возрасту:
		public function addAge($years)
		{
			$newAge = $this->age + $years; // вычислим новый возраст
			
			// Проверим возраст на корректность:
			if ($this->isAgeCorrect($newAge)) {
				$this->age = $newAge; // обновим, если новый возраст прошел проверку
			}
		}
	}
?>
</pre>
</code>
<p>
	Теперь любое изменения в условиях проверки можно будет легко сделать в одном месте. Проверим, что все работает как надо:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	$user->setAge(30); // установим возраст в 30
	echo $user->age; // выведет 30
	
	$user->setAge(10); // установим некорректный возраст
	echo $user->age; // не выведет 10, а выведет 30
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
		public function isCorrectAge($newAge){
			if($newAge >= 18 and $newAge <=60) {
				$this->age = $newAge;
			}
		}
		public function addAge($age){
			$newAge = $this->age + $age;
			$this->isCorrectAge($newAge);
		}
		public function setAge($age){
			$newAge = $age;
			$this->isCorrectAge($newAge);
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	class User {
		public $name;
		public $age;
		public function isCorrectAge($newAge){
			if($newAge >= 18 and $newAge <=60) {
				$this->age = $newAge;
			}
		}
		public function addAge($age){
			$newAge = $this->age + $age;
			$this->isCorrectAge($newAge);
		}
		public function setAge($age){
			$newAge = $age;
			$this->isCorrectAge($newAge);
		}
	}
?>
<hr/>
<h6>
	2) Создайте объект этого класса User проверьте работу методов setAge и addAge.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
	$user = new User;
	$user->name = 'john';
	$user->setAge(17);
	?>
&lt;p>Возраст пользователя &lt;?=$user->name?> составляет &lt;?=$user->age?> лет.&lt;/p>
&lt;?php 
$user->addAge(27);
?>
&lt;p>Возраст пользователя &lt;?=$user->name?> составляет &lt;?=$user->age?> лет.&lt;/p>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
	$user = new User;
	$user->name = 'john';
	$user->setAge(17);
	?>
<p>Возраст пользователя <?=$user->name?> составляет <?=$user->age?> лет.</p>
<?php 
$user->addAge(27);
?>
<p>Возраст пользователя <?=$user->name?> составляет <?=$user->age?> лет.</p>
<hr/>
<h6>
	3) Добавьте также метод subAge, который будет выполнять уменьшение текущего возраста на переданное количество лет.
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
		public function isCorrectAge($newAge){
			if($newAge >= 18 and $newAge <=60) {
				$this->age = $newAge;
			}
		}
		public function addAge($age){
			$newAge = $this->age + $age;
			$this->isCorrectAge($newAge);
		}
		public function setAge($age){
			$newAge = $age;
			$this->isCorrectAge($newAge);
		}
		public function subAge($age){
			$newAge = $this->age - $age;
			$this->isCorrectAge($newAge);
		}
	}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
	// class User2 {
	// 	public $name;
	// 	public $age;
	// 	public function isCorrectAge($newAge){
	// 		if($newAge >= 18 and $newAge <=60) {
	// 			$this->age = $newAge;
	// 		}
	// 	}
	// 	public function addAge($age){
	// 		$newAge = $this->age + $age;
	// 		$this->isCorrectAge($newAge);
	// 	}
	// 	public function setAge($age){
	// 		$newAge = $age;
	// 		$this->isCorrectAge($newAge);
	// 	}
	// 	public function subAge($age){
	// 		$newAge = $this->age - $age;
	// 		$this->isCorrectAge($newAge);
	// 	}
	// }
?>
<hr/>


<p class="text-center">
	<a href="/page/oop/properties-and-this" class="p-2">Назад</a>
	<a href="/page/oop/access-modifiers-public-and-private"  class="p-2">Далее</a>
</p>
</main>