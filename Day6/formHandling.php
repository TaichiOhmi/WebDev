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

        <input type="submit" value="add" name="submit" >
    
    </form> 
    <?php
        function sum($a, $b){
            $sum = $a + $b;
            return $sum;
        }
        if(isset($_POST['submit'])){
            $x = $_POST['txtNum1'];
            $y = $_POST['txtNum2'];
            echo "$x + $y = " . sum($x, $y) . "<br>";


        }


        //bulit in / Pre-defined function / Internal
        $name = "Paul";
        $num = -900;
        // echo "<br>";
        // echo abs(700 * 42 -(100 * 2));
        // echo "<br>";
        // echo max(1000, 15000);
        // echo "<br>";
        // echo min(min(5000, 300), min(7000,15000));
        // echo "<br>";
        // echo strtolower($name);
        // echo "<br>";
        // echo strtoupper($name);
        // echo "<br>";


        //user defined function
        //arguments and parameters
        function get_Average($a, $b, $c){
            return (($a + $b + $c) / 3);
        }
        // get_Average(100, 500, 200);
        // get_Average(100, 500, 200);
        // get_Average(100, 500, 200);
        // get_Average(100, 500, 200);

        $ave = get_Average(100, 500, 200);
        // echo $ave;
        // echo "<br>";
        // echo max(get_Average(3000, 500, 200),get_Average(100, 4000, 200));

        //  function introduce($name, $age, $address){
        //     echo "Hi I am $name, $age years of age from $address<br>";
        //     get_Average(100, 60, $age);
          
        
        //  }    

        //  introduce("Paul", 34, "Legazpi City");
        //  introduce("Paul", 34, "Legazpi City");
        //  introduce("Paul", 34, "Legazpi City");
        //  introduce("Paul", 34, "Legazpi City");
        
        // if(isset($_POST['submit'])){
        //     $num1 = $_POST['txtNum1'];
        //     $num2 = $_POST['txtNum2'];


        //     echo $num1 + $num2;
        // }
            $A = 100;
            $B = 600;
            $C = 700;

        // get_Average($A, $B, $C);
        // get_Average(50, $_POST['txtNum2'], $_POST['txtNum1']);
        

    ?>
</body>
</html>