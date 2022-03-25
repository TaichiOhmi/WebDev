<?php

    $server = "localhost";
    $username = "root";
    $pw = "root";
    $db = "blog";

    $conn = mysqli_connect($server, $username, $pw, $db);

    if(!$conn){
        die("ERROR CONNECTING: " . mysqli_connect_error());
    }
    // else{
    //     echo "You are successfully connected";
    // }

?>