<main>
	<h2 class="text-center pt-2">
		Функции для работы трейтами в ООП на PHP
	</h2>
	<h5 class="text-center mt-3">
		Функция trait_exists
	</h5>
	<p class="bg-secondary-subtle p-2">
		Изучить теорию по следующей ссылке 
		<a href="https://www.php.net/manual/ru/function.trait-exists.php" target="_blank">
			trait_exists
		</a>
	</p>
	<div class="task">
		<h6>
			1) Пусть у вас есть трейт Trait1 и нет трейта Trait2. Проверьте, что выведет функция trait_exists для трейта Trait1 и для трейта Trait2.
		</h6>
		<p>
			Решение:
		</p>
		<code>
<pre>&lt;?php
	trait Trait1{};
	var_dump(trait_exists('Trait1'));
	echo'&lt;br/>';
	var_dump(trait_exists('Trait2'));
?></pre>
		</code>
		<p>
			Результат:
		</p>
		<?php
		trait Trait1{};
		// trait Trait2{};
		var_dump(trait_exists('Trait1'));
		echo'<br/>';
		var_dump(trait_exists('Trait2'));
		?>
	</div>
	<h5 class="text-center mt-3">
		Функция get_declared_traits
	</h5>
	<p class="bg-secondary-subtle p-2">
		Изучить теорию по следующей ссылке 
		<a href="https://www.php.net/manual/ru/function.get-declared-traits.php" target="_blank">
			trait_exists
		</a>
	</p>
	<div class="task">
		<h6>
			1) Выведите на экран список всех объявленных трейтов.
		</h6>
		<p>
			Решение:
		</p>
		<code>
<pre>&lt;?php
var_dump(get_declared_traits());
?></pre>
		</code>
		<p>
			Результат:
		</p>
		<?php
var_dump(get_declared_traits());
		?>
	</div>

<p class="text-center">
	<a href="/page/traits/using-traits-in-trait" class="p-2">Назад</a>
	<a href="/page/magic/toString"  class="p-2">magic</a>
</p>
</main>