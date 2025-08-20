<main>
	<h2 class="text-center pt-2">
		Массовое добавление атрибутов в классе Tag
	</h2>
	<p>
		Давайте сделаем метод setAttrs, который будет работать аналогично методу setAttr, но параметром принимать массив атрибутов.

		Смотрите пример:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttrs(['id' => 'test', 'class' => 'eee']) // задаем атрибуты массивом
		->open(); // выведет &lt;input id="test" class="eee">
?></pre>
	</code>
	<p>
		Предполагается, что пользователь нашего класса будет использовать или метод setAttrs, или метод setAttr, или любую их комбинацию. Вот пример использования двух методов сразу:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttrs(['id' => 'test', 'class' => 'eee'])
		->setAttr('type', 'text')
		->open(); // выведет &lt;input id="test" class="eee" type="text">
?></pre>
	</code>
	<p>
		Так как у нас уже реализован метод setAttr, то реализация нового метода setAttrs становится элементарной:
	</p>
		<code>
		<pre>
&lt;?php
	public function setAttrs($attrs)
	{
		foreach ($attrs as $name => $value) {
			$this->setAttr($name, $value);
		}
		
		return $this;
	}
?></pre>
	</code>
		<div class="task">
	<h6>
		2) Добавьте в ваш класс Tag описанный метод setAttrs. Проверьте его работу.
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
class Tag {
	private $name;
	private $attrs;

	public function __construct($name, $attrs = []) {
		$this->name = $name;
		$this->attrs = $attrs;
	}
	public function setAttr($name, $value){
		$this->attrs[$name] = $value;
		return $this;
	}
	public function removeAttr($removAttrName){
		$filteredArr = [];
		foreach($this->attrs as $name => $value){
			if ($name != $removAttrName){
				$filteredArr[$name] = $value;
			}
		}
		$this->attrs = $filteredArr;
		return $this;
	}
	public function open(){
		$name = $this->name;
		return '<'.$name.' '.$this->getAttrsStr().'>';
	}
	public function close(){
		return '</'.$this->name.'>';
	}
	private function getAttrsStr(){
		$attrs = $this->attrs;
		if(!empty($attrs)){
			$attrStr = '';
			foreach($attrs as $attrName => $attrValue){
				$attrStr .="$attrName=\"$attrValue\"";
			}
			return $attrStr;
		} else {
			return '';
		}
	}
}
// $div1 = new Tag('div');
// echo $div1->setAttr('id', 'test')->removeAttr('id')->open().'div test'.$div1->close();
// $div2 = new Tag('div',['class'=>'aaa bbb']);
// echo $div2->setAttr('id', 'test')->removeAttr('class')->open().'div test2'.$div2->close();
	?>
	</div>