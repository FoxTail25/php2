<main>
	<h2 class="text-center pt-2">
		Дополнительные методы класса Tag
	</h2>
	<p>
		Наведем некоторый марафет нашему классу, добавив дополнительные публичные методы, которые пригодятся нам в дальнейшем.
	</p>
    <div class="task">
	<h6>
		1) Реализуйте геттер getName, возвращающий название нашего тега (то есть значение свойства name).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
// Для упрощения решения задач, запишем созданный класс Tag в отдельный файл.
// Так же поменяем доступ к его свойствам с private на protected
// Теперь можно решить задачу с помощью наследования и трейта

include_once('classes/Tag.php');
trait getName{
	public function getName(){
		return $this->name;
	}
}
 class Tag2 extends Tag{
	use getName;
}
$div = new Tag2('div');
echo $div->getName();

?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
include_once('classes/Tag.php');
trait getName{
	public function getName(){
		return $this->name;
	}
}
 class Tag2 extends Tag{
	use getName;
}
$div = new Tag2('div');
echo $div->getName();
	?>
	</div>
	<div class="task">
	<h6>
		2) Реализуйте геттер getText, возвращающий текст нашего тега (то есть значение свойства text).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
// т.к. на прошлых уроках в учебнике не было реализовано свойство text
// попробуем реализовать его. и модифицировать метод close()
include_once('classes/Tag.php');
trait textProp {
	protected $text;
	public function __construct($name, $attrs = [], $text=''){
		parent::__construct($name, $attrs);
		$this->text = $text;
	}
	public function setText($text=''){
		$this->text = $text;
	}
	public function getText($text=''){
		return $this->text;
	}
	public function close(){
		return $this->text.'</'.$this->name.'>';
	}
}
class Tag3 extends Tag {
	use textProp;
}
$div = new Tag3('div',[],'Hello');
echo $div->open().$div->close();
$div->setText('Hello World!');
echo $div->open().$div->close();
echo $div->getText();
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
// т.к. на прошлых уроках в учебнике не было реализовано свойство text
// попробуем реализовать его. и модифицировать метод close()
include_once('classes/Tag.php');
trait textProp {
	protected $text;
	public function __construct($name, $attrs = [], $text=''){
		parent::__construct($name, $attrs);
		$this->text = $text;
	}
	public function setText($text=''){
		$this->text = $text;
	}
	public function getText($text=''){
		return $this->text;
	}
	public function close(){
		return $this->text.'</'.$this->name.'>';
	}
}
class Tag3 extends Tag {
	use textProp;
}
$div = new Tag3('div',[],'Hello');
echo $div->open().$div->close();
$div->setText('Hello World!');
echo $div->open().$div->close();
echo $div->getText();
	?>
	</div>
	<div class="task">
	<h6>
		3) Реализуйте геттер getAttrs, возвращающий массив всех атрибутов тега (то есть значение свойства attrs).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
trait getAttrs{
	public function getAttr(){
		var_dump($this->attrs);
	}
}
class Tag4 extends Tag3{
	use getAttrs;
}
$div2 = new Tag4('div', ['class' => 'aaa bbb'], 'Hi');
$div2
->setAttr('id', 'testId')
->getAttr();
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
trait getAttrs{
	public function getAttrs(){
		var_dump($this->attrs);
	}
}
class Tag4 extends Tag3{
	use getAttrs;
}
$div2 = new Tag4('div', ['class' => 'aaa bbb'], 'Hi');
$div2
->setAttr('id', 'testId')
->getAttrs();
	?>
	</div>
	<div class="task">
	<h6>
		4) Реализуйте геттер getAttr, параметром принимающий имя атрибута и возвращающий значение этого атрибута (а если такого атрибута нет - то null).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
trait getAttr{
	public function getAttr($attrName){
		if(isset($this->attrs[$attrName])){
			return $this->attrs[$attrName];
		} else {
			return null;
		}
	}
}
class Tag5 extends Tag4{
	use getAttr;
}
$div3 = new Tag5('div',['class'=>'aaa bbb'],'Hello Kity!');
$div3->setAttr('target', 'Hello World');
echo $div3->getAttr('class');
echo $div3->getAttr('target');
echo $div3->getAttr('id');
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
trait getAttr{
	public function getAttr($attrName){
		if(isset($this->attrs[$attrName])){
			return $this->attrs[$attrName];
		} else {
			return null;
		}
	}
}
class Tag5 extends Tag4{
	use getAttr;
}
$div3 = new Tag5('div',['class'=>'aaa bbb'],'Hello Kity!');
$div3->setAttr('target', 'Hello World');
echo $div3->getAttr('class');
echo $div3->getAttr('target');
echo $div3->getAttr('id');
	?>
	</div>
	<p class="text-center">
		<a href="/page/practice/css-classes" class="p-2">Назад</a>
		<a href="/page/practice/final-code"  class="p-2">Далее</a>
	</p>
</main>