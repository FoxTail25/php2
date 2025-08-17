<main>
	<h2 class="text-center pt-2">Магический метод set</h2>
<p>
Магический метод __set вызывается при попытке изменить значение несуществующего или скрытого свойства. В качестве параметров он принимает имя свойства и значение, которое ему пытаются присвоить.

Давайте посмотрим на практическом примере. Пусть у нас дан вот такой класс Test:
</p>
<code>
<pre>
&lt;?php
	class Test{
		private $prop1;
		private $prop2;
	}
?></pre>
</code>
<p>
Давайте сделаем в этом классе магический метод __set, который с помощью функции var_dump будет выводить имя свойства, к которому произошло обращение, и значение, которое этому свойству пытаются установить:
</p>
<code>
<pre>
&lt;?php
	class Test{
		public $prop1 = 1; // публичное свойство
		private $prop2 = 2; // приватное свойство
        
        public function __set($property, $value){
			var_dump($property . ' ' .$value);
		}
	}
?></pre>
</code>
<p>
Проверим работу нашего класса:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	$test->prop = 'value'; // var_dump метода __set выведет 'prop value'
?></pre>
</code>
<p>
Давайте теперь будем устанавливать значение свойству, имя которого хранится в переменной $property:
</p>
<code>
<pre>
&lt;?php
	class Test{
		private $prop1;
		private $prop2;
		
		public function __set($property, $value){
			$this->$property = $value; // устанавливаем значение
		}
	}
?></pre>
</code>
<p>
Теперь мы сможем записывать в приватные свойства снаружи класса:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	
	$test->prop1 = 1; // запишем 1
	$test->prop2 = 2; // запишем 2
?></pre>
</code>
<p>
Записывать мы можем, однако, проверить, записалось ли туда что-то - нет, так как свойства приватные.
Можно сделать геттер для этих свойств или просто воспользоваться магическим методом __get. Воспользуемся вторым вариантом:
</p>
<code>
<pre>
&lt;?php
	class Test	{
		private $prop1;
		private $prop2;
		
		public function __set($property, $value){
			$this->$property = $value;
		}
		
		// Магический геттер свойств:
		public function __get($property){
			return $this->$property;
		}
	}
?></pre>
</code>
<p>
Вот теперь мы можем проверить работу нашего класса. Проверим:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	
	$test->prop1 = 1; // запишем 1
	$test->prop2 = 2; // запишем 2
	
	echo $test->prop1; // выведет 1
	echo $test->prop2; // выведет 2
?></pre>
</code>
<p>
    На самом деле, конечно же, не стоит разрешать всем подряд записывать в приватные свойства, иначе пропадает суть этих приватных свойств (проще сделать их публичными и все). Поэтому данный метод следует применять только тогда, когда в этом действительно есть необходимость. Ниже мы еще рассмотрим примеры удачного применения.
</p>
<h5 class="text-center mt-3">Несуществующее свойство</h5>
<p>
Давайте попробуем записать данные в несуществующее свойство - это будет работать:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	
	$test->prop3 = 3; // запишем 3
	echo $test->prop3; // выведет 3
?></pre>
</code>
<p>
    Пусть мы не хотим разрешать записывать в несуществующие свойства. И, вообще, хотим разрешить запись только в свойства prop1 и prop2. Это легко сделать - достаточно в методе __set добавить соответствующее условие:
</p>
<code>
<pre>
&lt;?php
	class Test{
		private $prop1;
		private $prop2;
		
		public function __set($property, $value){
			// Напишем условие:
			if ($property == 'prop1' or $property == 'prop2') {
				$this->$property = $value;
			}
		}
		
		public function __get($property){
			return $this->$property;
		}
	}
?></pre>
</code>
<p>
    Если таких свойств будет много, то не очень удобно перечислять их все в условии.
    
    Давайте запишем разрешенные для записи свойства в массив и будем проверять наличие свойства в этом массиве с помощью функции in_array:
