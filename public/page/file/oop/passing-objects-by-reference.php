<main>
	<h2 class="text-center pt-2">Передача объектов по ссылке</h2>
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
			$this->age  = $age;
		}
	}
?>
</pre>
</code>
<p>
Пусть мы создаем объект этого класса:
</p>
<code>
<pre>
&lt;?php
$user = new User('john', 30);
?>
</pre>
</code>
<p>
	Представьте теперь следующую ситуацию: вы хотите значение переменной $user присвоить какой-нибудь другой переменной, например $test.

Если речь шла не об объектах, а о примитивах, то есть о строках, числах, массивах и тп, то в переменную $test попала бы копия значения переменной $user.

Это значит, что изменения любой из переменной в дальнейшем не меняли бы значение другой переменной. Посмотрим на примере:
</p>
<code>
<pre>
&lt;?php
	$user = 1;
	
	$test = $user; // в переменной $test теперь 1
	$test = 2;     // в переменной $test теперь 
		2, а в $user - по-прежнему 1 
?>
</pre>
</code>
<p>
	С объектами все по-другому - при записи в другую переменную объекты не копируются, а передаются по ссылке: это значит, что обе эти переменные значением имеют один и тот же объект. Это имеет важное следствие: если поменять какие-то свойства объекта с помощью одной переменной, во второй переменной появятся эти же изменения:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 30);
	
	$test = $user; // и $test, и $user ссылаются 
		на один и тот же объект 
	$test->name = 'eric'; // поменяли переменную $test - но $user также поменялась!
	
	// Проверим - выведем свойство name из переменной $user:
	echo $user->name; // выведет 'eric'!
?>
</pre>
</code>
<p>
	Учтите, что речь идет именно об объектах. Если вы в какую-то переменную запишите данные из свойства объекта - они скопируются, а не передадутся по ссылке:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 30);
	
	$name = $user->name; // запишем в переменную 
		$name текст 'john' 
	$name = 'eric'; // поменяли переменную $name, но 
		$user->name не поменялось 
	
	// Проверим - выведем свойство name из переменной $user:
	echo $user->name; // выведет 'john'
?>
</pre>
</code>
<p>
	Если перезаписать переменную с объектом на примитив, то объект не исчезнет из другой переменной:
</p>
<code>
<pre>
&lt;?php
	$user = new User('john', 30);
	
	$test = $user; // и $test, и $user ссылаются 
		на один и тот же объект 
	$user = 123;   // теперь $test ссылается, а $user - нет
?>
</pre>
</code>
<p>
	Объект существует в памяти компьютера до тех пор, пока на него ссылается хоть кто-нибудь. В примере выше, если что-нибудь записать и в переменную $user - на наш объект больше не будет ссылаться ни одна переменная и этот объект удалится из памяти.
</p>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте класс Product, в котором будут следующие свойства: name, price.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
class Product {
	private $name;
	private $price;
}
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
class Product {
	private $name;
	private $price;
}
?>
<hr/>
<h6>
	2) Создайте объект класса Product, запишите его в переменную $product1.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
$product1 = new Product;
?>
	</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
$product1 = new Product;
?>
<hr/>
<h6>
	3) Присвойте значение переменной $product1 в переменную $product2. Проверьте то, что обе переменные ссылаются на один и тот же объект.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
&lt;?php
$product2 = $product1;
echo $product1 instanceof Product;
echo '&lt;br/>';
echo $product2 instanceof Product;
?>
</pre>
</code>
<!-- <p>
	Результат:
</p> -->
<?php
$product2 = $product1;
echo $product1 instanceof Product;
echo '<br/>';
echo $product2 instanceof Product;
?>
<hr/>




<p class="text-center">
	<a href="/page/oop/parent-constructor-overriding" class="p-2">Назад</a>
	<a href="/page/oop/using-objects-in-class"  class="p-2">Далее</a>
</p>
</main>