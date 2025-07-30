<?php 
$url = $_SERVER['REQUEST_URI'];
$layout = file_get_contents('template/layout.html');
$header = file_get_contents('template/header.html');

// роуты
$route = '^/$';
if(preg_match("#$route#", $url, $params)){
	$page = include 'page/home.php';
}
$route = '^/page/(?<slug1>[a-zA-Z0-9_-]+)$';
if(preg_match("#$route#", $url, $params)){
	$page = include 'page/slug1.php';
}
$route = '^/page/(?<slug1>[a-zA-Z0-9_-]+)/(?<slug2>[a-zA-Z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
	$page = include 'page/slug2.php';
}

//Страница 404
if(!isset($page)){
	$page = include 'page/page404.php';
}



// меняем title
if(isset($page['title'])) {
	$layout = str_replace('{{ title in layout }}', $page['title'], $layout);
} else {
	$layout = str_replace('{{ title in layout }}', 'PHP advance', $layout);
}
// меняем header
$layout = str_replace('{{ header in layout }}', $header, $layout);

// меняем content
$layout = str_replace('{{ content in layout }}', $page['content'], $layout);

echo $layout;
?>