</p>
<code>
<pre>
&lt;?php
	class Test{
		private $prop1;
		private $prop2;
		
		public function __set($property, $value){
			$properties = ['prop1', 'prop2']; // разрешенные свойства
			
			if (in_array($property, $properties)) {
				$this->$property = $value;
			}
		}
		
		public function __get($property){
			return $this->$property;
		}
	}
?></pre>
</code>
<h5 class="text-center mt-3">Проверка при записи</h5>
<p>
Давайте будем проверять значения свойств на соответствие определенному условию:
</p>
<code>
    <pre>
        &lt;?php
        class Test{
            private $prop1;
            private $prop2;
            
            public function __set($property, $value){
			switch($property) {
                case 'prop1':
					// Если prop1 от 0 до 10:
					if ($value > 0 and $value < 10) {
                        $this->$property = $value;
					}
                    break;
                    case 'prop2':
					// Если prop2 от 10 до 20:
					if ($value > 10 and $value < 20) {
                        $this->$property = $value;
					}
                    break;
                    default:
					// Такого свойства нет
                    break;
                }
            }
            
            public function __get($property){
                return $this->$property;
            }
        }
        ?></pre>
    </code>
<h5 class="text-center mt-3">Приминенипе</h5>
<p>
    Практическое применение метода __set вы изучите самостоятельно, решив вот такую задачу:    
</p>
    <div class="task">
        <h6>
            1) Пусть дан вот такой класс User с геттерами и сеттерами свойств:
            <code>
 <pre>
    &lt;?php
	class User{
		private $name;
		private $age;
		
		public function getName(){
			return $this->name;
		}
		
		public function setName($name){
			if ($name != '') { // проверяем имя на непустоту
				$this->name = $name;
			}
		}
		
		public function getAge(){
			return $this->age;
		}
		
		public function setAge($age){
			if ($age >= 0 and $age <= 70) { // проверяем возраст
				$this->age = $age;
			}
		}
	}
 ?></pre>
                </code>
                Переделайте код этого класса так, чтобы вместо геттеров и сеттеров использовались магический методы __get и __set.
            </h6>
            <p>
                Решение:
            </p>
<code>
<pre>
&lt;?php
	class User{
		private $name;
		private $age;

		public function __set($property, $value){
			if($property == 'name' and trim($value) != '') {
				$this->name = $value;
			}
			if($property == 'age' and $value >= 0 and $value <= 70) {
				$this->age = $value;
			}
		}
		public function __get($property){
			if(property_exists($this, $property)){
				return $this->$property;
			} else {
				return "В объекте класса ".get_class($this). " нет свойства ".$property;
			}
		}
	}
	$userI2 = new User;
	$userI2->name = 'Ivan';
	$userI2->age = 30;
	echo $userI2->name;
	echo '&lt;br/>';
	echo $userI2->age;
	echo '&lt;br/>';
	echo $userI2->salary;
    ?></pre>
</code>
<p>
    Результат:
</p>
<?php
	class User{
		private $name;
		private $age;

		public function __set($property, $value){
			if($property == 'name' and trim($value) != '') {
				$this->name = $value;
			}
			if($property == 'age' and $value >= 0 and $value <= 70) {
				$this->age = $value;
			}
		}
		public function __get($property){
			if(property_exists($this, $property)){
				return $this->$property;
			} else {
				return "В объекте класса ".get_class($this). " нет свойства ".$property;
			}
		}

	}
	$userI2 = new User;
	$userI2->name = 'Ivan';
	$userI2->age = 30;
	echo $userI2->name;
	echo '<br/>';
	echo $userI2->age;
	echo '<br/>';
	echo $userI2->salary;
	?>
</div>


<p class="text-center">
	<a href="/page/magic/get" class="p-2">Назад</a>
	<a href="/page/practice/date"  class="p-2">Далее</a>
</p>
</main>