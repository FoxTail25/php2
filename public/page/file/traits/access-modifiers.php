<main>
	<h2 class="text-center pt-2">Модификаторы доступа и трейты</h2>
<p>
Следует обратить ваше внимание на то, что использование трейтов - это не наследование. При наследовании приватные методы и свойства не наследуются.
В трейтах же все наоборот: в использующем трейт классе будут доступны как публичные, так и приватные методы и свойства класса.
Посмотрим на примере:
</p>

<code>
<pre>
&lt;?php
	trait TestTrait	{
		// Приватный метод:
		private function method(){
			return '!!!';
		}
	}
	
	class Test{
		use TestTrait; // подключаем трейт
		
		public function __construct(){
			// Используем приватный метод трейта:
			echo $this->method(); // выведет '!!!'
		}
	}
	
	new Test;
?></pre>
</code>
<h5 class="text-center">Изменения прав доступа к методам трейта</h5>
<p>
	Внутри трейта можно использовать любой модификатор доступа для методов (то есть public, private или protected). При необходимости, однако, в самом классе можно этот модификатор поменять на другой. Для этого в теле use после ключевого слова as нужно указать новый модификатор.

	Посмотрим на примере:
</p>
<code>
<pre>
&lt;?php
	trait TestTrait
	{
		// Приватный метод:
		private function method()
		{
			return '!!!';
		}
	}
	
	class Test
	{
		use TestTrait {
			TestTrait::method as public; // меняем 
				метод на публичный 
		}
	}
	
	$test = new Test;
	echo $test->method(); // выведет '!!!'
?></pre>
</code>

<p class="text-center">
	<a href="/page/traits/intro" class="p-2">Назад</a>
	<a href="/page/traits/methods-priority"  class="p-2">Далее</a>
</p>
</main>