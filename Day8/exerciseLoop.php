
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
        <label>enter number</label>
        <input type="number" name="txtNum" placeholder = "n">
        <label>enter word</label>
        <input type="text" name="txtWord" placeholder = "word">
        <input type="submit" name="submit" value = "GO">

    </form>
    <?php
        if(isset($_POST['submit'])){
            $num = $_POST['txtNum'];
            $word = $_POST['txtWord'];
            for($i = 1; $i <= $num; $i++){
                     echo "$word<br>";
                 }


            // for($i = $min; $i <= $max; $i++){
            //     echo "Number $i<br>";
            // }
            // for($j=0; $j < 10; $j++){
            //     if($j > 5){
            //         echo "$j is greater than 5<br>";
            //     }
            //     else if($j < 5){
            //         echo "$j is lesser than 5<br>";
            //     }
            //     else{
            //         echo "this is $j<br>";
            //     }
            // }
            // for($i = 2; $i <= 20; $i += 2){
            //     echo "Number $i<br>";
            // }
            // //nested loop
            
            // for(){
            //     for(){

            //     }

            // }









        }
    
    
    
    
    
    ?>











    <!-- <ul>
        <?php
            // for($j = 1; $j < 25; $j++){
            //     echo "<li>item $j </li>";
            // } 
        ?>
    </ul>
     -->
    <?php
    
    // $ctr = 5;
    // while($ctr > 0){
        
    //     echo $ctr . "using while <br>";
    //     $ctr--;
    // }
    // echo "<hr>";
    // $ctr1 = 0;
    // do{
    //     echo "using do while!";
    //     $ctr1++;
    // }
    // while($ctr1 < 5);
    // echo "<hr>";

    // for($i = 20; $i > 0; $i--){
    //     echo "[ $i ]";
    // }
    
    
    
    // echo "Thank you!";




    ?>
</body>
</html>