<main>
	<h2 class="text-center pt-2">Использование трейтов в трейтах</h2>
<p>
	Трейты, подобно классам, также могут использовать другие трейты. Давайте посмотрим на примере. Пусть у нас есть вот такой трейт с двумя методами:
</p>
<code>
<pre>&lt;?php
	trait Trait1{
		private function method1(){
			return 1;
		}
		private function method2(){
			return 2;
		}
	}
?></pre>
</code>
<p>
Пусть у нас также есть еще один трейт:
</p>
<code>
<pre>&lt;?php
	trait Trait2
	{
		private function method3()
		{
			return 3;
		}
	}
?></pre>
</code>
<p>
Давайте к трейту Trait2 подключим трейт Trait1:
</p>
<code>
<pre>&lt;?php
	trait Trait2
	{
		use Trait1; // используем первый трейт
		
		private function method3()
		{
			return 3;
		}
	}
?></pre>
</code>
<p>
После такого подключения получится, что Trait2 кроме своих методов будет иметь еще и методы трейта Trait1. Проверим это: сделаем класс Test, подключим к нему трейт Trait2 и убедимся, что в нашем классе появятся методы как первого трейта, так и второго:
</p>
<code>
<pre>&lt;?php
	class Test
	{
		use Trait2; // подключаем второй трейт
		
		public function __construct()
		{
			echo $this->method1(); // метод первого трейта
			echo $this->method2(); // метод первого трейта
			echo $this->method3(); // метод второго трейта
		}
	}
?></pre>
</code>
<div class="task">
	<h6>
		2) Самостоятельно сделайте такие же трейты, как у меня и подключите их к классу Test. Сделайте в этом классе метод getSum, возвращающий сумму результатов методов подключенных трейтов.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
		trait Trait1{
			public function method1(){
				return 1;
			}
		}
		trait Trait2{
			use Trait1;
			public function method2(){
				return 2;
			}
		}
		trait Trait3{
			use Trait2;
			public function method3(){
				return 3;
			}
		}
		class Test{
			use Trait3;
			public function getSum(){
				return $this->method1() + $this->method2() + $this->method3();
			}
		}
		$test = new Test;
		echo $test->getSum();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
		trait Trait1{
			public function method1(){
				return 1;
			}
		}
		trait Trait2{
			use Trait1;
			public function method2(){
				return 2;
			}
		}
		trait Trait3{
			use Trait2;
			public function method3(){
				return 3;
			}
		}
		class Test{
			use Trait3;
			public function getSum(){
				return $this->method1() + $this->method2() + $this->method3();
			}
		}
		$test = new Test;
		echo $test->getSum();
	?>
</div>


<p class="text-center">
	<a href="/page/traits/abstract-methods" class="p-2">Назад</a>
	<a href="/page/traits/functions"  class="p-2">Далее</a>
</p>
</main>