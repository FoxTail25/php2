<main>
	<h2 class="text-center pt-2">
		Окончательный вариант класса Tag
	</h2>
	<p>
		В данном уроке я приведу окончательный вариант класса Tag, который мы и будем использовать в дальнейшем в следующих уроках. Так как код класса достаточно большой и в нем много методов, было бы удобно сделать так, чтобы наш класс реализовывал некоторый интерфейс, в котором в компактном виде были бы прописаны все публичные методы, который должен иметь наш класс. Добавим в интерфейс все публичные методы, описанные в уроках, а также те методы, которые были описаны в виде задач. Итак, вот наш интерфейс:
	</p>
<code>
		<pre>
&lt;?php
interface iTag
	{
		// Геттер имени:
		public function getName();
		
		// Геттер текста:
		public function getText();
		
		// Геттер всех атрибутов:
		public function getAttrs();
		
		// Геттер одного атрибута по имени:
		public function getAttr($name);
		
		// Открывающий тег, текст и закрывающий тег:
		public function show();
		
		// Открывающий тег:
		public function open();
		
		// Закрывающий тег:
		public function close();
		
		// Установка текста:
		public function setText($text);
		
		// Установка атрибута:
		public function setAttr($name, $value = true);
		
		// Установка атрибутов:
		public function setAttrs($attrs);
		
		// Удаление атрибута:
		public function removeAttr($name);
		
		// Установка класса:
		public function addClass($className);
		
		// Удаление класса:
		public function removeClass($className);
	}
?></pre>
	</code>
	<p>
		А вот код нашего класса Tag, реализующего интерфейс iTag:
	</p>
	<code>
			<pre>
	&lt;?php
	class Tag implements iTag {
		private $name;
		private $attrs = [];
		private $text = '';
		
		public function __construct($name) {
			$this->name = $name;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getText() {
			return $this->text;
		}
		
		public function getAttrs() {
			return $this->attrs;
		}
		
		public function getAttr($name) {
			if (isset($this->attrs[$name])) {
				return $this->attrs[$name];
			} else {
				return null;
			}
		}
		
		public function show() {
			return $this->open() . $this->text . $this->close();
		}
		
		public function open() {
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs);
			
			return "<$name$attrsStr>";
		}
		
		public function close() {
			$name = $this->name;
			return "</$name>";
		}
		
		public function setText($text) {
			$this->text = $text;
			return $this;
		}
		
		public function setAttr($name, $value = true) {
			$this->attrs[$name] = $value;
			return $this;
		}
		
		public function setAttrs($attrs) {
			foreach ($attrs as $name => $value) {
				$this->setAttr($name, $value);
			}
			
			return $this;
		}
		
		public function removeAttr($name) {
			unset($this->attrs[$name]);
			return $this;
		}
		
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
		
		public function removeClass($className) {
			if (isset($this->attrs['class'])) {
				$classNames = explode(' ', $this->attrs['class']);
				
				if (in_array($className, $classNames)) {
					$classNames = $this->removeElem($className, $classNames);
					$this->attrs['class'] = implode(' ', $classNames);
				}
			}
			
			return $this;
		}
		
		private function getAttrsStr($attrs) {
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
		
		private function removeElem($elem, $arr) {
			$key = array_search($elem, $arr);
			array_splice($arr, $key, 1);
			
			return $arr;
		}
	}
	?></pre>
		</code>

	<p class="text-center">
		<a href="/page/practice/additional-methods" class="p-2">Назад</a>
		<a href="/page/practice/Image"  class="p-2">Далее</a>
	</p>
</main>