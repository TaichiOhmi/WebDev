<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Array</title>
</head>
<body>
<?php
     // 1D array
     
     //index
     $array = array('A', 'B', 'C', 'D', 'E');
     foreach($array as $value){
         echo $value . ' ';
     }

     echo '<br>';

     // associative
     $array = ['A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5];

    //  foreach($array as $key => $value){
    //      echo $array[$key] . ' ';
    //  }

    //  echo '<br>';

    //  foreach($array as $key){
    //     echo $key . ' ';
    // }

    //  echo '<br>';

     foreach($array as $key => $value){
         echo "$key => $value<br>";
     }


     echo '<hr>';

     //index 2D array
     $matrix = array(
         array(100,200),
         array(500,300),
         array(900,1000)
        );

     foreach($matrix as $row){
        foreach($row as $column){
            echo $column . ' ';
        }
        echo '<br>';
     }
     ?>

     <!-- table -->
     <table>
        <!-- <tr>
            <th>0</th><th>1</th>
        </tr> -->
        <?php
        foreach($matrix as $row){
            echo "<tr>\n";
            foreach($row as $data){
                echo "<td>".$data."\n";
            }
            echo "</tr>\n";
        }
        ?>
    </table>

    <?php

    //  foreach ($matrix as $row => $value) {
    //     echo $row.': '.$value[0].' '.$value[1].'<br>';
    // }
     

     echo '<hr>';

     //associative 2D array
     $attribute = array(
         'Type' => array('Type1' => 'fire', 'Type2' => 'water', 'Type3' => 'electric'),
         'Move'=> array('Move1'=>'ember', 'Move2'=>'bubble', 'Move3'=>'spark')
        );

     foreach($attribute as $key1=>$value1){
         echo $key1 . '<br>';
         foreach($value1 as $key2 => $value2){
            echo "$key2 => $value2<br>";
         }
         echo '<br>';
     }

    //  foreach($attribute as $key1){
    //      foreach($key1 as $key2 => $value){
    //         echo "$key2 => $value<br>";
    //      }
    //      echo '<br>';
    //  }
    ?>
</body>
</html>