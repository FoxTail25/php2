<main>
	<h2 class="text-center pt-2">
		Атрибуты тегов в классе Tag
	</h2>
	<p>
		Пусть теперь мы хотим сделать так, чтобы в создаваемых тегах можно было указывать атрибуты и их значения. Давайте будем передавать атрибуты для тега в виде ассоциативного массива в конструктор тега.

		Вот пример (пока не рабочий, это наша цель):
	</p>
	<code>
		<pre>
	&lt;?php
	$tag = new Tag('input', ['id' => 'test', 'class' => 'eee bbb']);
	echo $tag->open(); // выведет &lt;input id="test" class="eee bbb">
	?></pre>
	</code>
	<p>
		Давайте сделаем в нашем классе вспомогательный приватный метод getAttrsStr, который параметром будет получать массив, а возвращать строку с атрибутами. Пример работы нашего метода:
	</p>
	<code>
		<pre>
	&lt;?php
	$attrs = ['id' => 'test', 'class' => 'eee bbb'];
	echo $this->getAttrsStr($attrs); // выведет ' id="test" class="eee bbb"'
	?></pre>
	</code>
	<p>
		Давайте напишем его реализацию:
	</p>
	<code>
		<pre>
	&lt;?php
	private function getAttrsStr($attrs){
		if (!empty($attrs)) {
			$result = '';
			
			foreach ($attrs as $name => $value) {
				$result .= " $name=\"$value\"";
			}
			
			return $result;
		} else {
			return '';
		}
	}
	?></pre>
	</code>
	<p>
		Добавим созданный метод в наш класс:
	</p>
	<code>
		<pre>
	&lt;?php
	class Tag {
		private $name;
		private $attrs;
		
		public function __construct($name, $attrs = []) {
			$this->name = $name;
			$this->attrs = $attrs; // записываем атрибуты в свойство
		}
		
		public function open() {
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs); // формируем строку с атрибутами
			
			return "<$name$attrsStr>"; // добавляем атрибуты после имени тега
		}
		
		public function close()	{
			$name = $this->name;
			return "</$name>";
		}
		
		// Формируем строку с атрибутами:
		private function getAttrsStr($attrs){
			if (!empty($attrs)) {
				$result = '';
				
				foreach ($attrs as $name => $value) {
					$result .= " $name=\"$value\"";
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
		Проверим работу нашего метода:
	</p>
	<code>
		<pre>
	&lt;?php
	$tag = new Tag('input', ['id' => 'test', 'class' => 'eee bbb']);
	echo $tag->open(); // выведет &lt;input id="test" class="eee bbb">
	?></pre>
	</code>
	<div class="task">
	<h6>
		1) Самостоятельно, не подсматривая в код выше, добавьте в класс Tag возможность добавления атрибутов тега.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Tag{
		private $name;
		private $attrs;
		public function __construct($name, $attrs = []){
			$this->name = $name;
			$this->attrs = $attrs;
		}
		public function open(){
		return '<'.$this->name.' '.$this->getAttrsStr($this->attrs).'>';
		}
		public function close(){
		return '</'.$this->name.'>';
		}

		private function getAttrsStr($attrs){
			if(!empty($attrs)){
				$attrStr = '';
				foreach($this->attrs as $name => $value){
					$attrStr .= "$name=\"$value\" ";
				}
				return $attrStr;
			} else {
				return '';
			}
		}
	}
	$div = new Tag('div', ['id'=>'test', 'class'=>'aaa bbb']);
	echo $div->open().'div text'.$div->close();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	class Tag{
		private $name;
		private $attrs;
		public function __construct($name, $attrs = []){
			$this->name = $name;
			$this->attrs = $attrs;
		}
		public function open(){
		return '<'.$this->name.' '.$this->getAttrsStr($this->attrs).'>';
		}
		public function close(){
		return '</'.$this->name.'>';
		}

		private function getAttrsStr($attrs){
			if(!empty($attrs)){
				$attrStr = '';
				foreach($this->attrs as $name => $value){
					$attrStr .= "$name=\"$value\" ";
				}
				return $attrStr;
			} else {
				return '';
			}
		}
	}
	$div = new Tag('div', ['id'=>'test', 'class'=>'aaa bbb']);
	echo $div->open().'div text'.$div->close();

	?>
	</div>






	
	<p class="text-center">
		<a href="/page/practice/tag" class="p-2">Назад</a>
		<a href="/page/practice/method-chains"  class="p-2">Далее</a>
	</p>
</main>