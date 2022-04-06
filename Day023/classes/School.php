<?php

    class School{
        private $name;
        private $ylevel;
        private $units;
        private $labofee;
        
        // setter
        public function set_data($name, $ylevel, $units, $labofee){
            $this->name = $name;
            $this->ylevel = $ylevel;
            $this->units = $units;
            $this->labofee = $labofee;
        }

        // getters
        public function get_name(){
            return $this->name;
        }

        public function calculate(){

            // first
            if ($this->ylevel == "1"){
                $result = 550 * $this->units;
                if ($this->labofee == 'yes'){ // with lab
                    $result += 3359;
                }
            }
            // second
            else if ($this->ylevel == "2"){
                $result = 630 * $this->units;
                if ($this->labofee == 'yes'){ // with lab
                    $result += 4000;
                }
            }
            // third
            else if ($this->ylevel == "3"){
                $result = 470 * $this->units;
                if ($this->labofee == 'yes'){ // with lab
                    $result += 2890;
                }
            }
            // forth
            else{// else if ($this->ylevel == "4"){
                $result = 501 * $this->units;
                if ($this->labofee == 'yes'){ // with lab
                    $result += 3555;
                }
            }
            return $result;
        }

    }

?>
<!-- 

School instructions: 

    Unit price per year:
        First year - 550
        Second year - 630
        Third year - 470
        Four year - 501

    Lab price per year
        First year - 3359
        Second year - 4000
        Third year - 2890
        Fourth year - 3555

(unit * unit_price) + lab price

 -->