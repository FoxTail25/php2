<main>
	<h2 class="text-center pt-2">
		Класс Image
	</h2>
	<p>
		В предыдущих уроках мы с вами реализовали класс Tag для работы с тегами. Пусть с помощью этого класса мы хотим сделать картинку:
	</p>
	<code>
		<pre>
&lt;?php
	$image = new Tag('img');
	echo $image->setAttr('src', 'img.png')->open(); 
		// &lt;img src="img.png"> 
?>
		</pre>
	</code>
	<p>
		Давайте сделаем работу с картинками более удобной. Не будем использовать класс Tag, а создадим специальный класс для работы с картинками, назвав его Image.

		С использованием нового класса мы могли бы переписать код вот так:
	</p>
	<code>
		<pre>
&lt;?php
	$image = new Image();
	echo $image->setAttr('src', 'img.png')->open(); 
		// &lt;img src="img.png"> 
?>
		</pre>
	</code>
	<p>
		Пока особой разницы, как вы видите, нет. У нового класса, однако, есть преимущество - мы можем сделать вещи, характерные именно для тега img.

		К примеру, в теге img атрибут src является обязательным. Было бы удобно, чтобы новый класс работал так: если атрибут src не задан через setAttr, то он все равно будет созданном теге, но с пустым значением:
	</p>
	<code>
		<pre>
&lt;?php
	$image = new Image();
	echo $image->open(); // &lt;img src="">
?>
		</pre>
	</code>
	<p>
		Кроме того, было бы неплохо сделать то же самое и для атрибута alt (важен для SEO, желательно, чтобы всегда был):
	</p>
	<code>
		<pre>
&lt;?php
	$image = new Image();
	echo $image->open(); // &lt;img src="" alt=""> - alt тоже будет 
?>
		</pre>
	</code>
	<h5 class="text-center">Реализация класса Image</h5>
	<p>
		Очевидно, что класс Image - это тот же класс Tag, но с некоторыми дополнениями. Логично в этом случае не создавать этот класс с нуля, а унаследовать его от класса Tag:
	</p>
	<code>
		<pre>
&lt;?php
	class Image extends Tag
	{
		
	} 
?>
		</pre>
	</code>
	<p>
		Как мы описали выше, класс Image отличается от класса Tag тем, что в Image по умолчанию задаются атрибуты src и alt.

		Кроме того, обратите внимание на то, как мы вызываем конструкторы классов:
	</p>
	<code>
<pre>&lt;?php
	$image = new Tag('img');
	$image = new Image();
?></pre>
	</code>
	<p>
		Как вы видите, класс Tag ожидает первым параметром имя тега, а класс Image вызывается без параметра - имя тега в данном случае нет необходимости задавать, так как наш класс всегда делает один и тот же тег img.

		Для того, чтобы реализовать такое поведение, класс Image должен переопределить конструктор родителя:
	</p>
	<code>
<pre>&lt;?php
	class Image extends Tag	{
		public function __construct() {
			// Вызовем конструктор родителя, 
				передав имя тега: 
			parent::__construct('img');
		}
	}
?></pre>
	</code>
	<p>
		Давайте в этом же конструкторе зададим атрибуты src и alt:
	</p>
	<code>
<pre>&lt;?php
	class Image extends Tag	{
		public function __construct() {
			$this->setAttr('src', ''); // установим атрибут src
			$this->setAttr('alt', ''); // установим атрибут alt
			
			parent::__construct('img'); // вызовем 
				конструктор родителя 
		}
	}
?></pre>
	</code>
	<p>
		Установку атрибутов можно упростить и выполнить в виде цепочки:
	</p>
	<code>
<pre>&lt;?php
	class Image extends Tag	{
		public function __construct() {
			$this->setAttr('src', '')->setAttr('alt', '');
			parent::__construct('img');
		}
	}
?></pre>
	</code>
	<p>
		При использовании нашего класса в дальнейшем мы можем затереть эти атрибуты с помощью setAttr на свое значение, а можем не затереть - тогда они так и останутся со значением '', смотрите пример:
	</p>
	<code>
<pre>&lt;?php
	// Затрем src, но не alt:
	echo (new Image())->setAttr('src', 
		'img.png')->open(); // &lt;img src="img.png" alt=""> 
