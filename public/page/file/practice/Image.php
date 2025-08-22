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
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php

	?>
	</div>