<?php
    include '../classes/Library.php';
    $obj = new Library;

    $item_id = $_GET['id'];
    $name = $_POST['book-name'];
    $genre = $_POST['book-genre'];
    $author = $_POST['book-author'];

    $obj->update_book($item_id, $name, $genre, $author);
?>