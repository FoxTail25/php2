<?php
class ColorRect {
	private $width;
	private $height;
	private $color;

	public function __construct($color, $width, $height){
		$this->color = $color;
		$this->width = $width;
		$this->height = $height;
	}

	public function getColorRect($text){
		return '<div style="width:'.$this->getWidth().'; height:'.
		$this->getHeight().'; background:'.$this->color.';display:
		flex; justify-content:center; align-items:center">'.$text.
		'</div>';
	}
	private function getWidth(){
		return $this->width.'px';
	}
	private function getHeight(){
		return $this->height.'px';
	}
}
?>