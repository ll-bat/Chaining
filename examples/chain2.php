<?php 

//     var_dump($student);
//     exit;


// $chainedStudent = new Chain($student);

// $chainedStudent->getName()
//       ->getAge()
//       ->getCourse()
//       ->getName()
//       ->getAge()
//       ->getCourse()
//       ->then(function ($data) {
//         //
//       })
//       ->then(function ($data) {
//         $student1 = new Student();
//         $student1->load(['name' => 'll-bat']);
//         return $student1;
//       })
//       ->appendData(function ($student1) {
//         $student1->age = 12;
//         return $student1;
//       })
//       ->then(function ($data) {
//         return array_map(function ($student) {
//           echo $student->name .' ';
//         }, $data);
//       });


      // $test = make_chained(new Student())
      //       ->_print();