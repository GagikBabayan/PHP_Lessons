<?php
//iterator
class MyClass {
    public $val1 = "value 1";
    public $val2 = "value 2";
    
    private $private = "private value";
    protected $protected = "protected value";
    function iterator(){
        foreach($this as $key => $i){
            echo $key . ' ' . $i . "<br>";
        }
    }
  }
  $Tom = new MyClass();
  foreach($Tom as $key => $i){
    echo $key . ' ' . $i . '<br>';
   }
   echo '<br>';
   $Tom ->iterator();

   class IteratorExample implements Iterator{
        private $position;
        public $data = [];
        function __construct(...$data)
        {
            $this->data = $data;
            $this->position = 0;
        }
        function key(): mixed
        {
            return $this->position;
        }
        function current(): mixed
        {
            
            return $this->data[$this->position];
        }
        function rewind(): void
        {
             $this->position = 0;
        }
        function valid(): bool
        {
            return isset($this->data[$this->position]);
        }
        function next(): void
        {
            $this->position++;
            if($this->position >= count($this->data)){
                $this->rewind();
            }
        }
   }
   $arr = ["Ani","Bob","Dave"];
   $example = new IteratorExample(...$arr);

   echo $example->current();
   
   $example->next();
   $example->next();
   $example->next();
   
   echo $example->current();
?>