?></pre>
	</code>
	<div class="task">
	<h6>
		1) Самостоятельно напишите реализацию описанного класса Image.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
include_once('classes/origin/Tag.php');
class Image extends Tag {
	public function __construct(){
		$this->setAttr('src', '')->setAttr('alt', '');
		parent::__construct('img');
	}
}
	<!-- echo (new Image())->setAttr('src', 
		'img.png')->open(); -->
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
// include_once('classes/origin/Tag.php');
// class Image extends Tag {
// 	public function __construct(){
// 		$this->setAttr('src', '')->setAttr('alt', 'image');
// 		parent::__construct('img');
// 	}
// }
	// echo (new Image())->setAttr('src', 
	// 	'img.png')->open(); // <img src="img.png" alt="">
	?>
	</div>
	<div class="task">
	<h6>
		2) Используя созданный вами класс выведите на экран какую-нибудь картинку.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
	echo (new Image())->setAttr('src', '/img/smile.png')->open();
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
include_once('classes/origin/Tag.php');
class Image extends Tag {
	public function __construct(){
		$this->setAttr('src', '')->setAttr('alt', 'image');
		parent::__construct('img');
	}
	public function __toString(){
		return $this->open();
	}
}
	echo (new Image())->setAttr('src', '/img/smile.png')->open(); // <img src="img.png" alt="">
	?>
	</div>
	<div class="task">
	<h6>
		3) Установите созданной вами картинке атрибут width в значение 300, а атрибут height - в значение 200.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
	echo (new Image())->setAttr('src', '/img/smile.png')->open();
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php

	echo (new Image())->setAttr('src', '/img/smile.png')->setAttr('width', '300')->setAttr('height', '200')->open(); // <img src="img.png" alt="">
	?>
	</div>
	<h5 class="text-center mt-3">Откажемся от open</h5>
	<p>
		В классе Tag у нас есть два метода, которые используются для завершения цепочки и вывода тега на экран: это метод open и метод show. Почему у нас два метода: потому что класс Tag универсальный и предполагает использование как для тегов, не требующих закрытия, так и для парных тегов. Очевидно, что при использовании класса Image мы всегда будем завершать цепочку методом open. Раз так, то давайте сделаем использование метода open не обязательным. То есть вместо этого:
	</p>
	<code>
		<pre>&lt;?php
	echo (new Image())->setAttr('src', 'img.png')->open();
?></pre>
	</code>
	<p>
		Мы будем писать вот так:
	</p>
	<code>
		<pre>&lt;?php
		echo (new Image())->setAttr('src', 'img.png');
?></pre>
	</code>
	<p>
		Используем для этого магический метод __toString:
	</p>
	<code>
		<pre>&lt;?php
		class Image extends Tag	{
		public function __construct() {
			$this->setAttr('src', '')->setAttr('alt', '');
			parent::__construct('img');
		}
		public function __toString() {
			return parent::open(); // вызываем метод родителя
		}
	}
?></pre>
	</code>
	<p>
		Теперь получается, что при попытке преобразования объекта в строку, например, при выводе его через echo, автоматически будет вызываться метод __toString, внутри которого будет вызываться метод open. Напоминаю, что если не выводить объект на экран, а, например, записать в переменную, то в эту переменную попадет объект, а не его строковое представление:
	</p>
	<code>
		<pre>&lt;?php
	// В переменную $image запишется объект:
	$image = (new Image())->setAttr('src', 'img.png');
	
	$image->setAttr('width', '200'); // вызовем еще метод
	echo $image; // тут сработает __toString
?></pre>
	</code>
	<div class="task">
	<h6>
		4) Самостоятельно напишите реализацию метода __toString.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
include_once('classes/origin/Tag.php');
class Image extends Tag {
	public function __construct(){
		$this->setAttr('src', '')->setAttr('alt', 'image');
		parent::__construct('img');
	}
	public function __toString(){
		return $this->open();
	}
}
echo (new Image())->setAttr('src', '/img/smile.png');
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php

	echo (new Image())->setAttr('src', '/img/smile.png'); // <img src="img.png" alt="">
	?>
	</div>
	<p class="text-center">
		<a href="/page/practice/final-code" class="p-2">Назад</a>
		<a href="/page/practice/Link"  class="p-2">Далее</a>
	</p>
</main>