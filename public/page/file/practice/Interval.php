<main>
	<h2 class="text-center pt-2">
		Класс Interval в ООП на PHP
	</h2>
	<p>
	Давайте реализуем класс, который будет находить разницу между двумя датами. Пусть конструктор этого класса параметрами принимает две даты, представляющие объекты класса Date, созданного нами в предыдущем уроке, и находит разницу между датами в днях, месяцах и годах:
	</p>
	<code>
    <pre>&lt;?php
class Interval	{
		public function __construct(Date $date1, Date $date2){
	
		}
		public function toDays(){
			// вернет разницу в днях
		}
		public function toMonths(){
			// вернет разницу в месяцах
		}
		public function toYears(){
			// вернет разницу в годах
		}
	}
        ?></pre>
    </code>
	<p>
		Давайте посмотрим, как мы будем пользоваться нашим классом:
	</p>
		<code>
    <pre>&lt;?php
	$date1 = new Date('2025-12-31');
	$date2 = new Date('2026-11-28');
	
	$interval = new Interval($date1, $date2);
	
	echo $interval->toDays();   // выведет разницу в днях
	echo $interval->toMonths(); // выведет разницу в месяцах
	echo $interval->toYears();  // выведет разницу в годах
        ?></pre>
    </code>
	<div class="task">
        <h6>
            1) Реализуйте описанный класс Interval. Проверьте его работу.
		</h6>
		<p>
			Решение:
		</p>
		<code>
		<pre>&lt;?php

// возможно я не правильно понял условия задачи....(((
include('classes/Date.php');
$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

class Interval	{
	private $date1;
	private $date2;

	public function __construct(Date $date1, Date $date2){
		$this->date1 = $date1;
		$this->date2 = $date2;
	}
	public function toDays(){
		// вернет разницу в днях
		return abs(strtotime($this->date1) - strtotime($this->date2))/(60*60*24);
	}
	public function toMonths(){
		// вернет разницу в месяцах
		return $this->getDateDiff()->format('%m')+$this->getDateDiff()->format('%d')/30;
	}
	public function toYears(){
		// вернет разницу в годах
		if($this->getDateDiff()->format('%y')){
			return $this->getDateDiff()->format('%y')/12+$this->getDateDiff()->format('%m');
		}
		return $this->getDateDiff()->format('%m')/12;
	}
	public function __get($props){
		return $this->$props;
	}
	private function getDateDiff(){
		$d1 = new DateTime($this->date1);
		$d2 = new DateTime($this->date2);
		$interval = $d1->diff($d2);
		return $interval;
	}
}
$interval = new Interval($date1, $date2);
echo $interval->date1;
echo '&lt;br/>';
echo $interval->date2;
echo '&lt;br/>';
echo $interval->toDays();
echo '&lt;br/>';
echo $interval->toMonths();
echo '&lt;br/>';
echo $interval->toYears();
?>
?></pre>
		</code>
		<p>
			Результат:
		</p>
<?php
include('classes/Date.php');
$date1 = new Date('2025-12-31');
$date2 = new Date('2026-11-28');

class Interval	{
	private $date1;
	private $date2;

	public function __construct(Date $date1, Date $date2){
		$this->date1 = $date1;
		$this->date2 = $date2;
	}
	public function toDays(){
		// вернет разницу в днях
		return abs(strtotime($this->date1) - strtotime($this->date2))/(60*60*24);
		// return $this->getDateDiff()->format('%d');
	}
	public function toMonths(){
		// вернет разницу в месяцах
		// if($this->getDateDiff()->format('%d')){
		// 	return $this->getDateDiff()->format('%m');
		// }
		return $this->getDateDiff()->format('%m')+$this->getDateDiff()->format('%d')/30;
		// return ($this->getDateDiff()->format('%m'));
		
	}
	public function toYears(){
		// вернет разницу в годах
		if($this->getDateDiff()->format('%y')){
			return $this->getDateDiff()->format('%y')/12+$this->getDateDiff()->format('%m');
		}
		return $this->getDateDiff()->format('%m')/12;
		// return $this->getDateDiff()->format('%y');
	}
	public function __get($props){
		return $this->$props;
	}
	private function getDateDiff(){
		$d1 = new DateTime($this->date1);
		$d2 = new DateTime($this->date2);
		$interval = $d1->diff($d2);
		return $interval;
	}
}
$interval = new Interval($date1, $date2);
echo $interval->date1;
echo '<br/>';
echo $interval->date2;
echo '<br/>';
echo $interval->toDays();
echo '<br/>';
echo $interval->toMonths();
echo '<br/>';
echo $interval->toYears();
?>
	</div>


	<p class="text-center">
		<a href="/page/practice/date" class="p-2">Назад</a>
		<a href="/page/practice/file"  class="p-2">Далее</a>
	</p>
</main>