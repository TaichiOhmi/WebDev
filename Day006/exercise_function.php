<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Function</title>
</head>
<body>
    <form action="#" method="POST">
        <label>Convert feet to inches</label>
        <input type="number" id="txtNum" name="txtNum" placeholder="enter value for feet">
        <label>feet</label>
        <input type="submit" value="convert" name="submit" >
    </form>
    <?php
        function convertFeetToInches($feet){
            return  $feet * 12;
        }

        if(isset($_POST['submit'])){
            $feet = $_POST['txtNum'];
            $inches = convertFeetToInches($feet);
            echo "$feet ft is equivalent to $inches inches<br>";
        }

        // if(isset($_POST['submit'])){
        //     $feet = $_POST['txtNum'];
            
        //     echo "$feet ft is equivalent to ".convertFeetToInches($feet)."inches<br>";
        // }
    ?>
</body>
</html>