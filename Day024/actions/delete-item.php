<?php
    include '../classes/Library.php';
    $obj = new Library;

    $item_id = $_GET['id'];

    $obj->destroy_book($item_id);
?>