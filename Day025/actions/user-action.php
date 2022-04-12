<?php
    include '../classes/User.php';
    $obj = new User;
    // print_r($_POST);

    $fname = $obj->conn->real_escape_string($_POST['user-fname']);
    $lname = $obj->conn->real_escape_string($_POST['user-lname']);
    $contact =$obj->conn->real_escape_string( $_POST['user-contact']);
    $username = $obj->conn->real_escape_string($_POST['user-username']);
    $password = $obj->conn->real_escape_string($_POST['user-password']);
    $email = $obj->conn->real_escape_string($_POST['user-email']);

    $obj->store_user($fname, $lname, $contact, $username, $password, $email);
?>