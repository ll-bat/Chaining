<?php 




$chain = Chain::begin()
    ->then(function ($self) {
        $student = new Student();
        $tester = new Tester('lgio', 1);

        $tester = $self->chain($student)
             ->chain($tester)
             ->setName('lua')
             ->aboutMe()
             ->getClass($tester);

        var_dump($tester->getName());
    });