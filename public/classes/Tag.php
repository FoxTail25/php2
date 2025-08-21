<?php
class Tag {
	protected $name;
	protected $attrs;

	public function __construct($name, $attrs = []) {
		$this->name = $name;
		$this->attrs = $attrs;
	}
	public function setAttr($name, $value){
		$this->attrs[$name] = $value;
		return $this;
	}
	public function setAttrs($arr){
		foreach($arr as $name => $value){
			$this->setAttr($name,$value);
		}
		return $this;
	}
	public function removeAttr($removAttrName){
		$filteredArr = [];
		foreach($this->attrs as $name => $value){
			if ($name != $removAttrName){
				$filteredArr[$name] = $value;
			}
		}
		$this->attrs = $filteredArr;
		return $this;
	}
	public function open(){
		$name = $this->name;
		return '<'.$name.' '.$this->getAttrsStr().'>';
	}
	public function close(){
		return '</'.$this->name.'>';
	}
	private function getAttrsStr(){
		$attrs = $this->attrs;
		if(!empty($attrs)){
			$attrStr = '';
			foreach($attrs as $attrName => $attrValue){
				if ($attrValue === true) {
					$attrStr .="$attrName";	
				} else {
					$attrStr .="$attrName=\"$attrValue\"";
				}
			}
			return $attrStr;
		} else {
			return '';
		}
	}
}
?>