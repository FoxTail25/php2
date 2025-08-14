<main>
	<h2 class="text-center pt-2">Наследование от класса и реализация интерфейса</h2>
<p>
	Класс может наследовать от другого класса и при этом реализовывать какой-то интерфейс. Рассмотрим на практическом примере.
	Пусть мы хотим сделать класс Programmer, у которого будет имя, зарплата и список языков, которые знает программист.
	Пока наше описание класса весьма расплывчато: да, в классе будет имя, зарплата, языки - но какие методы будут в нашем классе?
	Давайте более точно опишем наш класс с помощью интерфейса iProgrammer:
</p>
<code>
<pre>
&lt;?php
	interface iProgrammer {
		public function __construct($name, $salary);
		public function getName();
		public function getSalary();
		public function getLangs();
		public function addLang($lang);
	}
?></pre>
</code>
<p>
	Пусть мы покопались в уже реализованных нами классах и, оказывается, у нас уже есть похожий класс Employee. Он реализует не все методы класса Programmer, но часть. Вот код уже существующего у нас класса:
</p>
<code>
<pre>
&lt;?php
	class Employee {
		private $name;
		private $salary;
		
		public function __construct($name, $salary)
		{
			$this->name = $name;
			$this->salary = $salary;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getSalary()
		{
			return $this->salary;
		}
	}
?></pre>
</code>
<p>
	Логично в нашем случае сделать так, чтобы наш новый класс Programmer унаследовал часть необходимых себе методов от класса Employee (а часть мы потом реализуем уже в самом новом классе):
</p>
<code>
<pre>
&lt;?php
	class Programmer extends Employee
	{
		
	}
?></pre>
</code>
<p>
	При этом нам известно, что класс Pogrammer должен реализовывать интерфейс iProgrammer:
</p>
<code>
<pre>
&lt;?php
	class Programmer implements iProgrammer
	{
		
	}
?></pre>
</code>
<p>
	Давайте совместим наследование от класса Employee и реализацию интерфейса iProgrammer:
</p>
<code>
<pre>
&lt;?php
	class Programmer extends Employee implements iProgrammer
	{
		
	}
?></pre>
</code>
<p>
	Получится, что наш класс Pogrammer унаследует от класса Employee методы __construct, getName и getSalary, а методы addLang и getLangs нам придется реализовать:
</p>
<code>
<pre>
&lt;?php
	class Programmer extends Employee implements iProgrammer
	{
		public function addLang($lang)
		{
			// реализация
		}
		
		public function getLangs()
		{
			// реализация
		}
	}
?></pre>
</code>
<p>
	Интерфейсу iProgrammer все равно, родные методы у класса или унаследованные - главное, чтобы все описанные методы были реализованы.
</p>
<div class="task">
	<h6>
		1) Скопируйте код моего класса Employee и код интерфейса iProgrammer. Не копируйте мою заготовку класса Programmer - не подсматривая в мой код реализуйте этот класс самостоятельно.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iProgrammer{
		public function __construct(string $name, int $sarary);
		public function getName();
		public function getSalary();
		public function getLangs();
		public function addLangs($lang);
	}
	class Employee {
		private string $name;
		private int $salary;

		public function __construct(string $name, int $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
		public function getName(){
			return $this->name;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
	class Programmer extends Employee implements iProgrammer{
			private $langs=[];
		public function getLangs(){
			return $this->langs;
		}
		public function addLangs($lang){
			$this->langs[]=$lang;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iProgrammer{
		public function __construct(string $name, int $sarary);
		public function getName();
		public function getSalary();
		public function getLangs();
		public function addLangs($lang);
	}
	class Employee {
		private string $name;
		private int $salary;

		public function __construct(string $name, int $salary){
			$this->name = $name;
			$this->salary = $salary;
		}
		public function getName(){
			return $this->name;
		}
		public function getSalary(){
			return $this->salary;
		}
	}
	class Programmer extends Employee implements iProgrammer{
			private $langs=[];
		public function getLangs(){
			return $this->langs;
		}
		public function addLangs($lang){
			$this->langs[]=$lang;
		}
	}
	?>
</div>

<p class="text-center">
	<a href="/page/interfaces/several-interfaces-implementation" class="p-2">Назад</a>
	<a href="/page/interfaces/constants"  class="p-2">Далее</a>
</p>
</main>