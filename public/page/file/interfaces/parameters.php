<main>
	<h2 class="text-center pt-2">Параметры в методах интерфейсов в ООП на PHP</h2>
<p>
	При описании методов в интерфейсах необходимо указывать не только имена самих методов, но и принимаемые ими параметры.

	Давайте посмотрим на примере. Пусть у нас дан интерфейс iMath, описывающий класс для математических операций сложения, вычитания, умножения и деления. Пусть этот интерфейс будет выглядеть так:
</p>
<code>
<pre>
&lt;?php
	interface iMath{
		public function sum();      // сложить
		public function subtract(); // вычесть
		public function multiply(); // умножить
		public function divide();   // поделить
	}
?></pre>
</code>
<p>
	Сейчас методы нашего интерфейса не принимают никаких параметров. И на самом деле методы класса, который будет реализовывать этот интерфейс, также не должны будут принимать параметров, иначе будет ошибка.

	Давайте укажем параметры методов в нашем интерфейсе:
</p>
<code>
<pre>
&lt;?php
	interface iMath{
		public function sum($a, $b);      // сложить
		public function subtract($a, $b); // вычесть
		public function multiply($a, $b); // умножить
		public function divide($a, $b);   // поделить
	}
?></pre>
</code>
<p>
	Напишем теперь реализацию нашего интерфейса:
</p>
<code>
<pre>
&lt;?php
	class Math implements iMath{
		public function sum($a, $b){
			return $a + $b;
		}
		public function subtract($a, $b){
			return $a - $b;
		}
		public function multiply($a, $b){
			return $a * $b;
		}
		public function divide($a, $b){
			return $a / $b;
		}
	}
?></pre>
</code>
<p>
	Если попытаться в нашем классе задать другое количество параметров - у нас это просто не получится: PHP выдаст ошибку. Таким образом мы не сможем ни случайно забыть какой-то параметр, ни случайно добавить лишний.
</p>
<div class="task">
	<h6>
		1) Пусть у нас дан такой интерфейс iUser:
		<code>
			<pre>
		&lt;?php
		interface iUser	{
				public function setName($name); // установить имя
				public function getName();      // получить имя
				public function setAge($age);   // установить возраст
				public function getAge();       // получить возраст
			}
		?></pre>
		</code>
		Сделайте класс User, который будет реализовывать данный интерфейс.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class User implements iUser {
		private string $name;
		private int $age;

		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
		public function setName($name){
			$this->name = $name;
		}
		public function setAge($age){
			$this->age = $age;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iUser	{
		public function setName($name); // установить имя
		public function getName();      // получить имя
		public function setAge($age);   // установить возраст
		public function getAge();       // получить возраст
	}
	class User implements iUser {
		private string $name;
		private int $age;

		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
		public function setName($name){
			$this->name = $name;
		}
		public function setAge($age){
			$this->age = $age;
		}
	}
	?>
</div>
<p class="text-center">
	<a href="/page/interfaces/applying" class="p-2">Назад</a>
	<a href="/page/interfaces/constructor-declaring"  class="p-2">Далее</a>
</p>
</main>