<?php 

$runner = make_chained(new Student())
    ->load([
      'name' => 'lgio',
      'age' => 21,
      'course' => 3
    ])
    ->getName()
    ->getAge()
    ->getCourse()
    ->maintain(function ($self) {
        $self->_print()
          ->getName()
          ->getAge()
          ->getCourse()
          ->_print();
    })
    ->then(function ($name, $age, $course = null) {

       make_chained(new Student('lua', $age + 2, 'N/A'));
          // ->_print();

       return args($name, 1);
    })
    ->then(function($name, $level, $self) {

      //  $name = 'Vladimer';  $level = 52; 

       $self->chain(new Tester($name, $level));

       return args($name, $level);
    })
    ->getInfo();