<?php

    class Calculator{

        private $fnum;
        private $snum;
        private $method;

        public function calculate(){
            if ($this->method == 'add'){
                $result = $this->fnum + $this->snum;
            }
            else if ($this->method == 'sub'){
                $result = $this->fnum - $this->snum;
            }
            else if ($this->method == 'mul'){
                $result = $this->fnum * $this->snum;
            }
            // else if ($this->method == 'div'){
            else{
                $result = $this->fnum / $this->snum;
            }
            return $result;
        }

        public function set_data($fnum, $snum, $method){
            $this->fnum = $fnum;
            $this->snum = $snum;
            $this->method = $method;
        }

    }

?>