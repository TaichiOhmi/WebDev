<?php
include 'classes/Fruit.php';
$fruitObj = new Fruit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Fruit name: 
        <input type="text" name="fruit-name" id=""><br>
        Fruit color: 
        <input type="text" name="fruit-color" id=""><br>
        Fruit size: 
        <input type="text" name="fruit-size" id=""><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $fruitname = $_POST['fruit-name'];
            $fruitcolor = $_POST['fruit-color'];
            $fruitsize = $_POST['fruit-size'];

            $fruitObj -> set_data($fruitname, $fruitcolor, $fruitsize);
            echo "Fruit Name: " . $fruitObj -> get_name();
            echo "<br>";
            echo "Fruit Color: " . $fruitObj -> get_color();
            echo "<br>";
            echo "Fruit Size: " . $fruitObj -> get_size();
        }
    ?>
</body>
</html>