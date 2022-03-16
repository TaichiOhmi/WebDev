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
        for($x = 0; $x < 5; $x++){
             for($y = 1; $y <= 5; $y++){
                echo $y;
             }
             echo "<br>";
        }
        echo "<table border='1'>";

        for($x = 1; $x <= 10; $x++){
            echo "<tr>";
                for($y = 1; $y <= 10; $y++){
                    echo "<td>". $x * $y . "</td>";
                }
            echo "</tr>";
       }
       echo "</table>";

       for($i = 0; $i < 3; $i++){
           echo "<ul>";
            for($j = 0; $j < 5; $j++){
                echo "<li>item of the list</li>"; 
            }
            echo "</ul>";
       }
       $i = 0;
       while($i<5){
           $j = 0;
            while($j < 5){
                echo $j;
                $j++;
            }
            echo "<br>";
            $i++;
       }



    ?>









</body>
</html>