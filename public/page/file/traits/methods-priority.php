<main>
	<h2 class="text-center pt-2">Приоритет методов</h2>
<p>
Если в классе и в трейте есть одноименный метод, то метод класса переопределит метод трейта:
</p>

<code>
<pre>
&lt;?php
		trait TestTrait
	{
		// Метод с именем method:
		public function method()
		{
			return 'trait';
		}
	}
	
	class TestClass
	{
		use TestTrait;
		
		// Такой же метод с именем method:
		public function method()
		{
			return 'test';
		}
	}
	
	$test = new TestClass;
	echo $test->method(); // выведет 'test' - сработал 
		метод самого класса 
?></pre>
</code>
<p>
    Если же сам класс не имеет такого метода, но имеется конфликт имен методов трейта и методов родительского класса, то методы трейта имеют приоритет:
</p>
<code>
    <pre>
    &lt;?php>
    	trait TestTrait
	{
		// Метод с именем method:
		public function method()
		{
			return 'trait';
		}
	}
	
	// Родительский класс:
	class ParentClass
	{
		// Метод с именем method:
		public function method()
		{
			return 'parent';
		}
	}
	
	// Класс наследует метод method от родительского:
	class TestClass extends ParentClass
	{
		use TestTrait;
	}
	
	$test = new TestClass;
	echo $test->method(); // выведет 'trait', тк 
		трейт имеет приоритет 
    ?></pre>
</code>

<p class="text-center">
	<a href="/page/traits/access-modifiers" class="p-2">Назад</a>
	<a href="/page/traits/abstract-methods"  class="p-2">Далее</a>
</p>
</main>