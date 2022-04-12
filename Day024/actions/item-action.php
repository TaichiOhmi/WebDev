<?php
    include '../classes/Library.php';
    $obj = new Library;
    // print_r($_POST);

    $name = $_POST['book-name'];
    $genre = $_POST['book-genre'];
    $author = $_POST['book-author'];

    $obj->store_book($name, $genre, $author);
?>