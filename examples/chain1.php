<?php 


$student = make_chained(new Student())
   
     ->then(function () {

       echo "\n";

     })

     ->then(function () {

       return 1;       

     })

     ->then(function ($a) { 

       return args($a * 2 + 1);

     })

     ->then(function ($res) {

       echo $res ;

       echo "\n";

       return 2;
     })

     ->then(function (...$params) {

       echo "\n";
 
       return args(...$params);
     })

     ->then(function ($res) {
       
       echo $res;
       echo "\n";
       echo "\n";

     })

     ->load([
       'name' => 'John',
       'age' => 1
     ])

     ->_print()

     ->appendData(1)

     ->appendData(2)

     ->maintain(function ($self) {

       echo 'This is not error. We just var_dump here: (( '; 
       echo '\n';

     })

     ->then(function (...$data) {

       echo 'Begin: ';
       echo "\n";

       var_dump(...$data);

       echo "End: ";
       echo "\n";
       echo "\n";
      
     })

     ->getName()

     ->then(function ($data) {
        var_dump($data);
        echo "\n";
     })

    ->load([
      'name' => 'test',
      'age' => 15,
      'course' => 2,
    ])

    ->_print()

    ->getOwner();