<main>
	<h2 class="text-center pt-2">Объявление конструктора в интерфейсе</h2>
<p>
	В интерфейсе также можно объявить конструктор класса. Посмотрим на примере. Пусть мы решили сделать класс Rectangle, в котором будут методы для нахождения площади, периметра, а также конструктор, принимающий два параметра. Давайте опишем наш класс с помощью интерфейса:
</p>
<code>
<pre>
&lt;?php
	class Rectangle implements iRectangle{
		private $a;
		private $b;
		public function __construct($a, $b){
			$this->a = $a;
			$this->b = $b;
		}
		public function getSquare(){
			return $this->a * $this->b;
		}
		public function getPerimeter(){
			return 2 * ($this->a + $this->b);
		}
	}
?></pre>
</code>
<p>
	Что нам дало объявление конструктора в интерфейсе? Во-первых, мы не забудем реализовать конструктор в классе. Во-вторых, интерфейс явно указывает, что конструктор класса должен принимать два параметра: ни больше, ни меньше. Это также предохранит нас от случайной ошибки.

	Почему мы создали отдельный интерфейс iRectangle, а не добавили конструктор в интерфейс Figure? Потому что все фигуры имеют разное количество сторон и, соответственно, разное количество параметров в конструкторе. Поэтому нам пришлось создать отдельный, более точный интерфейс конкретно для прямоугольников.
</p>
<div class="task">
	<h6>
		1) Сделайте интерфейс iCube, который будет описывать фигуру Куб. Пусть ваш интерфейс описывает конструктор, параметром принимающий сторону куба, а также методы для получения объема куба и площади поверхности.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iCube {
		public function __construct(int $side);
		public function getSurfaceAres();
		public function getVolume();
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iCube {
		public function __construct(int $side);
		public function getSurfaceAres();
		public function getVolume();
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте класс Cube, реализующий интерфейс iCube.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Cube implements iCube {
		private int $side;
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getSurfaceAres(){
			return ($this->side**2)*6;
		}
		public function getVolume(){
			return $this->side**3;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Cube implements iCube {
		private int $side;
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getSurfaceAres(){
			return ($this->side**2)*6;
		}
		public function getVolume(){
			return $this->side**3;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте интерфейс iUser, который будет описывать юзера. Предполагается, что у юзера будет имя и возраст и эти поля будут передаваться параметрами конструктора. Пусть ваш интерфейс также задает то, что у юзера будут геттеры (но не сеттеры) для имени и возраста.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iUser {
		public function __construct(string $name, int $age);
		public function getName();
		public function getAge();
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iUser {
		public function __construct(string $name, int $age);
		public function getName();
		public function getAge();
	}
	?>
</div>
<div class="task">
	<h6>
		4) Сделайте класс User, реализующий интерфейс iUser.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class User implements iUser {
		private $name;
		private $age;
		public function __construct(string $name, int $age){
			$this->name = $name;
			$this->age = $age;
		}
		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class User implements iUser {
		private $name;
		private $age;
		public function __construct(string $name, int $age){
			$this->name = $name;
			$this->age = $age;
		}
		public function getName(){
			return $this->name;
		}
		public function getAge(){
			return $this->age;
		}
	}
	?>
</div>
<p class="text-center">
	<a href="/page/interfaces/parameters" class="p-2">Назад</a>
	<a href="/page/interfaces/inheritance-from-interface"  class="p-2">Далее</a>
</p>
</main>