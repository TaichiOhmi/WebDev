<?php

    $server = "localhost";
    $username = "root";
    $pw = "";
    $dbase = "myDB";

    $conn = mysqli_connect($server, $username, $pw, $dbase);

    if(!$conn){
        die("ERROR CONNECTING: " . mysqli_connect_error());
    }
    // else{
    //     echo "You are successfully connected";
    // }



?>