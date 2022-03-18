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

    $name = ["Tony", "Steve", "Peter", "Clint"];
    // echo $name[1];
    // $name[1] = "Sam";
    // echo "<br>";
    // echo $name[1];

    // $name[3] = $name[0];

    // echo $name[0];
    // echo $name[1];
    // echo $name[2];
    // echo $name[3];

    // foreach($name as $n){
    //     echo "$n <br>";
    // }

    // echo "<hr>";
    // $name[2] = 'Ned';
    // $name[0] = $name[3];

    // foreach($name as $n){
    //     echo "$n <br>";
    // }
    // for($i = 0; $i<count($name); $i++){
    //     echo $name[$i];
    // }
    // $person = ["name" => "Tony", "age" => 40, "gender" => "male"];
    // echo $person["name"];
    // $person["age"] = 35;

    $market = array(
        "round" => array("fruit1" => "Orange", "fruit2" =>"Grapes"),
        "yellow" => array("fruit3" => "Banana", "fruit4" =>"Mango")
    );

    foreach($market as $outerkey => $fruits){ 
        echo $outerkey .'<br>';

        foreach( $fruits as $innerkey => $value){
            echo $innerkey .', '. $value .', ';
        }
        
        echo '<hr>';
    }

    foreach($market['round'] as $fruit){
        echo $fruit . '<br>';
    }

    


?>





    
</body>
</html>