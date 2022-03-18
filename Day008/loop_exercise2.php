<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Loop2</title>
</head>
<body>
    
    
    <form action="#" method="POST">
        <?php echo 'nested loop<br>'; ?>
        <label>enter row</label>
        <input type="number" id="row" name="row" placeholder="row" min="1">
        <label>enter column</label>
        <input type="text" id="column" name="column" placeholder="column">
        <input type="submit" value="GO" name="submit" >
    </form>
    <?php

        //nested loop
        if(isset($_POST['submit'])){

            $row = $_POST['row'];
            $column = $_POST['column'];

            echo "<table border='1'>";
            for ($i = 1; $i <= $row; $i++){
                echo '<tr>';
                for ($j = 1; $j <= $column; $j++){
                    echo '<td>' . $i * $j . '</td>';
            }
            echo '</tr>';
        }
            echo '</table>';

        }

        //----------
        //using while
        echo '<br><hr>';
        echo 'using while <br>';

        $i = 100;
        while($i >= 10){
            echo "$i |";
            $i -= 10;
        }
        
        //----------
        //using do while
        echo '<br><hr>';
        echo 'using do while <br>';

        $i=10;
        do{
            echo "$i |";
            $i += 10;
        }
        while($i <= 100);

    ?>
</body>
</html>