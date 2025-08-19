<main>
	<h2 class="text-center pt-2">
		Класс Tag
	</h2>
	<p>
		Сейчас мы с вами сделаем класс Tag для упрощения работы с HTML тегами. Имея такой класс мы, вместо того, чтобы набирать HTML теги вручную, будем использовать для этого PHP. На самом деле выигрыша в длине кода мы не получим, но сможем динамически формировать теги по определенным условиям, что пригодится нам для решения более сложных задач. Давайте приступим к реализации, а саму выгоду такого класса вы поймете в процессе работы над кодом, либо в следующих уроках, когда мы будем применять наш класс.
	</p>
	<h5 class="text-center">Приступим к реализации</h5>
	<p>
		Итак, наш класс называется Tag - это неспроста. Каждый объект этого класса будет представлять собой отдельный тег, с которым мы будем производить определенные операции. Давайте будем передавать имя создаваемого тега в конструктор объекта и записывать в приватное свойство $name:
	</p>
	<code>
		<pre>
&lt;?php
	class Tag{
		private $name; // свойство для хранения имени тега
		
		public function __construct($name){
			$this->name = $name;
		}
	}
?>
		</pre>
	</code>
	<p>
		Сделаем с помощью нашего класса, к примеру, объект для тега &lt;input> (пока на экран ничего не выведется):
	</p>
	<code>
		<pre>
&lt;?php
	$input = new Tag('input');
?>
		</pre>
	</code>
	<p>
		Пока мы просто получили объект с инпутом. Давайте добавим еще метод, с помощью которого мы будем выводить тег на экран. Здесь следует иметь ввиду то, что теги бывают открывающие, например, &lt;div>, и закрывающие, например, &lt;/div>. Некоторые теги не имеют закрывающего тега, например, &lt;input> или &lt;img>. Давайте для начала сделаем метод open, который будет только открывать тег (в случае с инпутами больше никакой метод и не понадобится, так как они не требуют закрытия).

		Итак, реализуем:
	</p>
	<code>
		<pre>
&lt;?php
	class Tag{
		private $name;
		
		public function __construct($name){
			$this->name = $name;
		}
		
		// Выводим открывающую часть тега:
		public function open(){
			$name = $this->name;
			return "&lt;$name>";
		}
	}
?>
		</pre>
	</code>
	<p>
		Давайте проверим работу нашего метода:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	echo $tag->open(); // выведет &lt;input>
?>
		</pre>
	</code>
	<p>
		Запустите этот код, и в окне браузера действительно появится инпут. Чтобы посмотреть исходный HTML код, в окне браузера можно будет нажать комбинацию клавиш Ctrl+U - там вы увидите код нашего инпута.
		Открытый исходный код можно обновлять, будто обычную страницу браузера. Вы можете менять ваш PHP код и сразу проверять изменения HTML кода, отправляемого в браузер.
		Давайте теперь сделаем метод close для закрывающей части тега:
	</p>
		<code>
		<pre>
&lt;?php
	class Tag{
		private $name;
		
		public function __construct($name){
			$this->name = $name;
		}
		
		public function open(){
			$name = $this->name;
			return "&lt;$name>";
		}
		
		// Выводим закрывающую часть тега:
		public function close(){
			$name = $this->name;
			return "&lt;/$name>";
		}
	}
?>
		</pre>
	</code>
	<p>
		Воспользуемся этим методом:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('div');
	echo $tag->open() . 'text' . $tag->close(); // выведет &lt;div>text&lt;/div>
?>
		</pre>
	</code>
	<div class="task">
	<h6>
		1) Самостоятельно, не подсматривая в код выше, сделайте такой же класс Tag.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Tag{
		private string $name;
		public function __construct(string $tagName){
			$this->name = $tagName;
		}
		public function open(){
			return "<$this->name>";
		}
		public function close(){
			return "</$this->name>";
		}
	}
	$div = new Tag('div');
	echo $div->open().'тест класса Tag'.$div->close();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
class Tag{
	private string $name;
	public function __construct(string $tagName){
		$this->name = $tagName;
	}
	public function open(){
		return "<$this->name>";
	}
	public function close(){
		return "</$this->name>";
	}
}
$div = new Tag('div');
echo $div->open().'тест класса Tag'.$div->close();
	?>
	</div>
	<div class="task">
	<h6>
		2) Создайте с помощью класса Tag тег &lt;img> и выведите его на экран.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$img = new Tag('img');
	echo $img->open();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$img = new Tag('img');
	echo $img->open();
	?>
	</div>
	<div class="task">
	<h6>
		3) Создайте с помощью класса Tag тег &lt;header> и выведите его на экран с текстом 'header сайта'.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$header = new Tag('header');
	echo $header->open().'содержимое тега header'.$header->close();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$header = new Tag('header');
	echo $header->open().'содержимое тега header'.$header->close();
	?>
	</div>





	<p class="text-center">
		<a href="/page/practice/file" class="p-2">Назад</a>
		<a href="/page/practice/tag-attributes"  class="p-2">Далее</a>
	</p>
</main>