<?php

$pw = password_hash("p@XXw0rD",PASSWORD_DEFAULT);
$user = "Admin";

if(isset($_POST['submit'])){
    if(password_verify($pw, $_POST['pw']) || $user == $_POST['UName']){
        echo "You successfully logged in";
        session_start();
        $_SESSION['user'] =  $_POST['UName'];
    }else{
        echo "invalid user name or password";
    }




}







?>