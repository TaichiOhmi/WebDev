<?php
    include '../classes/User.php';
    $obj = new User;

    $user_id = $obj->conn->real_escape_string($_GET['id']);
    $fname = $obj->conn->real_escape_string($_POST['user-fname']);
    $lname = $obj->conn->real_escape_string($_POST['user-lname']);
    $contact = $obj->conn->real_escape_string($_POST['user-contact']);
    $username = $obj->conn->real_escape_string($_POST['user-username']);
    $password = $obj->conn->real_escape_string($_POST['user-password']);
    $originalpassword = $_POST['original-password'];
    $newpassword = $obj->conn->real_escape_string($_POST['user-new-password']);
    $email = $obj->conn->real_escape_string($_POST['user-email']);

    if(password_verify($password, $originalpassword)){
        $obj->update_user($user_id, $fname, $lname, $contact, $username, $newpassword, $email);
    }
    else{
        echo '<h1>Incorrect password</h1>';
    }
?>