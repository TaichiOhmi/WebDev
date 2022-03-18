<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>1. 1D index/associative array</h3>
    <?php
        $movies = array("Spider-man: No Way Home", "Avengers: End Game", "Captain America: Civil War", "Shang Chi", "Black Panther");
                
        echo "<ul>";
        echo "<b>Movies</b>";
            foreach($movies as $movie){
                    echo "<li>" . $movie . "</li>";
            }
        echo "</ul>";
        
        $Heroes = array("hero1"=>"Spider-man", "hero2"=> "Iron Man", "hero3"=>"Captain America",  "hero4"=>"Shang Chi",  "hero5"=>"Black Panther");    
        echo "<ul>";
        echo "<b>Heroes</b>";
            foreach($Heroes as $Hero){
                    echo "<li>" . $Hero . "</li>";
            }
        echo "</ul>";
   
   ?>
    <hr>
    <h3>2. 2D index array</h3>

    <?php       
        $listOfNumbers = array(array(100, 200),array(500, 300),array(900, 1000));
    
        echo "<table border='1'>";
        foreach($listOfNumbers as $row){
            echo "<tr>";
            foreach($row as $column){
                echo "<td>$column</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo $listOfNumbers[1][1] . "<br>" . $listOfNumbers[2][0] ;
    ?>
    <hr>
    <h3>3. 2D Associative array</h3>
    <?php
        $attributes = array(
            "Types" =>array("type1" => "Fire", "type2"=>"Water", "type3"=>"Electric"),
            "Moves" =>array("move1"=>"ember", "move2"=>"bubble","move3"=>"spark")
        );

        foreach($attributes as $attribute){
            foreach($attribute as $value){
                echo "$value <br>";
            }

        }
        $n = 1;
        foreach($attributes['Types'] as $type ){
            echo "Type $n => $type<br>";
            $n++;
        }
        $n = 1;
        foreach($attributes['Moves'] as $move ){
            echo "Move $n => $move<br>";
            $n++;
        }

        foreach($attributes as $out_key => $out_value){
            $n = 1;
            foreach($out_value as $inner_key=>$inner_value){
                if($out_key == 'Types')//checks if the row is the 'Type' key
                    echo "Type $n=>" . $inner_value . "<br>";
                else{
                    
                    echo "Move $n=>" . $inner_value . "<br>"; 
                } 
                $n++;   
            }

        }










    ?>




</body>
</html>