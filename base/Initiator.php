<?php 



class Initiator {
  
   protected $data = null;
   protected $references = [];   

   public function __construct($class = null) {
      if ($class) {
        $this->references = [$class];
      }
   }

   public function chain($class) {

      if (!$this->isUniqueClass($class)) {
        throw new Exception(get_class($class) . ' is not unique class');
      }

      $this->references[] = $class;

      return $this;
   }

   public function isUniqueClass($class) {

     $class = get_class($class);
     
     foreach ($this->references as $reference) {
       if ($class === get_class($reference)) {
         return false;
       }
     }

     return true;
   }


   protected function findMethod($method) {

      foreach ($this->references as $reference) {

        if (method_exists($reference, $method)) {

          return function (...$params) use ($method, $reference) {
            return $reference->$method(...$params);
          };

        }

      }

      throw new Exception($method . ' method does not exist in reference classes');
   }

   public function getClass($class) {
     if (is_object($class)) {
       $class = get_class($class);
     }
     foreach ($this->references as $reference) {
       if (get_class($reference) === $class) {
         return $reference;
       }
     }

     throw new Exception($class . ' not found chained classes');
   }

}