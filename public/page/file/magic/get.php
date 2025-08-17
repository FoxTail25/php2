<main>
	<h2 class="text-center pt-2">Магический метод get</h2>
<p>
Следующий магический метод, который мы с вами разберем, называется __get. Этот метод срабатывает при попытке прочитать значение приватного или защищенного свойства.
Если реализовать метод __get в каком-нибудь классе, то все обращения к несуществующим или скрытым свойствам будут обрабатываться этим методом.
При этом PHP автоматически будет передавать имя запрошенного свойства в первый параметр этого метода, а возвращаемое этим методом значение будет воспринято как значение свойства, к которому произошло обращение.
Скорее всего пока не очень понятно, как это работает, поэтому давайте посмотрим на практическом примере. Пусть у нас есть вот такой класс Test с приватным и публичным свойствами:
</p>
<code>
<pre>
&lt;?php
	class Test{
		public $prop1 = 1; // публичное свойство
		private $prop2 = 2; // приватное свойство
	}
?></pre>
</code>
<p>
    Давайте добавим в наш класс магический метод __get, который для начала будет просто возвращать имя свойства, к которому произошло обращение:
</p>
<code>
<pre>
&lt;?php
	class Test{
		public $prop1 = 1;
		private $prop2 = 2;
		public function __get($property){
			return $property; // просто вернем имя свойства
		}
	}
?></pre>
</code>
<p>
    Давайте проверим работу созданного магического метода. Обратимся к трем типам свойств: к публичному свойству, к приватному и к несуществующему:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	
	// Обращаемся к публичному свойству:
	echo $test->prop1; // выведет 1 - то есть значение свойства
	
	// Обращаемся к приватному свойству:
	echo $test->prop2; // выведет 'prop2' - имя свойства
	
	// Обращаемся к несуществующему свойству:
	echo $test->prop3; // выведет 'prop3' - имя свойства
?></pre>
</code>
<p>
    Как вы видите, наш магический метод реагирует на обращение к приватным и несуществующим свойствам, но игнорирует обращение к публичным - они работают так, как и работали раньше.
</p>
<h5 class="text-center">Применение: свойства только для чтения</h5>
<p>
    Пусть теперь в нашем классе все свойства приватные:
</p>
<code>
<pre>
&lt;?php
	class Test{
		private $prop1 = 1;
		private $prop2 = 2;
	}
?></pre>
</code>
Давайте сделаем так, чтобы эти свойства во внешнем мире были доступны только для чтения. Ранее мы такое уже делали, создавая геттеры для каждого свойства и не создавая сеттеры.

Давайте теперь для решения этой задачи воспользуемся магическим методом __get. Будем возвращать в нем значение запрошенного свойства. Как это сделать: имя запрошенного свойства попадает в параметр метода __get, в нашем случае $property.

Это значит, что мы можем прочитать свойство, имя которого хранится в переменной, вот так: $this->$property (имя свойства будет переменной, то есть с долларом вначале, мы это проходили в предыдущих уроках).

Давайте сделаем описанный метод __get:
<code>
<pre>
&lt;?php
	class Test{
		private $prop1 = 1;
		private $prop2 = 2;
		public function __get($property){
			return $this->$property;
		}
	}
?></pre>
</code>
<p>
    Воспользуемся им для чтения свойств:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	echo $test->prop1; // выведет 1
	echo $test->prop2; // выведет 2
?></pre>
</code>
<p>
    Попытка записать что-то в свойство приведет к ошибке:
</p>
<code>
<pre>
&lt;?php
	$test = new Test;
	$test->prop1 = 2; // выдаст ошибку
?></pre>
</code>
<code>
<pre>
&lt;?php
	$test = new Test;
	$test->prop1 = 2; // выдаст ошибку
?></pre>
</code>
<p>
    Это именно то, что нам нужно: свойство можно прочитывать, но нельзя записывать.
    Попытка прочитать несуществующее свойство выдаст ошибку:
</p>
<code>
    <pre>
        &lt;?php
        $test = new Test;
        echo $test->prop3; // выдаст ошибку
        ?></pre>
    </code>
    <p>
        Обратите также внимание на следующий нюанс: когда мы делали свойства только для чтения старым способом, то для того, чтобы прочитать свойство, мы использовали метод-геттер. В новом способе мы будем обращаться именно к свойствам, будто они публичные. Но записать в них не сможем, будто они приватные.
    </p>
    <div class="task">
        <h6>
            1) Пусть дан вот такой класс User, свойства которого доступны только для чтения с помощью геттеров:
            <code>
                <pre>
                    &lt;?php
                    class User{
                        private $name;
                        private $age;
                        public function __construct($name, $age){
                            $this->name = $name;
                            $this->age = $age;
                        }
                        public function getName(){
                            return $this->name;
                        }
                        public function getAge(){
                            return $this->age;
                        }
                    }
                    ?></pre>
                </code>
                Переделайте код этого класса так, чтобы вместо геттеров использовался магический метод __get.
            </h6>
            <p>
                Решение:
            </p>
