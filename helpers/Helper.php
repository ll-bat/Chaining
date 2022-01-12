<?php 

class Helper {

  public function load(array $params) {

    foreach($params as $key => $value) {
      if (property_exists($this, $key)) {
        $this->$key = $value;
      } else {
        throw new Exception('Setting unknown property ' . $key . ' for a class ' . get_called_class());
      }
    }
  }

  public function _print(...$params) {
    $this->dump(...$params);
  }

  public function dump($name = null, $age = null, $course = null) { 
    $vars = [];
    foreach(['name', 'age', 'course'] as $property) {
      $vars[$property] = $$property ?? $this->$property;
    }

    foreach($vars as $key => $value) {
      if (is_array($key)) {
        var_dump($key);
        exit;
      }
      if (is_array($value)) {
        var_dump($value);
        exit;
      }
      echo $key . " => " . $value. '; ';
      echo "\n";
    }
    
    echo "\n";
  }

}