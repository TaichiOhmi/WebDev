<?php

session_start();
if(!isset($_SESSION['userAccount'])){
    header("Location: login.php");
    exit;
 }

 require_once ('connection.php');

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $delPost = "DELETE FROM posts WHERE `post_id` = $post_id";
    if(mysqli_query($conn, $delPost)){
        header("Location: posts.php");
        exit;
    }
    else{
        echo 'error: ' . mysqli_error($conn);
    }
}


?>