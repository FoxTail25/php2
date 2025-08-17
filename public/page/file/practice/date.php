<main>
	<h2 class="text-center pt-2">
		Класс Date в ООП на PHP
	</h2>
	<p>
		Начиная с данного урока мы с вами будем применять изученную теорию по ООП на практических примерах, создавая различные классы.

		Давайте для разминки сделаем класс для работы с датой. Пусть этот класс параметром конструктора принимает дату в формате год-месяц-день и имеет следующие методы:
	</p>
	<code>
<pre>
&lt;?php
	class Date{
		public function __construct($date = null){
			// если дата не передана - пусть берется текущая
		}
		public function getDay(){
			// возвращает день
		}
		public function getMonth($lang = null){
			// возвращает месяц
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть месяц будет словом на заданном языке
		}
		public function getYear(){
			// возвращает год
		}
		public function getWeekDay($lang = null){
			// возвращает день недели
			
			// переменная $lang может принимать значение ru или en
			// если эта не пуста - пусть день будет словом на заданном языке
		}
		public function addDay($value){
			// добавляет значение $value к дню
		}
		public function subDay($value){
			// отнимает значение $value от дня
		}
		public function addMonth($value){
			// добавляет значение $value к месяцу
		}
		public function subMonth($value){
			// отнимает значение $value от месяца
		}
		public function addYear($value){
			// добавляет значение $value к году
		}
		public function subYear($value){
			// отнимает значение $value от года
		}
		public function format($format){
			// выведет дату в указанном формате
			// формат пусть будет такой же, как в функции date
		}
		public function __toString(){
			// выведет дату в формате 'год-месяц-день'
		}
	}
?></pre>
</code>
<p>
	Давайте посмотрим, как мы будем пользоваться нашим классом:
</p>
<code>
<pre>
&lt;?php
	$date = new Date('2025-12-31');
	
	echo $date->getYear();  // выведет '2025'
	echo $date->getMonth(); // выведет '12'
	echo $date->getDay();   // выведет '31'
	
	echo $date->getWeekDay();     // выведет '3'
	echo $date->getWeekDay('ru'); // выведет 'среда'
	echo $date->getWeekDay('en'); // выведет 'wednesday'

	echo (new Date('2025-12-31'))->addYear(1); // '2026-12-31'
	echo (new Date('2025-12-31'))->addDay(1);  // '2026-01-01'
	
	echo (new Date('2025-12-31'))->subDay(3)->addYear(1); // '2026-12-28'
?></pre>
</code>
<div class="task">
    <h6>
		 1) Реализуйте описанный класс Date. Проверьте его работу.
	</h6>
<code>
<pre>
&lt;?php

?></pre>
</code>
<p>
    Результат:
</p>
<?php
class Date{
	private $year;
	private $month;
	private $day;
		
	const MonthRu = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
	const MonthEn = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	const WeekDayRu = ['Воскресенье','Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
	const WeekDayEn = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	public function __construct($date = null){ //принимает дату в формате год-месяц-день
		$regDate = '^(?<year>[0-9]{4})-(?<month>[0-9]{1,2})-(?<day>[0-9]{1,2})$';
		if(isset($date) and preg_match("#$regDate#",$date, $newDate)){
			$this->year = $newDate['year'];
			$this->month = $newDate['month'];
			$this->day = $newDate['day'];
		} else {
			$this->year = date('Y',time());
			$this->month = date('n',time());
			$this->day = date('j',time());
		}
	}
	public function getDay(){
		return $this->day;
		// return $this->day = mktime(0,0,0,$this->month,$this->day,$this->year);
	}
	public function getMonth(string $lang=null){ //ru или en
		$monthInArr = $this->month-1;
		if($lang == 'ru'){
			return self::MonthRu[$monthInArr];
		} else if($lang == 'en'){
			return self::MonthEn[$monthInArr];
		} else {
			return $this->month;
		}
	}
	public function getYear(){
		return $this->year;
	}
	public function getWeekDay($lang = null){
		$weekDayNum = date('w',mktime(0,0,0,$this->month,$this->day,$this->year));
		if($lang == 'ru'){
			return self::WeekDayRu[$weekDayNum];
		} else if($lang == 'en'){
			return self::WeekDayEn[$weekDayNum];
		} else {
			return $weekDayNum;
		}
	}

		public function addDay($value){
			$newDay = $this->day + $value;
			$this->setDate($this->year, $this->month, $newDay);
		}
		public function subDay($value){
			$newDay = $this->day - $value;
			$this->setDate($this->year, $this->month, $newDay);
		}
		public function addMonth($value){
			$newMonth = $this->month + $value;
			$this->setDate($this->year, $newMonth, $this->day);
		}
		public function subMonth($value){
			$newMonth = $this->month - $value;
			$this->setDate($this->year, $newMonth, $this->day);
		}
		public function addYear($value){
			$newYear = $this->year + $value;
			$this->setDate($newYear, $this->month, $this->day);
		}
		public function subYear($value){
			$newYear = $this->year - $value;
			$this->setDate($newYear, $this->month, $this->day);
		}
		public function format($format){
			// выведет дату в указанном формате
			// формат пусть будет такой же, как в функции date
			return date($format,mktime(0,0,0,$this->$month,$this->$day,$this->$year));
		}
		public function __toString(){
			// выведет дату в формате 'год-месяц-день'
			return (string) $this->year.'-'.$this->month.'-'.$this->day;
		}







		private function setDate($year, $month, $day){

			$date = date('Y-n-j',mktime(0,0,0,$month,$day,$year));
			$regDate = '^(?<year>[0-9]{4})-(?<month>[0-9]{1,2})-(?<day>[0-9]{1,2})$';
			preg_match("#$regDate#",$date, $newDate);

			$this->year = $newDate['year'];
			$this->month = $newDate['month'];
			$this->day = $newDate['day'];
		}

}
$date = new Date();
$date->subDay(31);

?>
<p class="mb-0"><?=$date->getDay()?></p>
<p class="mb-0"><?=$date->getMonth('en')?></p>
<p class="mb-0"><?=$date->getMonth('ru')?></p>
<p class="mb-0"><?=$date->getMonth('r')?></p>
<p class="mb-0"><?=$date->getYear()?></p>
<p class="mb-0"><?=$date->getWeekDay()?></p>
<p class="mb-0"><?=$date->getWeekDay('ru')?></p>
<p class="mb-0"><?=$date->getWeekDay('en')?></p>
</div>