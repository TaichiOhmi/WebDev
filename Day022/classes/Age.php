<?php

    class Age{

        // properties
        private $firstName;
        private $lastName;
        private $birthYear;
        private $currentYear;

        // methods
        // getters
        public function get_fname(){
            return $this->firstName;
        }

        public function get_lname(){
            return $this->lastName;
        }

        public function get_age(){
            // $age = $this->currentYear - $this->birthYear;
            // return $age;
            return $this->currentYear - $this -> birthYear;
        }

        // setter
        public function set_data($first, $last, $byear, $cyear){
            $this->firstName = $first;
            $this->lastName = $last;
            $this->birthYear = $byear;
            $this->currentYear = $cyear;
        }

    }

?>