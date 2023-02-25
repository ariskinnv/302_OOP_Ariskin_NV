<?php

namespace AriskinNV\App;

function runTest()
{
    $file='Students.txt';
    $student1 = new Student('Nikolay1', 'Ariskin1', 'FMiIT', 3, 2);
    $student2 = new Student('Nikolay2', 'Ariskin2', 'FMiIT', 3, 2);
    $student3 = new Student('Nikolay3', 'Ariskin3', 'FMiIT', 3, 2);
    $student4 = new Student('Nikolay4', 'Ariskin4', 'FMiIT', 3, 2);
    $studentsList = new StudentsList();
    $studentsList->add($student1);
    $studentsList->add($student2);
    $studentsList->add($student3);
    $studentsList->add($student4);
    $studentsList->store($file);
    //$studentsList->load($file);
    //вывод информации об объекте с id=objectID:
    $objectID=4;
    echo $studentsList->get($objectID-1)->__toString();
}