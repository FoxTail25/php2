<main>
	<h2 class="text-center pt-2">Константы в интерфейсе в ООП на PHP</h2>
<p>
	Интерфейсы не могут содержать свойства классов, но могут содержать константы. Константы интерфейсов работают точно так же, как и константы классов, за исключением того, что они не могут быть переопределены наследующим классом или интерфейсом.

	Для примера сделаем интерфейс iSphere, который будет описывать класс для работы с шаром. В этом шаре нам надо будет найти объем и площадь поверхности. Для этого нам потребуется число Пи. Зададим его как константу нашего интерфейса:
</p>
<code>
<pre>
&lt;?php
	interface iSphere {
		const PI = 3.14; // число ПИ как константа
		
		// Конструктор шара:
		public function __construct($radius);
		
		// Метод для нахождения объема шара:
		public function getVolume();
		
		// Метод для нахождения площади поверхности шара:
		public function getSquare();
	}
?></pre>
</code>
<div class="task">
	<h6>
		1) Сделайте класс Sphere, который будет реализовывать интерфейс iSphere.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iSphere {
		const PI = 3.14; 
		public function __construct($radius);
		public function getVolume();
		public function getSquare();
	}
	class Sphere implements iSphere {
		private $radius;
		public function __construct($radius){
			$this->radius = $radius;
		}
		public function getVolume(){
			return (4/3)*self::PI*$this->radius**3;
		}
		public function getSquare(){
			return 4*self::PI*$this->radius**2;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iSphere {
		const PI = 3.14; 
		public function __construct($radius);
		public function getVolume();
		public function getSquare();
	}
	class Sphere implements iSphere {
		private $radius;
		public function __construct($radius){
			$this->radius = $radius;
		}
		public function getVolume(){
			return (4/3)*self::PI*$this->radius**3;
		}
		public function getSquare(){
			return 4*self::PI*$this->radius**2;
		}
	}
	?>
</div>

<p class="text-center">
	<a href="/page/interfaces/inheritance-and-implementation" class="p-2">Назад</a>
	<a href="/page/interfaces/functions"  class="p-2">Далее</a>
</p>
</main>