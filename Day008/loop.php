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

        echo "<table border='5'>";
        for ($i=1; $i<=5; $i++){
            echo "<tr>";
            for ($j=0; $j<=5; $j++){
                echo "<td>".$i*$j."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        for ($i=1; $i<=5; $i++){
            echo "<ul>";
            for ($j=0; $j<=5; $j++){
                echo "<li>A</li>";
            }
            echo "</ul>";
        }

    ?>
</body>
</html>