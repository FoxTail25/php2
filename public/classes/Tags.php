<?php
class Tags {
	private $text;

	public function __construct($text){
		$this->text = $text;
	}

	public function setText($text){
		$this->text = $text;
	}
	public function getTextInTag($tag){
		return '<'.$tag.'>'.$this->text.'</'.$tag.'>';
	}

}