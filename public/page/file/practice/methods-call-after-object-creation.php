<main>
	<h2 class="text-center pt-2">
		Вызов методов сразу после создания объекта Tag
	</h2>
	<p>
        Пусть с помощью нашего класса Tag мы создаем инпут:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test')
		->setAttr('class', 'eee bbb')
		->open();
?></pre>
	</code>
	<p>
		Можно не создавать отдельную переменную для объекта, а создать его на месте и сразу начать применять к нему цепочку методов:
	</p>
		<code>
		<pre>
&lt;?php
	echo (new Tag('input'))
		->setAttr('id', 'test')
		->setAttr('class', 'eee bbb')
		->open();
?></pre>
	</code>
	<p>
		Такое удобно в том случае, когда создаваемый тег уникальный и нужен нам только в одном месте. В этом случае мы не будем плодить лишних переменных.
	</p>
    <div class="task">
	<h6>
		1) Создайте указанным способом два инпута. Первый с атрибутом name в значении name1, а второй с таким же атрибутом в значении name2.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
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
	public function setAttrs($arr){
		foreach($arr as $name => $value){
			$this->setAttr($name,$value);
		}
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
				if ($attrValue === true) {
					$attrStr .="$attrName";	
				} else {
					$attrStr .="$attrName=\"$attrValue\"";
				}
			}
			return $attrStr;
		} else {
			return '';
		}
	}
}
echo (new Tag('input'))
	->setAttr('name', 'name1')
	->open();
echo (new Tag('input',['name'=>'name2']))
	->open();
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
	public function setAttrs($arr){
		foreach($arr as $name => $value){
			$this->setAttr($name,$value);
		}
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
				if ($attrValue === true) {
					$attrStr .="$attrName";	
				} else {
					$attrStr .="$attrName=\"$attrValue\"";
				}
			}
			return $attrStr;
		} else {
			return '';
		}
	}
}
echo (new Tag('input'))
		->setAttr('name', 'name1')
		->open();
echo (new Tag('input',['name'=>'name2']))
		->open();
	?>
	</div>
	<p class="text-center">
		<a href="/page/practice/attributes-without-value" class="p-2">Назад</a>
		<a href="/page/practice/css-classes"  class="p-2">Далее</a>
	</p>
</main>