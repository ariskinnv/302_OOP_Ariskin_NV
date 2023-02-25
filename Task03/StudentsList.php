<?php

namespace AriskinNV\App;

class StudentsList
{
    private $students = array();
    private static $studentsN = 0;

    public function add(Student $student)
    {
        $this->students[self::$studentsN++] = clone $student;
    }

    public function count()
    {
        return self::$studentsN;
    }

    public function get($n)
    {
        return (($n >= 0 and $n < self::$studentsN) ? $this->students[$n] : $this->students[self::$studentsN - 1] );
    }

    public function store($fileName)
    {
        $Fout = fopen($fileName, 'a');
        foreach ($this->students as $Student)
            fwrite($Fout, $Student->ID . '^' . $Student->getName() . '^' . $Student->getLastName() . '^' . $Student->getFaculty() . '^' . $Student->getCourse() . '^' . $Student->getGroup() . '^\r\n');
        fclose($Fout);
    }

    public function load($fileName)
    {
        if (!file_exists($fileName))
        {
            echo 'Файл с таким именем не существует';
            return false;
        }

        $Student = new Student();
        $Student->setId(1);
        $students = array();
        $Index_Array = 0;
        $Fin = fopen($fileName, 'r');
        while($InfoStudent = fgets($Fin))
        {
            $IndexAttribute = 1;
            $String = '';
            for ($i = 0; $i < strlen($InfoStudent);)
            {
                $Char = $InfoStudent[$i++];
                if ($Char == '^' and $String)
                {
                    $Student = $this->setAttributeStudent($Student, $String, $IndexAttribute++);
                    $String = '';
                }
                else
                    $String .= $Char;
            }
            $students[$Index_Array++] = clone $Student;
            $Student = new Student();
        }
        fclose($Fin);
        $this->students = $students;
        return true;
    }

    private function setAttributeStudent(Student $Student, $Value, $Index)
    {
        switch($Index)
        {
            case 1:
                $Student->ID = (int) $Value;
                return $Student;
            case 2:
                $Student->setName($Value);
                return $Student;
            case 3:
                $Student->setLastName($Value);
                return $Student;
            case 4:
                $Student->setFaculty($Value);
                return $Student;
            case 5:
                $Student->setCourse($Value);
                return $Student;
            case 6:
                $Student->setGroup($Value);
                return $Student;
        }
        return $Student;
    }
}
