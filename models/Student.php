<?php 

class Student extends Helper {
  public $name;
  public $age;
  public $course;

  public function __construct($name = null, $age = null, $course = null) {
    return parent::load([
      'name' => $name,
      'age' => $age,
      'course' => $course
    ]);
  }

  public function getName() {
    return $this->name;
  }

  public function getAge($name) {
    return args($name, $this->age);
  }

  public function getCourse($name, $age) {
    return args($name, $age, $this->course);
  }

  public function sayHello($name) {
    echo "hello ${name}";
  }
}

