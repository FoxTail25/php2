<?php
class Date{
	private $year;
	private $month;
	private $day;
		
	const MonthRu = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
	const MonthEn = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	const WeekDayRu = ['Воскресенье','Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
	const WeekDayEn = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	const DateRegul = '^(?<year>[0-9]{4})-(?<month>[0-9]{1,2})-(?<day>[0-9]{1,2})$';
	public function __construct($date = null){ //принимает дату в формате год-месяц-день
		$regDate = self::DateRegul;
		if(isset($date) and preg_match("#$regDate#",$date, $newDate)){
			$this->year = $newDate['year'];
			$this->month = $newDate['month'];
			$this->day = $newDate['day'];
		} else {
			$this->year = date('Y',time());
			$this->month = date('m',time());
			$this->day = date('d',time());
		}
	}
	public function getDay(){
		return $this->day;
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
		return $this;
	}
	public function subDay($value){
		$newDay = $this->day - $value;
		$this->setDate($this->year, $this->month, $newDay);
		return $this;
	}
	public function addMonth($value){
		$newMonth = $this->month + $value;
		$this->setDate($this->year, $newMonth, $this->day);
		return $this;
	}
	public function subMonth($value){
		$newMonth = $this->month - $value;
		$this->setDate($this->year, $newMonth, $this->day);
		return $this;
	}
	public function addYear($value){
		$newYear = $this->year + $value;
		$this->setDate($newYear, $this->month, $this->day);
		return $this;
	}
	public function subYear($value){
		$newYear = $this->year - $value;
		$this->setDate($newYear, $this->month, $this->day);
		return $this;
	}
	public function format($format){
		return date($format,mktime(0,0,0,$this->$month,$this->$day,$this->$year));
	}
	public function __toString(){
		return (string) $this->year.'-'.$this->month.'-'.$this->day;
	}

	private function setDate($year, $month, $day){

		$date = date('Y-m-d',mktime(0,0,0,$month,$day,$year));
		$regDate = self::DateRegul;
		preg_match("#$regDate#",$date, $newDate);

		$this->year = $newDate['year'];
		$this->month = $newDate['month'];
		$this->day = $newDate['day'];
	}
}
?>