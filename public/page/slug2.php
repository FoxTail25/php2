<?php
$slug1 = $params['slug1'];
$slug2 = $params['slug2'];

	function getFile($name) {
		ob_start();
			include $name; 
		return ob_get_clean(); 
	}

// $content = file_get_contents('page/file/'.$slug1.'/'.$slug2.'.php');
$content = getFile('page/file/'.$slug1.'/'.$slug2.'.php');

$title = "OOP in PHP";
return ['title'=> $title, 'content'=> $content];
?>