<?php
    include '../classes/User.php';
    $obj = new User;

    $user_id = $obj->conn->real_escape_string($_GET['id']);

    $obj->destroy_user($user_id);
?>