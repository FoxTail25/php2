<?php
class ZeroUser {
    private $name;
    private $age;

    private function isCorrectAge($newAge){
        if($newAge >= 1 and $newAge <= 100){
            $this->age = $newAge;
        }
    }

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    public function setName($newName){
        $this->name = $newName;
    }
    public function getName(){
        return $this->name;
    }
    public function setAge($newAge){
        $this-isCorrectAge($newAge);
    }
    public function getAge(){
        return $this->age;
    }
}









?>