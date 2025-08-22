<?php
$slug1 = $params['slug1'];
$slug2 = $params['slug2'];

	function getFile($name) {
		ob_start();
			include $name; 
		return ob_get_clean(); 
	}
if($params['slug1'] == 'task') {
	$content = getFile('page/file/'.$slug1.'/'.$slug2.'.php');
	return ['title'=> 'task', 'content'=> $content];
}
$contPage = file_get_contents('template/leftNav/'.$slug1.'.html');

// $content = file_get_contents('page/file/'.$slug1.'/'.$slug2.'.php');
$content = getFile('page/file/'.$slug1.'/'.$slug2.'.php');

$contPage = str_replace('{{ main }}', $content, $contPage);

$title = "OOP in PHP";
// return ['title'=> $title, 'content'=> $content];
return ['title'=> $title, 'content'=> $contPage];
?>