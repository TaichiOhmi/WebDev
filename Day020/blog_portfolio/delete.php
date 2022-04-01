<?php

session_start();
if(!isset($_SESSION['userAccount'])){
    header("Location: login.php");
    exit;
 }

 require_once ('connection.php');

if(isset($_GET['account'])){
    $user = $_GET['user'];
    $accnt = $_GET['account'];
    $del_user = "DELETE FROM users WHERE `user_id` = $user";
    $del_accnt = "DELETE FROM accounts WHERE account_id = $accnt";
    mysqli_query($conn, $del_user);
    mysqli_query($conn, $del_accnt);
    header("Location: users.php");
    exit;
}


?>