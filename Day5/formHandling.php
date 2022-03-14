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
        <label >num1</label><input type="number" id="txtNum1" name="txtNum1" placeholder="1st number">
        <label >num2</label><input type="number" id="txtNum2" name="txtNum2" placeholder="2nd number">
        <input type="submit" value="add" >
    
    </form> 
    <?php

        
        if(isset($_POST['txtNum1'])){
            $num1 = $_POST['txtNum1'];
            $num2 = $_POST['txtNum2'];


            echo $num1 + $num2;
        }
    ?>
</body>
</html>