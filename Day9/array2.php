<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php

            $number = array(array(1,2,3),array(4,5,6),array(7,8,9));

            echo $number[1][2]; //display value 6
            echo $number[2][0];//dispplay value 7


            $person = array("name" => array('Tony', 'peter', 'Clint'), "age" =>array(40,17,30));

            echo $person['name'][2]; //display value Clint
            echo $person['age'][1]; //display value 17

            // echo $number[1][1];

            // echo $person['name'][1];
            // $person['age'][0] = 40;

            foreach($number as $x){
                foreach($x as $y){
                    echo $y;
                }
                echo "<br>";
            }

            foreach($person as $p){
                foreach($p as $r){
                    echo "[" . $r . "]";
                }
                echo "<br>";
            }

            $car =array(
                'brand'=>array('brand1'=>'toyota', 'brand2'=>'Mitsubishi', 'brand3'=>'Honda'), 
                'Model'=>array('model1'=>'vios','model2'=>'mirage','model3'=>'civic'));


            echo $car['Model']['model2'];
            echo "<br>";
            echo $car['brand']['brand3'];
            echo "<hr>";
            
            foreach($car['Model'] as $model){
                echo $model . "<br>";
            }


        ?>








</body>
</html>