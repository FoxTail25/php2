<main>
	<h2 class="text-center pt-2">Магический метод toString в ООП на PHP</h2>
<p>
Методы PHP, начинающиеся с двойного подчеркивания __, называются магическим. Магия таких методов состоит в том, что они могут вызываться при совершении какого-то действия автоматически.
Первый магический метод, который мы с вами изучим, называется __toString. Он вызывается при попытке приведения экземпляра класса к строке. Давайте разберемся, что это значит. Пусть у нас дан вот такой класс User:
</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
	}
?></pre>
</code>