<main>
	<h2 class="text-center pt-2">Несколько интерфейсов в ООП на PHP</h2>
<p>
	В PHP нет множественного наследования - каждый класс может иметь только одного родителя. С интерфейсами дело, однако, обстоит по другому: каждый класс может реализовывать любое количество интерфейсов. Для этого имена интерфейсов нужно перечислить через запятую после ключевого слова implements.

	В этом проявляется еще одно отличие интерфейсов от абстрактных классов - можно реализовывать много интерфейсов, но унаследовать несколько абстрактных классов нельзя.

	Давайте попробуем на практике. Пусть кроме интерфейса iFigure у нас также есть интерфейс iTetragon (четырехугольник). Методы этого интерфейса будут реализовывать классы Quadrate и Rectangle, так как у них 4 стороны, но не класс Disk.

	Пусть интерфейс iTetragon описывает геттеры для всех четырех сторон четырехугольника:
</p>
<code>
<pre>
&lt;?php
	interface iTetragon	{
		public function getA();
		public function getB();
		public function getC();
		public function getD();
	}
?></pre>
</code>
<p>
	Пусть также у нас есть интерфейс iFigure, который мы уже делали ранее:
</p>
<code>
<pre>
&lt;?php
	interface iFigure {
		public function getSquare();
		public function getPerimeter();
	}
?></pre>
</code>
<p>
	Сделаем так, чтобы класс Quadrate реализовывал два интерфейса. Для этого перечислим оба интерфейса через запятую после ключевого слова implements:
</p>
<code>
<pre>
&lt;?php
	class Quadrate implements iFigure, iTetragon {
		// тут будет реализация
	}
?></pre>
</code>
<p>
	Доработаем теперь наш класс Quadrate, чтобы он реализовывал интерфейс iTetragon. Понятно, что наш квадрат является вырожденным случаем четырехугольника, ведь у квадрата все стороны равны. Поэтому все новые методы будут возвращать одно и тоже - ширину квадрата:
</p>
<code>
<pre>
&lt;?php
class Quadrate implements iFigure, iTetragon {
		private $a;	
		public function __construct($a){
			$this->a = $a;
		}	
		public function getA()
		{
			return $this->a;
		}	
		public function getB(){
			return $this->a;
		}	
		public function getC(){
			return $this->a;
		}	
		public function getD(){
			return $this->a;
		}	
		public function getSquare(){
			return $this->a * $this->a;
		}	
		public function getPerimeter(){
			return 4 * $this->a;
		}
	}
?></pre>
</code>
<p>
	Очевидно, что в прямоугольнике уже не все стороны одинаковы, а только противоположные. В этом случае новые методы станут немного отличаться. Ну, и в какой-нибудь трапеции вообще все 4 стороны будут разные.

	Однако, не имеет значения, что за фигуру мы будем рассматривать - важно, что все эти фигуры будут иметь описанные методы (пусть некоторые фигуры и вырожденные) и работать однотипно.
</p>
<div class="task">
	<h6>
		1) Сделайте так, чтобы класс Rectangle также реализовывал два интерфейса: и iFigure, и iTetragon.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iTetragon {
		public function getA();
		public function getB();
		public function getC();
		public function getD();
	}
	interface iFigure {
		public function getSquare();
		public function getPerimeter();
	}
	class Rectangle implements iFigure, iTetragon{
		private int $sideA;
		private int $sideB;
		private int $sideC;
		private int $sideD;
		public function __construct(int $side1, int $side2){
			$this->sideA = $side1;
			$this->sideB = $side2;
			$this->sideC = $side1;
			$this->sideD = $side2;
		}
		public function getSquare(){
			return $this->sideA * $this->sideB;
		}
		public function getPerimeter(){
			return ($this->sideA + $this->sideB)*2;
		}
		public function getA(){
			return $this->sideA;
		}
		public function getB(){
			return $this->sideB;
		}
		public function getC(){
			return $this->sideC;
		}
		public function getD(){
			return $this->sideD;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iTetragon	{
		public function getA();
		public function getB();
		public function getC();
		public function getD();
	}
	interface iFigure {
		public function getSquare();
		public function getPerimeter();
	}
	class Rectangle implements iFigure, iTetragon{
		private int $sideA;
		private int $sideB;
		private int $sideC;
		private int $sideD;
		public function __construct(int $side1, int $side2){
			$this->sideA = $side1;
			$this->sideB = $side2;
			$this->sideC = $side1;
			$this->sideD = $side2;
		}
		public function getSquare(){
			return $this->sideA * $this->sideB;
		}
		public function getPerimeter(){
			return ($this->sideA + $this->sideB)*2;
		}
		public function getA(){
			return $this->sideA;
		}
		public function getB(){
			return $this->sideB;
		}
		public function getC(){
			return $this->sideC;
		}
		public function getD(){
			return $this->sideD;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте интерфейс iCircle с методами getRadius и getDiameter.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iCircle{
		public function getRadius();
		public function getDiametr();
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iCircle{
		public function getRadius();
		public function getDiametr();
	}
	?>
</div>
<div class="task">
	<h6>
		3) Сделайте так, чтобы класс Disk также реализовывал два интерфейса: и iFigure, и iCircle.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Disk implements iCircle, iFigure{
		const PI = 3.14;
		private int $radius;
		public function __construct(int $radius){
			$this->radius = $radius;
		}
		public function getRadius(){
			return $this->radius;
		}
		public function getDiametr(){
			return $this->radius*2;
		}
		public function getSquare(){
			return self::PI*$this->radius**2;
		}
		public function getPerimeter(){
			return 2*self::PI*$this->radius;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Disk implements iCircle, iFigure{
		const PI = 3.14;
		private int $radius;
		public function __construct(int $radius){
			$this->radius = $radius;
		}
		public function getRadius(){
			return $this->radius;
		}
		public function getDiametr(){
			return $this->radius*2;
		}
		public function getSquare(){
			return self::PI*$this->radius**2;
		}
		public function getPerimeter(){
			return 2*self::PI*$this->radius;
		}
	}
	?>
</div>


<p class="text-center">
	<a href="/page/interfaces/instanceof" class="p-2">Назад</a>
	<a href="/page/interfaces/inheritance-and-implementation"  class="p-2">Далее</a>
</p>
</main>