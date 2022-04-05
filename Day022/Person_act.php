<?php 


class Person{
    private $name;
    private $lastname;
    private $birthyear;
    private $year;



    function giveValues($name,$Lastname,$birthyear,$year){
        $this->name = $name;
        $this->lastname = $Lastname;
        $this->birthyear = $birthyear;
        $this->year = $year;

    }

    function calculateAge(){
        $age = $this->year - $this->birthyear;
        // return $this->year = $this->birthyear;

        return $age;

    }

    function getName(){
        return $this->name;
    }
    function getLastName(){
        return $this->lastname;
    }
  
}

?>