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

    foreach($name as $n){
        echo "$n <br>";
    }
    for($i = 0; $i<count($name); $i++){
        echo $name[$i];
    }
    $person = ["name" => "Tony", "age" => 40, "gender" => "male"];
    echo $person["name"];
    $person['"age"] = 35;



?>





    
</body>
</html>