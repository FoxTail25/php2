<main>
	<h2 class="text-center pt-2">Хранение классов в отдельных файлах в PHP</h2>
	<p>
		До этого урока мы писали наши классы в том же файле, где и вызывали их. В реальной жизни классы обычно хранятся в отдельных файлах, причем каждый класс в своем отдельном файле. При этом существует соглашение о том, что файл с классом следует называть так же, как и сам класс. Давайте посмотрим на практике. Сделаем файл User.php с классом User:
	</p>
<code>
<pre>
&lt;?php
	class User
	{
		
	}
?>
</pre>
</code>
<p>
Пусть теперь у нас есть файл index.php, в котором мы хотим воспользоваться нашим классом User. Мы не можем в этом файле просто взять и создать объект класса User - это вызовет ошибку, так как PHP не сможет найди код этого класса:
</p>
<code>
<pre>
&lt;?php
$user = new User; // это вызовет ошибку
?>
</pre>
</code>
<p>
	Для того, чтобы класс User был доступен в файле index.php, нужно подключить этому нему файл с нашим классом. Сделаем это с помощью команды require_once:
</p>
<code>
<pre>
	require_once 'User.php'; // подключаем наш класс
	$user = new User;
</pre>
</code>
<h5 class="text-center">Задачи</h5>

<h6>
	1) Сделайте несколько классов в разных файлах. Подключите ваши классы к файлу index.php.
</h6>
<p>
	Решение:
</p>
<code>
	<pre>
		//file:classes/ColorRect.php
&lt;?php
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
		return '&lt;div style="width:'.$this->getWidth().'; height:'.
		$this->getHeight().'; background:'.$this->color.';display:
		flex; justify-content:center; align-items:center">'.$text.
		'&lt;/div>';
	}
	private function getWidth(){
		return $this->width.'px';
	}
	private function getHeight(){
		return $this->height.'px';
	}
}
?>


		//file:index.php
&lt;?php
require_once('classes/ColorRect.php');

$red100x50 = new ColorRect('red',100,50);
echo $red100x50->getColorRect('Привет');

$blue150x40 = new ColorRect('blue',150,40);
echo $blue150x40->getColorRect('Hello');
?>
	</pre>
</code>
<p>
	Результат:
</p>
<?php
require_once('classes/ColorRect.php');
$red100x50 = new ColorRect('red',100,50);
echo $red100x50->getColorRect('Привет');

$blue150x40 = new ColorRect('blue',150,40);
echo $blue150x40->getColorRect('Hello');
?>
<hr/>



<p class="text-center">
	<a href="/page/oop/read-only-properties" class="p-2">Назад</a>
	<a href="/page/oop/objects-in-array"  class="p-2">Далее</a>
</p>
</main>