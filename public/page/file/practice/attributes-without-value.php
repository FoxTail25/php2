<main>
	<h2 class="text-center pt-2">
		Атрибуты без значения в классе Tag
	</h2>
	<p>
        В HTML существуют атрибуты без значения, например, disabled:
	</p>
	<code>
		<pre>
&lt;?php
&lt;input id="test" disabled>
?></pre>
	</code>
    <p>
        Давайте сделаем так, чтобы метод setAttr мог создавать и такие атрибуты. Пусть, чтобы создать атрибут без значения, вторым параметром метода мы будем передавать значение true:
    </p>
    <code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test')
		->setAttr('disabled', true) // создаем атрибут без значения
		->open(); // выведет &ltinput id="test" disabled>
?></pre>
	</code>
    <p>
        Пока наш класс Tag не дает возможность сделать такой атрибут. Давайте поправим это, внеся соответствующие правки в метод getAttrsStr:
    </p>
    <code>
		<pre>
&lt;?php
	private function getAttrsStr($attrs)
	{
		if (!empty($attrs)) {
			$result = '';
			
			foreach ($attrs as $name => $value) {
				// Если значение атрибута равно true:
				if ($value === true) {
					$result .= " $name"; // это атрибут без значения
				} else {
					$result .= " $name=\"$value\""; // это атрибут со значением
				}
			}
			
			return $result;
		} else {
			return '';
		}
	}
?></pre>
	</code>
    <p>
        Применим изменение к классу:
    </p>
    <code>
		<pre>
&lt;?php
	class Tag
	{
		private $name;
		private $attrs = [];
		
		public function __construct($name)
		{
			$this->name = $name;
		}
		
		public function setAttr($name, $value = true)
		{
			$this->attrs[$name] = $value;
			return $this;
		}
		
		public function open()
		{
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs);
			
			return "<$name$attrsStr>";
		}
		
		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}
		
		private function getAttrsStr($attrs)
		{
			if (!empty($attrs)) {
				$result = '';
				
				foreach ($attrs as $name => $value) {
					if ($value === true) {
						$result .= " $name";
					} else {
						$result .= " $name=\"$value\"";
					}
				}
				
				return $result;
			} else {
				return '';
			}
		}
	}
?></pre>
	</code>
    <p>
        Проверим работу нашего класса:
    </p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test')
		->setAttr('disabled', true)
		->open(); // выведет &lt;input id="test" disabled>
?></pre>
	</code>
    <div class="task">
	<h6>
		1) Самостоятельно внесите соответствующие правки в ваш класс Tag.
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
$inp = new Tag('input');
echo $inp->setAttrs(['class'=>'eee'])->setAttr('disabled',true)->open().$inp->close();
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
$inp = new Tag('input');
echo $inp->setAttrs(['class'=>'eee'])->setAttr('disabled',true)->open()
	?>
	</div>
	<p class="text-center">
		<a href="/page/practice/attributes-via-array" class="p-2">Назад</a>
		<a href="/page/practice/methods-call-after-object-creation"  class="p-2">Далее</a>
	</p>
</main>