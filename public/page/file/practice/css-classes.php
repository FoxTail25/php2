<main>
	<h2 class="text-center pt-2">
		CSS классы в классе Tag
	</h2>
	<p>
        Пусть у нас дан вот такой инпут с атрибутом class:
	</p>
	<code>
		<pre>
&lt;?php
	&lt;input class="eee bbb kkk">
?></pre>
	</code>
	<p>
		Как вы видите, атрибут class содержит в себе несколько значений, разделенных пробелами. Эти значения представляют собой несколько CSS классов нашего элемента. Давайте реализуем в нашем классе Tag набор методов, которые будут работать с этими CSS классами. Например, было бы удобно иметь метод addClass, добавляющий еще один класс в строку с классами. При этом наш метод должен проверять то, что добавляемый класс еще не присутствует среди классов элемента, иначе добавление нового класса будет приводить к тому, что у элемента будет несколько одинаковых классов, что, конечно же, неправильно.Пример использования желаемого нами метода:
	</p>
	<code>
		<pre>
&lt;?php
	// Выведет &lt;input class="eee bbb">:
	echo (new Tag('input'))->addClass('eee')->addClass('bbb')->open();
?></pre>
	</code>
	<p>
		Было бы также удобно иметь метод removeClass для удаления заданного класса элемента. Практическое применение этих методов вы еще увидите в следующих уроках. Давайте реализуем описанные методы.
	</p>
	<h5 class="text-center">Добавление класса</h5>
	<p>
		Как вы знаете, наш класс Tag хранит атрибуты тега в свойстве $this->attrs. Данное свойство представляет собой массив. В этом массиве может быть элемент с ключом class, содержащий CSS классы элемента. Элемента с таким ключом может, однако, и не быть. Все зависит от того, был ли при создании тега вызван метод setAttr для установки атрибута class или нет. Вот пример того, когда он был вызван:
	</p>
	<code>
		<pre>
&lt;?php
	// Выведет &lt;input class="eee bbb">:
	echo (new Tag('input'))->setAttr('class', 'eee bbb')->open();
?></pre>
	</code>
	<p>
		А вот пример того, когда он не был вызван:
	</p>
	<code>
		<pre>
&lt;?php
	// Выведет &lt;input id="test">:
	echo (new Tag('input'))->setAttr('id', 'test')->open();
?></pre>
	</code>
	<p>
		В реализации нашего метода addClass нужно будет учесть оба варианта. Получается, что если у элемента не заданы CSS классы, то вызов метода addClass должен просто создавать в массиве $this->attrs новый элемент с ключом class и записывать в него переданный класс:
	</p>
	<code>
		<pre>
&lt;?php
	public function addClass($className)	{
		// Если ключа class нет в массиве $this->attrs:
		if (!isset($this->attrs['class'])) {
			$this->attrs['class'] = $className; // запишем наш CSS класс
		}
		return $this; // возвращаем $this для работы цепочки
	}
?></pre>
	</code>
	<p>
		Обратите внимание на то, что параметр метода называется $className, а не $class, так как слово class является зарезервированным в PHP и его нельзя использовать в качестве имени переменной. Давайте теперь рассмотрим второй вариант, когда в $this->attrs['class'] уже есть один или несколько классов. Как уже упоминалось выше, эти классы были добавлены ранее с помощью метода setAttr. Эти классы также могли быть добавлены с помощью вызова метода (или цепочки методов) addClass. Способ добавления, в общем-то, не имеет никакого значения, главное, что, если классы есть, то они хранятся в виде строки, разделенные пробелами. Либо, если там один класс, то в $this->attrs['class'] просто хранится его имя, без пробелов. Пусть в $this->attrs['class'] хранится несколько классов. В этом случае будет удобнее работать не со строкой с пробелами, а с массивом CSS классов. Для этого можно просто разбить нашу строку в массив с помощью функции explode:
	</p>
	<code>
		<pre>
&lt;?php
	public function addClass($className){
		if (isset($this->attrs['class'])) {
			// Получаем массив классов:
			$classNames = explode(' ', $this->attrs['class']);
		}
		return $this;
	}
?></pre>
	</code>
	<p>
		Затем необходимо проверить отсутствие переданного класса в этом массиве классов. Это легко сделать с помощью функции in_array:
	</p>
	<code>
		<pre>
&lt;?php
	public function addClass($className)
	{
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);
			
			// Если такого класса нет в массиве классов:
			if (!in_array($className, $classNames)) {
				// добавим новый класс
			}
		}
		
		return $this;
	}
?></pre>
	</code>
	<p>
		Если переданного класса нет в массиве классов, то добавим его к уже существующим классам. А если есть - то просто ничего не будем делать. Давайте реализуем добавление класса:
	</p>
	<code>
		<pre>
&lt;?php
	public function addClass($className) {
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);			
			if (!in_array($className, $classNames)) {
				// Добавим новый класс в массив с классами:
				$classNames[] = $className;				
				// Сольем массив в строку и запишем ее в $this->attrs['class']:
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}		
		return $this;
	}
?></pre>
	</code>
	<p>
		Рассмотрим теперь вариант, когда в $this->attrs['class'] хранится только один класс. На самом деле, реализованный выше код будет прекрасно работать и в этом случае: применение explode к строке без пробела просто вернет массив из одного элемента, представляющего собой эту строку. Ну и далее все наши манипуляции будут работать также. Давайте соберем весь наш код вместе:
	</p>
	<code>
		<pre>
&lt;?php
	public function addClass($className) {
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);			
			if (!in_array($className, $classNames)) {
				$classNames[] = $className;
				$this->attrs['class'] = implode(' ', $classNames);
			}
		} else {
			$this->attrs['class'] = $className;
		}	
		return $this;
	}