<code>
<pre>
&lt;?php
    class User{
        private string $name;
        private int $age;
        public function __construct(string $name, int $age){
            $this->name = $name;
            $this->age = $age;
	}
	public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            } else {
                return 'у объекта не существует свойства '.$property;
            }
        }
        
    }
    $user = new User('Иван', 40);
    echo $user->name;
    echo '&lt;br/>';
    echo $user->age;
    <!-- echo '&lt;br/>';
    echo $user->salary; -->
    ?></pre>
</code>
<p>
    Результат:
</p>
<?php
	class User{
        private string $name;
		private int $age;
		public function __construct(string $name, int $age){
            $this->name = $name;
			$this->age = $age;
		}
		public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            // } else {
                //     return 'у объекта не существует свойства '.$property;
            }
		}
        
    }
    $user = new User('Иван', 40);
    echo $user->name;
    echo '<br/>';
    echo $user->age;
    // echo '<br/>';
    // echo $user->salary;
	?>
</div>
<div class="text-center mt-2">Несуществующее свойство</div>
<p>
    В примере выше мы применяли магию метода __get для отлавливания обращения к приватным свойствам. На самом деле этот метод также может быть полезен для отлавливания обращений к несуществующим свойствам.
    Посмотрим на практическом примере. Пусть у нас есть класс User с фамилией, именем и отчеством, являющимися публичными свойствами:
</p>
<code>
<pre>
&lt;?php
	class User	{
		public $surname;
		public $name;
		public $patronymic;
	}
	$user = new User;
	$user->surname = 'Иванов';
	$user->name = 'Иван';
	$user->patronymic = 'Иванович';
?></pre>
</code>
<p>
    Давайте сделаем так, чтобы объект класса вел себя так, будто у него также есть свойство fullname, выводящее ФИО юзера:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	$user->surname = 'Иванов';
	$user->name = 'Иван';
	$user->patronymic = 'Иванович';
	
	// Выведет 'Иванов Иван Иванович':
	echo $user->fullname; // это пока не работает, является нашей целью
?></pre>
</code>
<p>
Используем для этого наш магический метод __get:
</p>
<code>
<pre>
&lt;?php
	class User{
		public $surname;
		public $name;
		public $patronymic;
		
		// Используем метод-перехватчик:
		public function __get($property){
			// Если идет обращение к свойству fullname:
			if ($property == 'fullname') {
				return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
			}
		}
	}
?></pre>
</code>
<p>
Проверим:
</p>
<code>
<pre>
&lt;?php
	$user = new User;
	
	$user->surname = 'Иванов';
	$user->name = 'Иван';
	$user->patronymic = 'Иванович';
	
	echo $user->fullname; // выведет 'Иванов Иван Иванович'
?></pre>
</code>
<p>
    Получается, что с помощью __get мы создали в классе виртуальное свойство: в классе его нет, но прочитать его можно.
    Кстати, записать в такое свойство будет нельзя, так как в реальности его не существует в нашем классе. То есть это свойство только для чтения.
</p>



<div class="text-center mt-2 bg-secondary-subtle">"Отсебятина"</div>
<p class="bg-secondary-subtle">
    Перед тем как что-либо возвращать из __get() можно проверить существование запрашиваемого свойства встроенной функцией property_exists()

</p>
<code>
    <pre>
    public function __get($property){
        if(property_exists($this, $property)){
            return $this->$property;
        } else {
            return 'у объекта не существует свойства '.$property;
        }
    }
    </pre>
</code>
    <div class="task">
        <h6>
            2) Сделайте класс Date с публичными свойствами year, month и day. С помощью магии сделайте свойство weekDay, которое будет возвращать день недели, соответствующий дате.
        </h6>
<p>
    Решение:
</p>
<code>
<pre>
&lt;?php
class Date {
    public $year;
    public $month;
    public $day;
    public function __construct($year=null, $month=null, $day=null){
        if(isset($year) and isset($month) and isset($day)){
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
        }else {
            $this->year = date('Y',time());
            $this->month = date('n',time());
            $this->day = date('j',time());
        }
    }
    public function __get($prop){
        if(property_exists($this, $prop)){
            return $this->$prop;
        } else if($prop = 'weekDay'){
            return date('l',mktime(0,0,0,$this->month,$this->day,$this->year));
        } else {
            return 'нет такого свойства';
        }
    }
}
echo(new Date)->weekDay;
echo '&lt;br/>';
echo(new Date(2025,8,18))->weekDay;
    ?></pre>
</code>
<p>
    Результат:
</p>
<?php
class Date {
    public $year;
    public $month;
    public $day;
    public function __construct($year=null, $month=null, $day=null){
        if(isset($year) and isset($month) and isset($day)){
            $this->year = $year;
            $this->month = $month;
            $this->day = $day;
        }else {
            $this->year = date('Y',time());
            $this->month = date('n',time());
            $this->day = date('j',time());
        }
    }
    public function __get($prop){
        if(property_exists($this, $prop)){
            return $this->$prop;
        } else if($prop = 'weekDay'){
            return date('l',mktime(0,0,0,$this->month,$this->day,$this->year));
        } else {
            return 'нет такого свойства';
        }
    }
}
echo(new Date)->weekDay;
echo '<br/>';
echo(new Date(2025,8,18))->weekDay;
	?>
</div>

<p class="text-center">
	<a href="/page/magic/get" class="p-2">Назад</a>
	<a href="/page/magic/set"  class="p-2">Далее</a>
</p>
</main>