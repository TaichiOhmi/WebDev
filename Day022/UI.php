<?php

    // goal: to display public $name = 'Grapes' in this UI File.

    #1: merge the 2 files UI file and Class File
    include 'classes/Fruit.php';

    #2: create an Object:
        #what is an object?? an object is a copy of your Class, and also serves as a bridge to use the methods and properties inside your class.

        #A CLASS WITHOUT OBJECT IS USELESS

        #HOW TO CREATE AN OBJECT?? SYNTAX: $varName = new $className
        $fruitObj = new Fruit;

        #UI -> OBJECT -> CLASS

        $fruitname = 'Banana';
        $fruitcolor = 'Yellow';
        $fruitsize = 'Medium';
        $fruitObj -> set_data($fruitname, $fruitcolor, $fruitsize);

        //$fruitObj -> set_data('Apple', 'Red', 'Big');

        //echo $fruitObj -> name;
        //echo $fruitObj -> color; // this is not displayed/error because color property is private.
        //echo $fruitObj -> size; // this is also not displayed/error for the same reason.
        echo 'Fruit Name: ' . $fruitObj -> get_name();
        echo '<br>';
        echo 'Fruit Color: ' . $fruitObj -> get_color();
        echo '<br>';
        echo 'Fruit Size: ' . $fruitObj -> get_size();

        echo '<hr>';

        $obj = new Fruit();
        $obj -> set_data('Orange', 'Orange', 'Big');
        echo 'Fruit Name: ' . $obj -> get_name();
        echo '<br>';
        echo 'Fruit Color: ' . $obj -> get_color();
        echo '<br>';
        echo 'Fruit Size: ' . $obj -> get_size();


?>