?></pre>
	</code>
    <div class="task">
	<h6>
		1) Самостоятельно реализуйте описанный метод и добавьте его в ваш класс Tag. Проверьте работу созданного метода, используя приведенные ниже примеры:
<code>
		<pre>
&lt;?php
// Выведет &lt;input class="eee">:
	echo (new Tag('input'))->addClass('eee')->open();

// Выведет &lt;input class="eee bbb">:
echo (new Tag('input'))->addClass('eee')->addClass('bbb')->open();

// Выведет &lt;input class="eee bbb kkk">:
echo (new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('kkk')->open();

// Выведет &lt;input class="eee bbb">:
echo (new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();

// Выведет &lt;input class="eee bbb">:
echo (new Tag('input'))
	->addClass('eee')
	->addClass('bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();
?></pre>
	</code>		
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
	public function addClass($className){
		if(isset($this->attrs['class'])){
			$classNames = explode(' ', $this->attrs['class']);
			if(!in_array($className, $classNames)){
				$classNames[]=$className;
				$this->attrs['class'] = implode(' ', $classNames);
			} 
		}
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
echo 'Выведет &lt;input class="eee">: '.(new Tag('input'))->addClass('eee')->open();
echo '&lt;br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))->addClass('eee')->addClass('bbb')->open();
echo '&lt;br/>';
echo 'Выведет &lt;input class="eee bbb kkk">: '.(new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('kkk')->open();
echo '&lt;br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();
echo '&lt;br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))
	->addClass('eee')
	->addClass('bbb')
	->addClass('eee') // такой класс уже есть и не добавится
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
	public function addClass($className){
		if(isset($this->attrs['class'])){
			$classNames = explode(' ', $this->attrs['class']);
			if(!in_array($className, $classNames)){
				$classNames[]=$className;
				$this->attrs['class'] = implode(' ', $classNames);
			} 
		} else {
			$this->attrs['class'] = $className;
		}
		return $this;
	}
	public function removeClass($className)	{
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);		
			if (in_array($className, $classNames)) {
				$classNames = $this->removeElem($className, $classNames);
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}
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
	private function removeElem($elem, $arr)
	{
		$key = array_search($elem, $arr);
		array_splice($arr, $key, 1);
		
		return $arr;
	}
}
echo 'Выведет &lt;input class="eee">: '.(new Tag('input'))->addClass('eee')->open();
echo '<br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))->addClass('eee')->addClass('bbb')->open();
echo '<br/>';
echo 'Выведет &lt;input class="eee bbb kkk">: '.(new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('kkk')->open();
echo '<br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))
	->setAttr('class', 'eee bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();
echo '<br/>';
echo 'Выведет &lt;input class="eee bbb">: '.(new Tag('input'))
	->addClass('eee')
	->addClass('bbb')
	->addClass('eee') // такой класс уже есть и не добавится
	->open();
	?>
	</div>
		<h5 class="text-center mt-3">Удаление класса</h5>
	<p>
		Давайте теперь реализуем удаление CSS класса. Для этого было бы удобно иметь вспомогательный метод, который будет удалять элемент из массива по тексту этого элемента. В PHP, к сожалению, нет такой встроенной функции, поэтому реализуем ее в виде приватного метода:
	</p>
	<code>
		<pre>
&lt;?php
	private function removeElem($elem, $arr) {
		$key = array_search($elem, $arr); // находим ключ элемента по его тексту
		array_splice($arr, $key, 1); // удаляем элемент
		
		return $arr; // возвращаем измененный массив
	}
?></pre>
	</code>
	<p>
		Используя метод removeElem мы теперь можем реализовать метод removeClass для удаления CSS классов. Реализуем:
	</p>
	<code>
		<pre>
&lt;?php
	public function removeClass($className)	{
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);		
			if (in_array($className, $classNames)) {
				$classNames = $this->removeElem($className, $classNames);
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}
		return $this;
	}
?></pre>
	</code>
		    <div class="task">
	<h6>
		2) Самостоятельно реализуйте описанный метод и добавьте его в ваш класс Tag. Проверьте его работу, например, так:
<code>
		<pre>
&lt;?php
	echo (new Tag('input'))
		->setAttr('class', 'eee zzz kkk') // добавим 3 класса
		->removeClass('zzz') // удалим класс 'zzz'
		->open(); // выведет &lt;input class="eee kkk">
?></pre>
	</code>		
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
	public function addClass($className){
		if(isset($this->attrs['class'])){
			$classNames = explode(' ', $this->attrs['class']);
			if(!in_array($className, $classNames)){
				$classNames[]=$className;
				$this->attrs['class'] = implode(' ', $classNames);
			} 
		}
		return $this;
	}
	public function removeClass($className)	{
		if (isset($this->attrs['class'])) {
			$classNames = explode(' ', $this->attrs['class']);
			if (in_array($className, $classNames)) {
				$classNames = $this->removeElem($className, $classNames);
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}		
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
		private function removeElem($elem, $arr) {
		$key = array_search($elem, $arr); 
		array_splice($arr, $key, 1); 
		
		return $arr;
	}
}
echo (new Tag('input'))
	->setAttr('class', 'eee zzz kkk')
	->removeClass('zzz') 
	->open(); &lt;input class="eee kkk">
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	echo (new Tag('input'))
		->setAttr('class', 'eee zzz kkk') // добавим 3 класса
		->removeClass('zzz') // удалим класс 'zzz'
		->open(); // выведет <input class="eee kkk">
	?>
	</div>
	<p class="text-center">
		<a href="/page/practice/attributes-without-value" class="p-2">Назад</a>
		<a href="/page/practice/additional-methods"  class="p-2">Далее</a>
	</p>
</main>