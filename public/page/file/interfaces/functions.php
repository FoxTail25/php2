<main>
	<h2 class="text-center pt-2">
		Функции для работы с интерфейсами в ООП на PHP
	</h2>
	<h5 class="text-center mt-3">
		Функция interface_exists
	</h5>
	<p class="bg-secondary-subtle p-2">
		Изучить теорию по следующей ссылке 
		<a href="https://www.php.net/manual/ru/function.interface-exists.php" target="_blank">
			interface_exists
		</a>
	</p>
	<div class="task">
		<h6>
			1) Пусть у вас есть интерфейс iTest1 и нет интерфейса iTest2.

			Проверьте, что выведет функция interface_exists для интерфейса iTest1 и для интерфейса iTest2.
		</h6>
		<p>
			Решение:
		</p>
		<code>
			<pre>
		&lt;?php
		interface iTest1{};
		var_dump(interface_exists('iTest1'));
		echo '&lt;br/>';
		var_dump(interface_exists('iTest2'));
		?></pre>
		</code>
		<p>
			Результат:
		</p>
		<?php
		interface iTest1{};
		var_dump(interface_exists('iTest1'));
		echo '<br/>';
		var_dump(interface_exists('iTest2'));
		?>
	</div>
	<h5 class="text-center mt-3">
		Функция get_declared_interfaces
	</h5>
	<p class="bg-secondary-subtle p-2">
		Изучить теорию по следующей ссылке 
		<a href="https://www.php.net/manual/ru/function.get-declared-interfaces.php" target="_blank">
			get_declared_interfaces
		</a>
	</p>
	<div class="task">
		<h6>
			1) Выведите на экран список всех объявленных интерфейсов.
		</h6>
		<p>
			Решение:
		</p>
		<code>
			<pre>
		&lt;?php
		var_dump(get_declared_interfaces());
		?></pre>
		</code>
		<p>
			Результат:
		</p>
		<?php
		var_dump(get_declared_interfaces());
		?>
	</div>








	<p class="text-center">
		<a href="/page/interfaces/inheritance-and-implementation" class="p-2">Назад</a>
		<a href="/page/traits/intro"  class="p-2">Далее</a>
	</p>
</main>