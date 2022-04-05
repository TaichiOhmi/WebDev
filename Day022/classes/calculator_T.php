<?php 
 
 class Calculator{
    private $num1;
    private $num2;
    private $operator;


    function set_values($num1,$num2,$operator){
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;

    }

    function get_calculation(){

        if($this->operator == 'addition'){
            return $this->num1+ $this->num2;

        }elseif($this->operator == 'subtraction'){
            return $this->num1 - $this->num2;
        }
        elseif($this->operator == 'multiplication'){
            return $this->num1 * $this->num2;

        }
        else{
            return $this->num1 / $this->num2;
        }

    }


 }








?>
