<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Loop</title>
</head>
<body>
    <form action="#" method="POST">
        <label>enter number</label>
        <input type="number" id="txtNum" name="txtNum" placeholder="n" min="1">
        <label>enter word</label>
        <input type="text" id="txtWord" name="txtWord" placeholder="word">
        <input type="submit" value="GO" name="submit" >
    </form>
    <?php
        // for
        if(isset($_POST['submit'])){
            $num = $_POST['txtNum'];
            $word = $_POST['txtWord'];
            for($i=0; $i<$num; $i++){
                echo $word . "<br>";
            }
        }
        
        // while
        // if(isset($_POST['submit'])){
        //     $i=0; 
        //     while($i < $_POST['txtNum']){
        //         echo $_POST['txtWord'] . "<br>";
        //         $i++;
        //     }
        // }
        
        // do while
        // if(isset($_POST['submit'])){
        //     $num = $_POST['txtNum'];
        //     $i=0; 
        //     do{
        //         echo $_POST['txtWord'] . "<br>";
        //         $i++;
        //     }
        //     while($i < $num);
        // }

    ?>
</body>
</html>