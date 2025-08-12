<main>
	<h2 class="text-center pt-2">Контроль типов при работе с объектами</h2>
<p>
Пусть у нас дан вот такой класс Employee:	
</p>
<code>
<pre>
&lt;?php
	class Employee
	{
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
?>
</pre>
</code>
<p>
Также пусть дан класс EmployeesCollection для хранения коллекции работников:
</p>
<code>
<pre>
&lt;?php
	class EmployeesCollection
	{
		private $employees = []; // массив работников
		
		// Добавляет работника в набор
		public function add($employee) // параметр - объект класса Employee
		{
			$this->employees[] = $employee; // добавим объект в набор
		}
		
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>
<p>
	Рассмотрим внимательно метод add класса EmployeesCollection: в нем параметром передается объект класса Employee. Однако программисту, читающему наш код, сходу тяжело будет понять, что параметром метода add должен служить именно объект и именно класса Employee.
	Да, мы можем оставить комментарий в нашем коде, чтобы прояснить ситуацию, но это все равно не убережет программиста от ошибок, если он попытается передать, к примеру, объект какого-нибудь другого класса или вообще массив.
	Было бы круто указать тип передаваемого параметра прямо в описании функции. Ранее в учебнике мы с вами уже разбирали подобную возможность для примитивов.
	Можно также явно задать и тип параметра, в который будет передаваться объект - мы можем точно сказать, объект какого класса там ожидается.
	Для этого перед именем переменной параметра следует написать имя ожидаемого класса, в нашем случае Employee.
	Давайте переделаем наш метод add:
</p>
<code>
<pre>
&lt;?php
	class EmployeeCollection
	{
		private $employees = [];
		
		// Явно укажем тип параметра:
		public function add(Employee $employee)
		{
			$this->employees[] = $employee;
		}
		
		public function getTotalSalary()
		{
			$sum = 0;
			
			foreach ($this->employees as $employee) {
				$sum += $employee->getSalary();
			}
			
			return $sum;
		}
	}
?>
</pre>
</code>
<h5 class="text-center mt-3">Задачи</h5>

<div class="task">
	<h6>
		1) Сделайте класс Post (должность), в котором будут следующие свойства, доступные только для чтения: name и salary.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Post{
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
			return $this->salaru;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Post{
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
	?>
</div>
<div class="task">
	<h6>
		2) Создайте несколько объектов класса Post: программист, менеджер водитель.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$programmer = new Post('programmer', 3000);
	$manager = new Post('manager', 2000);
	$driver = new Post('driver', 1000);
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	$programmer = new Post('programmer', 3000);
	$manager = new Post('manager', 2000);
	$driver = new Post('driver', 1000);
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте класс Employee, в котором будут следующие свойства: name и surname. Пусть начальные значения этих свойств будут передаваться параметром в конструктор.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		private string $name;
		private string $surname;

		public function __construct(string $name, string $surname){
			$this->name = $name;
			$this->surname = $surname;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	// class Employee {
	// 	private string $name;
	// 	private string $surname;

	// 	public function __construct(string $name, string $surname){
	// 		$this->name = $name;
	// 		$this->surname = $surname;
	// 	}
	// }
	?>
</div>
<div class="task">
	<h6>
		4) Сделайте геттеры и сеттеры для свойств name и surname.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		private string $name;
		private string $surname;

		public function __construct(string $name, string $surname){
			$this->name = $name;
			$this->surname = $surname;
		}
		public function getName(){
			return $this->name;
		}
		public function getSurname(){
			return $this->surname;
		}
		public function setName(string $newName){
			$this->name = $newName;
		}
		public function setSurname(string $newSurname){
			$this->surname = $newSurname;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	// class Employee {
	// 	private string $name;
	// 	private string $surname;

	// 	public function __construct(string $name, string $surname){
	// 		$this->name = $name;
	// 		$this->surname = $surname;
	// 	}
	// 	public function getName(){
	// 		return $this->name;
	// 	}
	// 	public function getSurname(){
	// 		return $this->surname;
	// 	}
	// 	public function setName(string $newName){
	// 		$this->name = $newName;
	// 	}
	// 	public function setSurname(string $newSurname){
	// 		$this->surname = $newSurname;
	// 	}
	// }
	?>
</div>
<div class="task">
	<h6>
		5) Пусть теперь третьим параметром конструктора будет передаваться должность работника, представляющая собой объект класса Post. Укажите тип этого параметра в явном виде.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		private string $name;
		private string $surname;
		public Post $post;

		public function __construct(string $name, string $surname, Post $post){
			$this->name = $name;
			$this->surname = $surname;
			$this->post = $post;
		}
		public function getName(){
			return $this->name;
		}
		public function getSurname(){
			return $this->surname;
		}
		public function setName(string $newName){
			$this->name = $newName;
		}
		public function setSurname(string $newSurname){
			$this->surname = $newSurname;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Employee {
		private string $name;
		private string $surname;
		public Post $post;

		public function __construct(string $name, string $surname, Post $post){
			$this->name = $name;
			$this->surname = $surname;
			$this->post = $post;
		}
		public function getName(){
			return $this->name;
		}
		public function getSurname(){
			return $this->surname;
		}
		public function setName(string $newName){
			$this->name = $newName;
		}
		public function setSurname(string $newSurname){
			$this->surname = $newSurname;
		}
		public function changePost(Post $newPost){
			$this->post = $newPost;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		6) Создайте объект класса Employee с должностью программист. При его создании используйте один из объектов класса Post, созданный нами ранее.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	$emp1 = new Employee('john','dou', $programmer);
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	$emp1 = new Employee('john','dou', $programmer);
	?>
</div>
<div class="task">
	<h6>
		7) Выведите на экран имя, фамилию, должность и зарплату созданного работника.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	echo $emp1->getName().'&lt;br/>';
	echo $emp1->getsurname().'&lt;br/>';
	echo $emp1->post->getName().'&lt;br/>';
	echo $emp1->post->getSalary().'&lt;br/>';
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	echo $emp1->getName().'<br/>';
	echo $emp1->getsurname().'<br/>';
	echo $emp1->post->getName().'<br/>';
	echo $emp1->post->getSalary().'<br/>';
	?>
</div>
<div class="task">
	<h6>
		8) Реализуйте в классе Employee метод changePost, который будет изменять должность работника на другую. Метод должен принимать параметром объект класса Post. Укажите в методе тип принимаемого параметра в явном виде.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Employee {
		private string $name;
		private string $surname;
		public Post $post;

		public function __construct(string $name, string $surname, Post $post){
			$this->name = $name;
			$this->surname = $surname;
			$this->post = $post;
		}
		public function getName(){
			return $this->name;
		}
		public function getSurname(){
			return $this->surname;
		}
		public function setName(string $newName){
			$this->name = $newName;
		}
		public function setSurname(string $newSurname){
			$this->surname = $newSurname;
		}
		public function changePost(Post $newPost){
			$this->post = $newPost;
		}
	}
$emp1->changePost($driver);
echo $emp1->getName().'&lt;br/>';
echo $emp1->getSurname().'&lt;br/>';
echo $emp1->post->getName().'&lt;br/>';
echo $emp1->post->getSalary().'&lt;br/>';
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
$emp1->changePost($driver);
echo $emp1->getName().'<br/>';
echo $emp1->getSurname().'<br/>';
echo $emp1->post->getName().'<br/>';
echo $emp1->post->getSalary().'<br/>';
	?>
</div>


	<p class="text-center">
	<a href="/page/oop/" class="p-2">Назад</a>
	<a href="/page/oop/static-methods"  class="p-2">Далее</a>
</p>
</main>