<?php 
    class Person {
        
        function __construct(private string $name,private int $age){}
        function getName(){
            return $this->name;
        }
        function getAge(){
            return $this->age;
        }
    }
?>