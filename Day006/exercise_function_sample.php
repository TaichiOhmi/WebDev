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
        <label >Convert feet to inches</label> <input type="number" id="txtFeet" name="txtFeet" placeholder="enter value for feet"> feet
        <input type="submit" value="convert" name="submit" >
    
    </form> 
    <?php
        function toInches($feet){   
            return $feet * 12;
        }
        if(isset($_POST['submit'])){
            $x = $_POST['txtFeet'];
        
            echo "$x ft is equivalent to " . toInches($x) . " inches<br>";
        }


    ?>
</body>
</html>