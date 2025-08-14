<main>
	<h2 class="text-center pt-2">Интерфейсы и instanceof в ООП на PHP</h2>
<p>
	С помощью instanceof можно проверять, реализует какой-то класс заданный интерфейс или нет. Посмотрим на примере. Пусть у нас есть вот такой класс:
</p>
<code>
<pre>
&lt;?php
	class Quadrate implements iFigure
	{
		
	}
?></pre>
</code>
<p>
	Создадим объект этого класса и проверим его оператором instanceof:
</p>
<code>
<pre>
&lt;?php
	$quadrate = new Quadrate;
	
	var_dump($quadrate instanceof Quadrate); // выведет true
	var_dump($quadrate instanceof Figure);   // выведет true
?></pre>
</code>
<div class="task">
	<h6>
		1) Сделайте интерфейс Figure3d (трехмерная фигура), который будет иметь метод getVolume (получить объем) и метод getSurfaceSquare (получить площадь поверхности).
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iFigure3d {
		public function getVolume();
		public function getSurfaceSquare();
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iFigure3d {
		public function getVolume();
		public function getSurfaceSquare();
	}
	?>
</div>
<div class="task">
	<h6>
		2) Сделайте класс Cube, который будет реализовывать интерфейс Figure3d.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	class Cube implements iFigure3d{
		private int $side;
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getVolume(){
			return $this->side**3;
		}
		public function getSurfaceSquare(){
			return ($this->side**2)*6;
		}
	}
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	class Cube implements iFigure3d{
		private int $side;
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getVolume(){
			return $this->side**3;
		}
		public function getSurfaceSquare(){
			return ($this->side**2)*6;
		}
	}
	?>
</div>
<div class="task">
	<h6>
		3) Создайте несколько объектов класса Quadrate, несколько объектов класса Rectangle и несколько объектов класса Cube. Запишите их в массив $arr в случайном порядке.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iFigure{
		public function getSquare();
		public function getPerimetr();
	}
	class Quadrate implements iFigure{
		protected int $side;
		
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getSquare(){
			return $this->side**2;
		}
		public function getPerimetr(){
			return $this->side*4;
		}
	};
	class Rectangle implements iFigure{
		protected int $sideA;
		protected int $sideB;
		public function __construct(int $sideA, int $sideB){
			$this->sideA = $sideA;
			$this->sideB = $sideB;
		}
		public function getSquare(){
			return $this->sideA * $this->sideB;
		}
		public function getPerimetr(){
			return ($this->sideA + $this->sideB)*2;
		}
	};
	$arr = [];
	$arr[] = new Cube(4);
	$arr[] = new rectangle(2,3);
	$arr[] = new Cube(2);
	$arr[] = new Quadrate(1);
	$arr[] = new Quadrate(3);
	$arr[] = new rectangle(1,2);
	$arr[] = new Cube(1);
	$arr[] = new rectangle(3,4);
	$arr[] = new Quadrate(2);
	?></pre>
	</code>
	<!-- <p>
		Результат:
	</p> -->
	<?php
	interface iFigure{
		public function getSquare();
		public function getPerimetr();
	}
	class Quadrate implements iFigure{
		protected int $side;
		
		public function __construct(int $side){
			$this->side = $side;
		}
		public function getSquare(){
			return $this->side**2;
		}
		public function getPerimetr(){
			return $this->side*4;
		}
	};
	class Rectangle implements iFigure{
		protected int $sideA;
		protected int $sideB;
		public function __construct(int $sideA, int $sideB){
			$this->sideA = $sideA;
			$this->sideB = $sideB;
		}
		public function getSquare(){
			return $this->sideA * $this->sideB;
		}
		public function getPerimetr(){
			return ($this->sideA + $this->sideB)*2;
		}
	};
	$arr = [];
	$arr[] = new Cube(4);
	$arr[] = new rectangle(2,3);
	$arr[] = new Cube(2);
	$arr[] = new Quadrate(1);
	$arr[] = new Quadrate(3);
	$arr[] = new rectangle(1,2);
	$arr[] = new Cube(1);
	$arr[] = new rectangle(3,4);
	$arr[] = new Quadrate(2);
	?>
</div>
<div class="task">
	<h6>
		4) Переберите циклом массив $arr и выведите на экран только площади объектов реализующих интерфейс iFigure.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	foreach($arr as $figure){
		if($figure instanceof iFigure){
			echo 'Класс: '.get_class($figure).' площадь: '. $figure->getSquare();
			echo '&lt;br/>';
		}
	}
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $figure){
		if($figure instanceof iFigure){
			echo 'Класс: '.get_class($figure).' площадь: '. $figure->getSquare();
			echo '<br/>';
		}
	}
	?>
</div>
<div class="task">
	<h6>
		5) Переберите циклом массив $arr и выведите для плоских фигур их площади, а для объемных - площади их поверхности.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
&lt;?php
	foreach($arr as $figure){
	if($figure instanceof iFigure){
		echo 'Класс: '.get_class($figure).' площадь: '. $figure->getSquare();
		echo '&lt;br/>';
	}
	if($figure instanceof iFigure3d){
		echo 'Класс: '.get_class($figure).' площадь поверхности: '. $figure->getSurfaceSquare();
		echo '&lt;br/>';
	}
}
?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	foreach($arr as $figure){
		if($figure instanceof iFigure){
			echo 'Класс: '.get_class($figure).' площадь: '. $figure->getSquare();
			echo '<br/>';
		}
		if($figure instanceof iFigure3d){
			echo 'Класс: '.get_class($figure).' площадь поверхности: '. $figure->getSurfaceSquare();
			echo '<br/>';
		}
	}
	?>
</div>













<p class="text-center">
	<a href="/page/interfaces/inheritance-from-interface" class="p-2">Назад</a>
	<a href="/page/interfaces/several-interfaces-implementation"  class="p-2">Далее</a>
</p>
</main>