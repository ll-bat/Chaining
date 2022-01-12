<?php

class Chain extends Worker {

   public function __construct($class = null) {
      parent::__construct($class);
      $this->reset();
   }

   public static function begin() {
     return new Chain();
   }

   public function reset() {
     return $this->setData();
   }

   public function get() {
     return $this->data;
   }

   public function getOwner($index = null) {
     if (!$index) {
       return $this->references;
     }

     if (count($this->references) > $index && is_int($index) && $index > -1) {
       return $this->references[$index];
     }

     throw new Exception("$index is out of bounds or has invalid format");
   }

   
}

function make_chained($class) {
  return new Chain($class);
}