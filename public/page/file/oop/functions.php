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
<h5 class="text-center mt-3">Функция get_object_vars</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-object-vars.php" target="_blank">get_object_vars</a>
</p>
<div class="task">
	<h6>
		8) Сделайте класс Test_3 с публичным свойством prop1, с приватными свойством prop2 и защищённым prop3. Создайте объект этого класса. С помощью функции get_object_vars получите массив свойств созданного объекта.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Test_3 {
		public $prop1 = 1;
		private $prop2 = 2;
		protected $prop3 = 3;
	}
	$test = new Test_3;
	var_dump(get_object_vars($test));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Test_3 {
		public $prop1 = 1;
		private $prop2 = 2;
		protected $prop3 = 3;
	}
	$test = new Test_3;
	var_dump(get_object_vars($test));
	?>
</div>
<h5 class="text-center mt-3">Функция class_exists</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-object-vars.php" target="_blank">class_exists</a>
</p>
<div class="task">
	<h6>
		9) Пусть у вас есть класс TestOne и нет класса TestTwo. Проверьте, что выведет функция class_exists для класса Test1 и для класса Test2.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class TestOne{};
	var_dump(class_exists('TestOne'));
	echo '&lt;br/>';
	var_dump(class_exists('TestTwo'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class TestOne{};
	var_dump(class_exists('TestOne'));
	echo '<br/>';
	var_dump(class_exists('TestTwo'));
	?>
</div>
<div class="task" id="get1">
	<h6>
		10) Пусть GET параметром в адресную строку передается название класса. Проверьте, существует ли такой класс. Выведите соответствующее сообщение на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	// можно проверить существование классов из прошлой задачи
	if(isset($_GET['message'])){
		$class = $_GET['message'];
		var_dump(class_exists($class));
		echo '&lt;br/>';
	}
	?>
	&lt;a href="/page/oop/functions?message=TestOne#get1">Проверить существование класса TestOne&lt;/a>
	&lt;br/>
	&lt;a href="/page/oop/functions?message=TestTwo#get1">Проверить существование класса TestTwo&lt;/a>
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
if(isset($_GET['message'])){
	 $class = $_GET['message'];
	 var_dump(class_exists($class));
	 echo '<br/>';
}
	?>
	<a href="/page/oop/functions?message=TestOne#get1">Проверить существование класса TestOne</a>
	<br/>
	<a href="/page/oop/functions?message=TestTwo#get1">Проверить существование класса TestTwo</a>
</div>

<h5 class="text-center mt-3">Функция method_exists</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.method-exists.php" target="_blank">method_exists</a>
</p>

<div class="task">
	<h6>
		11) Сделайте класс TestMethod с методом method1 и без метода method2. Проверьте, что выведет функция method_exists для метода method1 и для метода method2.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class TestMethod {
		public function method1(){}
	}
	var_dump(method_exists('TestMethod', 'method1'));
	echo '&lt;br/>';
	var_dump(method_exists('TestMethod', 'method2'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class TestMethod {
		public function method1(){

		}
	}
	var_dump(method_exists('TestMethod', 'method1'));
	echo '<br/>';
	var_dump(method_exists('TestMethod', 'method2'));
	?>

</div>
<div class="task" id="get2">
	<h6>
		12) Пусть GET параметрами в адресную строку передаются название класса и его метод. Проверьте, существует ли такой класс. Если существует - проверьте существование переданного метода. Если и метод существует - создайте объект данного класса, вызовите указанный метод и выведите результат его работы на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	//можно проверить существование методов из прошой задачи
	&lt;?php
	if(isset($_GET['className']) and isset($_GET['methodName'])){

		var_dump(method_exists($_GET['className'],$_GET['methodName']));
		echo '&lt;br/>';
	}
	?>
	&lt;a href="/page/oop/functions?className=TestMethod&methodName=method1#get2">
	Проверить GET-запросом существование метода 'method1' в классе 'TestMethod'
	&lt;/a>
	&lt;br/>
	&lt;a href="/page/oop/functions?className=TestMethod&methodName=method2#get2">
	Проверить GET-запросом существование метода 'method2' в классе 'TestMethod'
	&lt;/a>
	</pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	if(isset($_GET['className']) and isset($_GET['methodName'])){

		var_dump(method_exists($_GET['className'],$_GET['methodName']));
		echo '<br/>';
	}
	?>
	<a href="/page/oop/functions?className=TestMethod&methodName=method1#get2">Проверить GET-запросом существование метода 'method1' в классе 'TestMethod'</a>
	<br/>
	<a href="/page/oop/functions?className=TestMethod&methodName=method2#get2">Проверить GET-запросом существование метода 'method2' в классе 'TestMethod'</a>

</div>

<h5 class="text-center mt-3">Функция property_exists</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.property-exists.php" target="_blank">property_exists</a>
</p>

<div class="task">
	<h6>
		13) Сделайте класс TestProperty со свойством prop1 и без свойства prop2. Проверьте, что выведет функция property_exists для свойства prop1 и для свойства prop2.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class TestProperty{
		public $prop1;
		private $prop2;
		protected $prop3;
	}
	var_dump(property_exists('TestProperty','prop1'));
	echo '&lt;br/>';
	var_dump(property_exists('TestProperty','prop2'));
	echo '&lt;br/>';
	var_dump(property_exists('TestProperty','prop3'));
	echo '&lt;br/>';
	var_dump(property_exists('TestProperty','prop4'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class TestProperty{
		public $prop1;
		private $prop2;
		protected $prop3;
	}
	var_dump(property_exists('TestProperty','prop1'));
	echo '<br/>';
	var_dump(property_exists('TestProperty','prop2'));
	echo '<br/>';
	var_dump(property_exists('TestProperty','prop3'));
	echo '<br/>';
	var_dump(property_exists('TestProperty','prop4'));
	?>
</div>

<div class="task">
	<h6>
		14) Дан массив со свойствами класса. Дан также класс, имеющий часть из этих свойств. Переберите этот массив циклом, для каждого свойства проверьте, существует ли оно в классе и, если существует, выведите на экран значение этого свойства.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	// Проверяем свойства созданные в прошлой задаче
	$arrProp = ['prop1','prop3','prop6'];
	foreach($arrProp as $prop){
		var_dump(property_exists('TestProperty', $prop));
		echo '&lt;br/>';
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$arrProp = ['prop1','prop3','prop6'];
	foreach($arrProp as $prop){
		var_dump(property_exists('TestProperty', $prop));
		echo '<br/>';
	}
	?>
</div>

<h5 class="text-center mt-3">Функция get_parent_class</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-parent-class.php" target="_blank">get_parent_class</a>
</p>

<div class="task">
	<h6>
		15) Сделайте класс ChildClassA наследующий от ParentClassA. С помощью функции get_parent_class выведите на экран родителя класса ParentClassA.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class ParentClassA{};
	class ChildClassA extends ParentClassA{};
	echo(get_parent_class('ChildClassA'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class ParentClassA{};
	class ChildClassA extends ParentClassA{};
	echo(get_parent_class('ChildClassA'));
	?>
</div>

<h5 class="text-center mt-3">Функция is_subclass_of</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.is-subclass-of.php" target="_blank">is_subclass_of</a>
</p>

<div class="task">
	<h6>
		16) Сделайте класс ChildClass1 наследующий от ParentClass1, который в свою очередь наследует от GrandParentClass1
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class GrandParegntClass{};
	class ParegntClass extends GrandParegntClass{};
	class ChildClass extends ParegntClass{};
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class GrandParentClass{};
	class ParentClass extends GrandParentClass{};
	class ChildClass extends ParentClass{};
	?>
</div>
<div class="task">
	<h6>
		17) С помощью функции is_subclass_of проверьте, является ли класс ChildClass потомком GrandParentClass.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(is_subclass_of('ChildClass','GrandParentClass'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(is_subclass_of('ChildClass','GrandParentClass'));
	?>
</div>
<div class="task">
	<h6>
		18) С помощью функции is_subclass_of проверьте, является ли класс ParentClass потомком GrandParentClass.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(is_subclass_of('ParentClass','GrandParentClass'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(is_subclass_of('ParentClass','GrandParentClass'));
	?>
</div>
<div class="task">
	<h6>
		19) С помощью функции is_subclass_of проверьте, является ли класс ChildClass потомком ParentClass.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(is_subclass_of('ChildClass','ParentClass'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(is_subclass_of('ChildClass','ParentClass'));
	?>
</div>

<h5 class="text-center mt-3">Функция is_a</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.is-a.php" target="_blank">is_a</a>
</p>

<div class="task">
	<h6>
		20) Сделайте класс ChildClass наследующий от ParentClass. Создайте объект класса ChildClass, запишите его в переменную $obj.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	//Классы были созданы на прошлых задачах, по этому просто создаём объект
	&lt;?php
	$obj = new ChildClass;
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	$obj = new ChildClass;
	?>
</div>
<div class="task">
	<h6>
		21) С помощью функции is_a проверьте, принадлежит ли объект $obj классу ChildClass.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(is_a($obj, 'ChildClass'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(is_a($obj, 'ChildClass'));
	?>
</div>
<div class="task">
	<h6>
		22) С помощью функции is_a проверьте, принадлежит ли объект $obj классу ParentClass.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(is_a($obj, 'ParentClass'));
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(is_a($obj, 'ParentClass'));
	?>
</div>

<h5 class="text-center mt-3">Функция get_declared_classes</h5>
<p class="bg-secondary-subtle p-2">
Изучить теорию по следующей ссылке <a href="https://www.php.net/manual/ru/function.get-declared-classes.php" target="_blank">get_declared_classes</a>
</p>
<div class="task">
	<h6>
		23) Выведите на экран список всех объявленных классов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(get_declared_classes());
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	var_dump(get_declared_classes());
	?>
</div>
<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/polymorphism"  class="p-2">Далее</a>
</p>
</main>