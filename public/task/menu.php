<?php
include_once('classes/origin/Tag.php');
class Link extends Tag {
	public function __construct(){
		$this->setAttr('href','');
		parent::__construct('a');
	}
}
for($i=1; $i<=5; $i++ ){
		echo (new Link)->setText("page$i")->setAttr('href',"/page/task/$i")->show().'<br/>';
}
?>