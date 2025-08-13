<main>
	<h2 class="text-center pt-2">Полиморфизм в ООП на PHP</h2>
<p>
На ресурсе habr.com, есть статья объясняющая что такое <a href="https://habr.com/ru/articles/37610/" target="_blank">"полиморфизм на PHP"</a>
</p>
<div class="task">
	<h6>
		1) Не подсматривая в теорию расскажите своими словами о том, как вы поняли значения понятия "полиморфизм".
	</h6>
	<p>
		<!-- Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	var_dump(get_declared_classes());
	?></pre> -->
	</code>
	<p>
		Результат:
	</p>
	<p>Мне сложно отличить "полиформизм" от "наследования". Но из вышепредставленной статьи я понял следующее:</p>
	<p>Допустим у нас есть класс "Животные"</p>
<code>
	<pre>
		class Animal {
			private $sound;

			public function __construct($sound){
			$this->sound = $sound;
			}
			
			public function getSound(){
				return $this->sound;
			}
		}</pre>
</code>
<p>Все животные разные, но все так или иначе издают какие-либо звуки. Использую "наследование" мы можем передавать это свойство другим животным принадлежащим к этому классу.</p>
<code>
	<pre>
		class Cat extends Animal {}
		$cat = new Cat('мяу');
		class Dog extends Animal {}
		$cat = new Cat('гав');
		class Cow extends Animal {}
		$cat = new Cat('муу');
	</pre>
</code>
<p>
	Все животные разные, и каждое животное издаёт свой звук. Благодаря полиформизму метод "getSound()" воспроизведёт звук любого животного, которое наследует этот метод от класса Animal.
</p>
</div>
<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/abstract-classes"  class="p-2">Далее</a>
</p>
</main>