<main>
	<h2 class="text-center pt-2">Применение интерфейсов в ООП на PHP</h2>
<p>
	Итак, мы уже выяснили, что интерфейсы хороший способ контролировать то, что реализованы все необходимые методы класса.
	Давайте рассмотрим еще один, более практический, пример. Пусть у нас есть класс, который будет хранить в себе массив объектов-фигур:
</p>
<code>
<pre>
&lt;?php
	class FiguresCollection	{
		private $figures = []; // массив для фигур
	}
?></pre>
</code>
<p>
	Реализуем в нашем классе метод addFigure для добавления объектов в коллекцию:
</p>
<code>
<pre>
&lt;?php
	class FiguresCollection	{
		private $figures = [];
		
		// Параметром передается объект с фигурой:
		public function addFigure($figure){
			$this->figures[] = $figure;
		}
	}
?></pre>
</code>
<p>
	Очевидно, что мы рассчитываем на то, что параметром метода addFigure будет передаваться объект с фигурой. Однако за этим нет никакого контроля!
	Давайте используем подсказку для типов и явно укажем тип объектов как Figure:
</p>
<code>
<pre>
&lt;?php
	class FiguresCollection	{
		private $figures = [];
		
		public function addFigure(Figure $figure){
			$this->figures[] = $figure;
		}
	}
?></pre>
</code>
<p>
	Давайте разберемся с тем, что мы сделали.
	Если бы Figure был реально существующим классом то в параметр метода мы смогли бы передать объекты этого класса, а также и его наследников.
	У нас, однако, Figure - это интерфейс. В таком случае подсказка обозначает то, что параметром метода могут быть переданы только объекты класса, реализующих наш интерфейс.
	Давайте попробуем создать объект нашего класса и добавить в него фигуры:
</p>
<code>
<pre>
&lt;?php
	$figuresCollection = new FiguresCollection;
	
	// Добавим парочку квадратов:
	$figuresCollection->add(new Quadrate(2));
	$figuresCollection->add(new Quadrate(3));
	
	// Добавим парочку прямоугольников:
	$figuresCollection->add(new Rectangle(2, 3));
	$figuresCollection->add(new Rectangle(3, 4));
?></pre>
</code>
<p>
	Попытка добавить объект какого-либо другого класса приведет к ошибке:
</p>
<code>
<pre>
&lt;?php
	$figuresCollection = new FiguresCollection;
	
	class Test {}; // какой-то другой класс
	$figuresCollection->add(new Test); // выдаст ошибку
?></pre>
</code>
<p>
	Что на практике дает нам такой контроль: так как все фигуры, добавленные в коллекцию, реализуют интерфейс Figure, мы можем быть уверены, что у каждой из них будет метод getSquare и метод getPerimeter.
	Возможно в дальнейшем кроме квадрата и прямоугольника появится, например, еще и треугольник. В этом случае и у треугольника также будут методы getSquare и getPerimeter.
	На практике это дает нам следующее: мы можем в классе FiguresCollection сделать, к примеру, метод getTotalSquare, находящий полную площадь фигур коллекции. В этом методе мы будем перебирать циклом массив фигур и у каждой фигуры вызывать метод getSquare.
	Так как каждая фигура реализует интерфейс Figure, мы можем быть на 100% уверены в том, что у каждой фигуры будет этот метод getSquare.
	Итак, вот реализация метода:
</p>
<code>
<pre>
&lt;?php
	class FiguresCollection	{
		private $figures = [];
		
		public function addFigure(Figure $figure){
			$this->figures[] = $figure;
		}		
		// Найдем полную площадь:
		public function getTotalSquare(){
			$sum = 0;		
			foreach ($this->figures as $figure) {
				$sum += $figure->getSquare(); // используем метод getSquare
			}
			return $sum;
		}
	}
