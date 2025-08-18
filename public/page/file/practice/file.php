<main>
	<h2 class="text-center pt-2">
		Класс File в ООП на PHP
	</h2>
	<p>
	Давайте реализуем класс для работы с файлами. Пусть этот класс реализует следующий интерфейс:
	</p>
	<code>
		<pre>
&lt;?php
	interface iFile
	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}
?>
		</pre>
	</code>
	<div class="task">
		<h6>
			1) Реализуйте описанный класс в соответствии с интерфейсом. Проверьте работу вашего класса.
		</h6>
		<p>
			Решение:
		</p>
		<code>
			<pre>
	class File implements iFile{
		private $filePath;
		private $fileName;

		public function __construct($filePath){
			$match;
			preg_match('#(?&lt;filePath>.+)\/(?&lt;fileName>[^\/]+)$#',$filePath, $match);
			$this->filePath = $match['filePath'];
			$this->fileName = $match['fileName'];
			// var_dump($match);
		}
		public function getPath(){ // путь к файлу
			$dir = dirname(__FILE__);
			return $dir.'\\'.$this->filePath;
		} 
		public function getDir(){ // папка файла
			return $this->filePath;
		}
		public function getName(){// имя файла
			return $this->fileName;
		}
		public function getExt(){// получает текст файла
			preg_match("#(?&lt;name>[a-zA-Z]+)\.(?&lt;ext>[a-zA-Z]+)#", $this->fileName, $match);
			return $match['ext'];
		}
		public function getSize(){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			return filesize($file);
		}
		public function getText(){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			return file_get_contents($file);
		}
		public function setText($text){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			file_put_contents($file,$text);
		}
		public function appendText($text){// добавляет текст в конец файла
			$file = $this->getPath().'/'.$this->fileName;
			$oldText = $this->getText();
			file_put_contents($file, $oldText.$text);
		}
		public function copy($copyPath){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			copy($file, $copyPath);
		}
		public function delete(){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			unlink($file,);
		}
		public function rename($newName){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			$newfile = $this->getPath().'/'.$newName;
			rename($file, $newfile);
			$this->fileName = $newName;
		}
		public function replace($newPath){// перемещает файл
			$file = $this->getPath().'/'.$this->fileName;
			$newfile = $newPath.'/'.$this->fileName;
			rename($file, $newfile);
			$this->filePath = $newPath;
		}
	}
			</pre>
		</code>
		<!-- <p>
			Результат:
		</p> -->
<?php
	interface iFile	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}
	class File implements iFile{
		private $filePath;
		private $fileName;

		public function __construct($filePath){
			$match;
			preg_match('#(?<filePath>.+)\/(?<fileName>[^\/]+)$#',$filePath, $match);
			$this->filePath = $match['filePath'];
			$this->fileName = $match['fileName'];
			// var_dump($match);
		}
		public function getPath(){ // путь к файлу
			$dir = dirname(__FILE__);
			return $dir.'\\'.$this->filePath;
		} 
		public function getDir(){ // папка файла
			return $this->filePath;
		}
		public function getName(){// имя файла
			return $this->fileName;
		}
		public function getExt(){// получает текст файла
			preg_match("#(?<name>[a-zA-Z]+)\.(?<ext>[a-zA-Z]+)#", $this->fileName, $match);
			return $match['ext'];
		}
		public function getSize(){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			return filesize($file);
		}
		public function getText(){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			return file_get_contents($file);
		}
		public function setText($text){// размер файла
			$file = $this->getPath().'/'.$this->fileName;
			file_put_contents($file,$text);
		}
		public function appendText($text){// добавляет текст в конец файла
			$file = $this->getPath().'/'.$this->fileName;
			$oldText = $this->getText();
			file_put_contents($file, $oldText.$text);
		}
		public function copy($copyPath){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			copy($file, $copyPath);
		}
		public function delete(){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			unlink($file,);
		}
		public function rename($newName){// копирует файл
			$file = $this->getPath().'/'.$this->fileName;
			$newfile = $this->getPath().'/'.$newName;
			rename($file, $newfile);
			$this->fileName = $newName;
		}
		public function replace($newPath){// перемещает файл
			$file = $this->getPath().'/'.$this->fileName;
			$newfile = $newPath.'/'.$this->fileName;
			rename($file, $newfile);
			$this->filePath = $newPath;
		}
	}
?>
</div>


	<p class="text-center">
		<a href="/page/practice/interval" class="p-2">Назад</a>
		<a href="/page/practice/Tag"  class="p-2">Далее</a>
	</p>
</main>