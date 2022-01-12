<?php 

class Args {

  private $arguments = [];

  public function __construct(...$params){ 
      $this->set($params);
  }

  public function __toString() {
    return $this->get();
  }

  public function __invoke() {
    return $this->get();
  }

  public function get() {
    return $this->arguments;
  }

  private function filter($params) {

    if (!is_array($params)) { 
      $params = [$params];
    }

    return array_filter($params, function ($param) {
      return $param != null;
    });

  }

  public static function isArgument($params) {
     return is_object($params) && get_class($params) === self::class;
  }

  public function asArgument($params) {
     
     return self::isArgument($params) 
        ? $params 
        : args($params);

  }

  private function isMe($params) { 

     return self::isArgument($params);

  }

  private function assign($arguments) {

    unset($this->arguments);

    $this->arguments = $arguments;
  }

  public function set($params = null) {

    $arguments = [];

    if ($this->isMe($params)) { 

       $arguments = $params();

    } else {

       $arguments = $this->filter($params);

    }    
    
    $this->assign($arguments);
  }

  public function merge($params) {

     $this->assign(
       $this->getMergedData($params)
     );

  }

  public function getMergedData($params) {

     if ($this->isMe($params)) {

       $params = $params();

     }

     if (!is_array($params)) {
       var_dump("$params is not of type array. trace - Args::getMergedData()");
       var_dump($params);
       exit;
     }

     return array_merge($this->arguments, $params);
  }

}

function args(...$params) { 
   return new Args(...$params);
}