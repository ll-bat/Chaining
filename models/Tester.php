<?php 



class Tester {
  public $name = null;
  public $level = null;

  public function __construct($name, $level) {
    $this->name = $name;
    $this->level = $level;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
 
  public function aboutMe() {
    echo "I'm teser. This is my description.     ";
  }
 
  public function getInfo($name, $level) {
    $this->aboutMe();
    echo "Hi, I'm ${name} and currently I'm on level ${level}";
  }


}