?></pre>
</code>
<div class="task">
	<h6>
		1) Не подсматривая в код выше реализовать такой же класс FiguresCollection.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iFigure {
		public function getSquare();
		public function getPerimetr();
	}
	class FigureCollection {
		private $figures = [];
		public function addFigure(iFigure $newFigure){
			$this->figures[] = $newFigure;
		}
		public function getTotalSquare(){
			$totalSquareSum = 0;
			foreach($this->figures as $figure){
				$totalSquareSum += $figure->getSquare();
			}
			return $totalSquareSum;
		}
	}
	class Square implements iFigure{
		protected int $sideA;
		public function __construct(int $sideA){
			$this->sideA = $sideA;
		}
		public function getSquare(){
			return $this->sideA**2;
		}
		public function getPerimetr(){
			return $this->sideA*4;
		}
	}
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
	}
	$figureCollection = new FigureCollection;
	$figureCollection->addFigure(new Square(4));
	$figureCollection->addFigure(new Rectangle(4,2));
	echo $figureCollection->getTotalSquare();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	interface iFigure {
		public function getSquare();
		public function getPerimetr();
	}
	class FigureCollection {
		private $figures = [];
		public function addFigure(iFigure $newFigure){
			$this->figures[] = $newFigure;
		}
		public function getTotalSquare(){
			$totalSquareSum = 0;
			foreach($this->figures as $figure){
				$totalSquareSum += $figure->getSquare();
			}
			return $totalSquareSum;
		}
		public function getTotalPerimeter(){
			$totalPerimetrSum = 0;
			foreach($this->figures as $figure){
				$totalPerimetrSum += $figure->getPerimetr();
			}
			return $totalPerimetrSum;
		}
	}
	class Square implements iFigure{
		protected int $sideA;
		public function __construct(int $sideA){
			$this->sideA = $sideA;
		}
		public function getSquare(){
			return $this->sideA**2;
		}
		public function getPerimetr(){
			return $this->sideA*4;
		}
	}
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
	}
	$figureCollection = new FigureCollection;
	$figureCollection->addFigure(new Square(4));
	$figureCollection->addFigure(new Rectangle(4,2));
	echo $figureCollection->getTotalSquare();

	?>
</div>
<div class="task">
	<h6>
		2) Добавьте в класс FiguresCollection метод getTotalPerimeter для нахождения суммарного периметра всех фигур.
	</h6>
	<p>
		Решение:
	</p>
	<code>
		<pre>
	&lt;?php
	interface iFigure {
		public function getSquare();
		public function getPerimetr();
	}
	class FigureCollection {
		private $figures = [];
		public function addFigure(iFigure $newFigure){
			$this->figures[] = $newFigure;
		}
		public function getTotalSquare(){
			$totalSquareSum = 0;
			foreach($this->figures as $figure){
				$totalSquareSum += $figure->getSquare();
			}
			return $totalSquareSum;
		}
		public function getTotalPerimeter(){
			$totalPerimetrSum = 0;
			foreach($this->figures as $figure){
				$totalPerimetrSum += $figure->getPerimetr();
			}
			return $totalPerimetrSum;
		}
	}
	class Square implements iFigure{
		protected int $sideA;
		public function __construct(int $sideA){
			$this->sideA = $sideA;
		}
		public function getSquare(){
			return $this->sideA**2;
		}
		public function getPerimetr(){
			return $this->sideA*4;
		}
	}
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
	}
	$figureCollection = new FigureCollection;
	$figureCollection->addFigure(new Square(4));
	$figureCollection->addFigure(new Rectangle(4,2));
	echo $figureCollection->getTotalSquare();
	echo '&lt;br/>';
	echo $figureCollection->getTotalPerimeter();
	?></pre>
	</code>
	<p>
		Результат:
	</p>
	<?php
	$figureCollection = new FigureCollection;
	$figureCollection->addFigure(new Square(4));
	$figureCollection->addFigure(new Rectangle(4,2));
	echo $figureCollection->getTotalSquare();
	echo '<br/>';
	echo $figureCollection->getTotalPerimeter();

	?>
</div>
<p class="text-center">
	<a href="/page/oop/intro" class="p-2">Назад</a>
	<a href="/page/interfaces/parameters"  class="p-2">Далее</a>
</p>
</main>