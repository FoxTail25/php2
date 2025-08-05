<main>
	<h2 class="text-center pt-2">Модификатор доступа protected в ООП на PHP</h2>
	<p>
	Как вы уже знаете, приватные свойства и методы не наследуются. Если вы хотите, чтобы метод или свойство появились у потомка, вы должны объявить их как public. Проблема, однако, в том, что публичные методы будут также доступны и извне класса, а мы бы этого не хотели.<br/>Другими словами, мы хотели бы, чтобы некоторые методы или свойства родителя наследовались потомками, но при этом для всего остального мира вели себя как приватные.<br/>Для решения этой проблемы существует специальный модификатор protected, который и реализует описанное. Давайте изучим его работу на реальном примере. Пусть у нас дан вот такой класс User с приватными свойствами name и age:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		private $name;
		private $age;
		
		public function getName()
		{
			return $this->name;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function getAge()
		{
			return $this->age;
		}
		
		public function setAge($age)
		{
			$this->age = $age;
		}
	}
?>
</pre>
</code>
<p>
Пусть от класса User наследует класс Student:
</p>
<code>
<pre>
&lt;?php
	class Student extends User
	{
		private $course;
		
		public function getCourse()
		{
			return $this->course;
		}
		
		public function setCourse($course)
		{
			$this->course = $course;
		}
	}
?>
</pre>
</code>
<p>
	Пока все отлично и все работает.

Пусть теперь мы решили в классе Student сделать метод addOneYear, который будет добавлять 1 год к свойству age. Давайте реализуем указанный метод:
</p>






<p class="text-center">
	<a href="/page/oop/class-as-methods-set" class="p-2">Назад</a>
	<a href="/page/oop/access-modifier-protected"  class="p-2">Далее</a>
</p>
</main>