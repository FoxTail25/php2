<main>
	<h2 class="text-center pt-2">Функции для работы с классами и объектами</h2>
	<h5 class="text-center mt-3">Функция get_class</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-class.php" target="_blank">get_class</a>
</p>
<div class="task">
	<h6>
		1) Сделайте объект какого-нибудь класса. Примените к объекту функцию get_class и узнайте имя класса, которому принадлежит объект.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Rectangle{}
	$rect = new Rectangle;
	echo get_class($rect);
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Rectangle{}
$rect = new Rectangle;
echo get_class($rect);
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте два класса: Test1 и Test2. Пусть оба класса имеют свойство name. Создайте некоторое количество объектов этих классов и запишите в массив $arr в произвольном порядке. Переберите этот массив циклом и для каждого объекта выведите значение его свойства name и имя класса, которому принадлежит объект.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
class Test1 {
	public $name = 'one';
}
class Test2 {
	public $name = 'two';
}
$arr[]=(new Test1);
$arr[]=(new Test2);
$arr[]=(new Test1);
$arr[]=(new Test2);
$arr[]=(new Test1);
foreach($arr as $elem):?>
<p>Объект класса:&lt;?=get_class($elem)?> Имя: &lt;?=$elem->name?>&lt;/p>
&lt;?php endforeach?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Test1 {
	public $name = 'one';
}
class Test2 {
	public $name = 'two';
}
$arr[]=(new Test1);
$arr[]=(new Test2);
$arr[]=(new Test1);
$arr[]=(new Test2);
$arr[]=(new Test1);
foreach($arr as $elem):?>
<p>Объект класса:<?=get_class($elem)?> Имя: <?=$elem->name?></p>
<?php endforeach?>
</div>
	<h5 class="text-center mt-3">Функция get_class_methods</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-class-methods.php" target="_blank">get_class_methods</a>
</p>
<div class="task">
	<h6>
		3) Сделайте класс Test с методами method1, method2 и method3. С помощью функции get_class_methods получите массив названий методов класса Test.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
class Test{
	public $num = 1;
	public function method1(){
		return $this->num*1;
	}
	public function method2(){
		return $this->num*2;
	}
	public function method3(){
		return $this->num*3;
	}
}
$test = new Test;
var_dump(get_class_methods($test));
echo '&lt;br/>';
var_dump(get_class_methods('Test'));
echo '&lt;br/>';
var_dump(get_class_methods((new Test)));
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Test{
	public $num = 1;
	public function method1(){
		return $this->num*1;
	}
	public function method2(){
		return $this->num*2;
	}
	public function method3(){
		return $this->num*3;
	}
}
$test = new Test;
var_dump(get_class_methods($test));
echo '<br/>';
var_dump(get_class_methods('Test'));
echo '<br/>';
var_dump(get_class_methods((new Test)));
	?>
</div>
<div class="task">
	<h6>
		4) Создайте объект класса Test, запишите его в переменную $test. С помощью функции get_class_methods получите массив названий методов объекта. Переберите этот массив циклом и в этом цикле вызовите каждый метод объекта.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
class Test{
	public $num = 1;
	public function method1(){
		return $this->num*1;
	}
	public function method2(){
		return $this->num*2;
	}
	public function method3(){
		return $this->num*3;
	}
}
$test = new Test;
$arrMethod = get_class_methods($test);
foreach($arrMethod as $elem){
	echo $test->{$elem}().'&lt;br/>';
}
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
$arrMethod = get_class_methods($test);
foreach($arrMethod as $elem){
	echo $test->{$elem}().'<br/>';
}
	?>
</div>
	<h5 class="text-center mt-3">Функция get_class_vars</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-class-vars.php" target="_blank">get_class_vars</a>
</p>
<div class="task">
	<h6>
		5) Сделайте класс Test с публичными свойствами prop1 и prop2, а также с приватными свойствами prop3 и prop4.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
		class Test{
		public $prop1=1;
		public $prop2=2;
		private $prop3=3;
		private $prop4=4;
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Test_2{
		public $prop1=1;
		public $prop2=2;
		private $prop3=3;
		private $prop4=4;

		public function getVars(){
			var_dump(get_class_vars('Test_2'));
		}
	}
	?>
</div>
<div class="task">
	<h6>
		6) Вызовите функцию get_class_vars снаружи класса Test. Выведите массив доступных свойств.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(get_class_vars('Test'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(get_class_vars('Test_2'));
	?>
</div>
<div class="task">
	<h6>
		7) Вызовите функцию get_class_vars снаружи класса Test. Выведите массив доступных свойств.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Test{
		public $prop1=1;
		public $prop2=2;
		private $prop3=3;
		private $prop4=4;

		public function getVars(){
			var_dump(get_class_vars('Test_2'));
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	(new Test_2)->getVars()
	?>
</div>