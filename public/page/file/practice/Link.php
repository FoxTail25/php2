<main>
	<h2 class="text-center pt-2">
		Класс Link
	</h2>
	<p>
		Давайте сделаем класс, который будет создавать HTML ссылку. Назовем его Link. Вот так мы будем пользоваться нашим классом:
	</p>
	<code>
<pre>&lt;?php
	echo (new Link())->setAttr('href', '/test.html')->setText('link')->show();
	// Выведет &lt;a href="/test.html">link</a>:
?></pre>
	</code>
	<p>
Реализация:
	</p>
	<code>
<pre>&lt;?php
	class Link extends Tag {
		public function __construct() {
			parent::__construct('a');
		}
	}
?></pre>
	</code>
	<p>
		Сделаем так, чтобы даже если атрибут href не задан, то по умолчанию он становился пустыми кавычками:
	</p>
	<code>
<pre>&lt;?php
	class Link extends Tag {
		public function __construct() {
			parent::__construct('a');
			$this->setAttr('href', '');
		}
	}
?></pre>
	</code>
	<p>
		Проверим:
	</p>
	<code>
<pre>&lt;?php
	// Выведет &lt;a href="">index</a>:
	echo (new Link())->setText('index')->show();
?></pre>
	</code>
	<div class="task">
	<h6>
		1) Самостоятельно реализуйте описанный класс Link.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
include_once('classes/origin/Tag.php');
class Link extends Tag {
	public function __construct(){
		parent::__construct('a');
		$this-setAttr('href','');
	}
}
?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
include_once('classes/origin/Tag.php');
class Link extends Tag {
	public function __construct(){
		$this->setAttr('href','');
		parent::__construct('a');
	}
}
	?>
	</div>
	<div class="task" id="link_task_2">
	<h6>
		2) С помощью этого класса создайте меню из 5 ссылок. Пусть первая ссылка ведет на страницу /1.php, вторая - на страницу /2.php и так далее.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
for($i=1; $i<=5; $i++ ){
	echo (new Link)->setText("page$i")->setAttr('href',"/$i.php")->show().'&lt;br/>';
}
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	for($i=1; $i<=5; $i++ ){
		echo (new Link)->setText("page$i")->setAttr('href',"/page/task/$i")->show().'<br/>';
	}
	?>
	</div>
	<div class="task">
	<h6>
		3) Разместите созданную менюшку в отдельном файле, например, в menu.php.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
// task/menu.php

include_once('classes/origin/Tag.php');
class Link extends Tag {
	public function __construct(){
		$this->setAttr('href','');
		parent::__construct('a');
	}
}
for($i=1; $i<=5; $i++ ){
	echo (new Link)->setText("page$i")->setAttr('href',"/$i.php")->show().'&lt;br/>';
}
?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php

	?>
	</div>
	<div class="task">
	<h6>
		4) Создайте страницы, на которые ведут ссылки вашей менюшки. Добавьте в ним какой-нибудь текст.
	</h6>
	<p>
		Решение:
	</p>
	<p>Готово <a href="#link_task_2">ссылки во 2й задаче ведут на страницы</a></p>
	<!-- <code>
		<pre>
&lt;?php

?></pre>
	</code> -->
	<!-- <p>
		Результат:
	</p> -->
	<?php

	?>
	</div>