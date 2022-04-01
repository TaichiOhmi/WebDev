<?php

session_start();
if(!isset($_SESSION['userAccount'])){
    header("Location: login.php");
    exit;
 }

 require_once ('connection.php');

if(isset($_GET['category_id'])){
    $cid = $_GET['category_id'];
    $del_cate = "DELETE FROM categories WHERE `category_id` = $cid";
    mysqli_query($conn, $del_cate);
    header("Location: createNewcategory.php");
    exit;
}
else{
    echo mysqli_error();
}


?>