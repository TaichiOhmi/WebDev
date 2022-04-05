<?php

    class Fruit{

        private $name;
        private $color;
        private $size;

        #create a method/function to display private property

        // public は省略できる。省略した場合は publicになる

        public function get_name(){
            return $this -> name;
        }

        public function get_color(){
            #this -> is a way of using any methods or properties inside the class
            #you can only use one return per method/function.
            return $this -> color; //color に $ はいらない。
        }

        public function get_size(){
            return $this -> size;
        }

        // parameters are temporary placeholder of data. ($fnama, $fcolor, $fsize)
        public function set_data($fname, $fcolor, $fsize){
            $this -> name = $fname;
            $this -> color = $fcolor;
            $this -> size = $fsize;
        }

    }

?>