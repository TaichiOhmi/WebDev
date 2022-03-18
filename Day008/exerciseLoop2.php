<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        nested loop<br>
        <label>enter row</label>
        <input type="number" name="txtrow" placeholder = "row">
        <label>enter column</label>
        <input type="text" name="txtcol" placeholder = "column">
        <input type="submit" name="submit" value = "GO">

    </form>
   
   
   <?php

        


        if(isset($_POST['submit'])){
        $row = $_POST['txtrow'];
        $col = $_POST['txtcol'];
       echo "<table border='1'>"; 
        for($x = 1; $x <= $row; $x++){
            echo "<tr>";
                for($y = 1; $y <= $col; $y++){
                    echo "<td>". $x * $y . "</td>";
                }
            echo "</tr>";
       }}
       echo "</table>";
    
    echo "<br><hr>using while<br>";
    $n = 100;
    while($n > 0){
        echo "$n |";
        $n-=10;
    }
    
    echo "<hr>using do while<br>";
    do{
        $n+=10;
        echo "$n |";
        
    }
    while($n < 100);
    
    
    
    
    ?>


</body>
</html>