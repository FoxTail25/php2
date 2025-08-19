<main>
	<h2 class="text-center pt-2">
		Методы цепочкой в классе Tag
	</h2>
	<p>
		Давайте вынесем добавление атрибутов из конструктора в отдельный метод setAttr. Пусть при этом наш метод позволяет добавлять только один атрибут, а чтобы добавить несколько атрибутов - нужно будет вызвать несколько методов в виде цепочки.

		Смотрите пример использования нашего метода:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	echo $tag->setAttr('id', 'test')->setAttr('class', 'eee bbb')->open();
?>
		</pre>
	</code>
	<p>
		С комментариями:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('input');
	
	echo $tag
		->setAttr('id', 'test') // добавляем атрибут 'id'
		->setAttr('class', 'eee bbb') // добавляем атрибут 'class'
		->open(); // выведет &lt;input id="test" class="eee bbb">
?>
		</pre>
	</code>
	<p>
		Пока мы предполагаем, что наша цепочка всегда завершается методом open. Если тег должен иметь еще и закрывающую часть, то мы будем вызывать метод close вне цепочки, вот так:
	</p>
	<code>
		<pre>
&lt;?php
	$tag = new Tag('div');
	echo $tag->setAttr('id', 'test')->open(); // откроем тег
	echo $tag->close(); // закроем тег
?>
		</pre>
	</code>
	<p>
		Итак, давайте реализуем метод setAttr в нашем классе:
	</p>
	<code>
		<pre>
&lt;?php
	class Tag
	{
		private $name;
		private $attrs = []; // изначально пустой массив
		
		public function __construct($name){
			$this->name = $name;
		}
		// Реализуем метод для атрибутов:
		public function setAttr($name, $value){
			$this->attrs[$name] = $value;
			return $this; // возвращаем $this чтобы была цепочка
		}
		public function open(){
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs);
			
			return "<$name$attrsStr>";
		}
		public function close(){
			$name = $this->name;
			return "</$name>";
		}
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
?>
		</pre>
	</code>
	<div class="task">
	<h6>
		1) Самостоятельно добавьте метод setAttr в созданный вами в предыдущем уроке класс Tag.
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


	<p class="text-center">
		<a href="/page/practice/tag-attributes" class="p-2">Назад</a>
		<a href="/page/practice/"  class="p-2">Далее</a>
	</p>
</main>