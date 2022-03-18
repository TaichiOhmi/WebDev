<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Array</title>
</head>
<body>

    <!-- 1D array -->
    <h3>1. 1D Array</h3>
    <?php     
     //index
     $array = array('A', 'B', 'C', 'D', 'E');
     echo "<ul>";
     foreach($array as $value){
         echo "<li>$value</li>";
     }

     echo '</ul>';

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

    echo "<ul>";
     foreach($array as $key => $value){
         echo "<li>$key => $value</li>";
     }
     echo "</ul>";


     echo '<hr>';
    ?>

    <!-- index 2D array -->
    <h3>2. index 2D Array</h3>

    <?php
     $matrix = array(
         array(100,200),
         array(500,300),
         array(900,1000)
        );

     foreach($matrix as $row){
        foreach($row as $data){
            echo $data . ' ';
        }
        echo '<br>';
     }
     ?>

     <!-- table -->
     <table border="1">
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

    ?>
        

    <!-- associative 2D array 1 -->
    <h3>3. associative 2D Array</h3>
    <?php
    $attribute = array(
         'Type' => array('Type1' => 'fire', 'Type2' => 'water', 'Type3' => 'electric'),
         'Move' => array('Move1'=>'ember', 'Move2'=>'bubble', 'Move3'=>'spark')
        );

    //associative 2D array 2
    $attribute = array();
    $attribute['Type'] = array('Type1' => 'fire', 'Type2' => 'water', 'Type3' => 'electric');
    $attribute['Move'] = array('Move1'=>'ember', 'Move2'=>'bubble', 'Move3'=>'spark');

     foreach($attribute as $keys => $values){
         echo $keys . '<br>';
         foreach($values as $key => $value){
            echo "$key => $value<br>";
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

<!-- 
List of anything, with a size of 5 using 1D array(index / associative) , display array using foreach.

make array for the table below using index 2D array , display array using foreach.

make array for the lists below using associative 2D array, display array using foreach. 
-->