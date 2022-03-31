<?php    
    session_start();
    if(!isset($_SESSION['userAccount'])){
        header('location: login.php'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>User Profile</title>
</head>
    <?php 
    require_once ('connection.php');
    
    $user = $_GET['user'];
    $post_id = $_GET['post_id'];
    $sql = "SELECT posts.post_title, posts.post_message, categories.category_name  from posts INNER JOIN categories ON posts.category_id = categories.category_id WHERE posts.post_id = $post_id";
    $result = mysqli_query($conn, $sql);
    $postInfo = mysqli_fetch_assoc($result);

    ?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-fluid w-50 p-3 text-white">
        <h1 class="text-center">Create New Post</h1>
        <form method = "POST" action="#">
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control border-bottom border-white" id="title" name="title" value="<?= $postInfo['post_title']  ?>" required focus>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" rows="6" class="form-control mb-2" required><?= $postInfo['post_message']  ?></textarea>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="" hidden>Select Category</option>
                    <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);
                    
                        while($category = mysqli_fetch_assoc($result)){
                            if($category['category_name'] == $postInfo['category_name']){
                    ?>
                        <option value="<?= $category['category_id'] ?>" selected><?= htmlspecialchars($category['category_name'], ENT_QUOTES); ?></option>
                    <?php   }
                            else{
                    ?>
                        <option value="<?= $category['category_id'] ?>"><?= htmlspecialchars($category['category_name'], ENT_QUOTES); ?></option>
                    <?php
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <button type="submit" name="btn_editPost" class="btn btn-success btn-block w-100">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</body>
    <?php
    require_once 'functions.php';

    if(isset($_POST['btn_editPost'])){

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        $editPost= "UPDATE posts SET post_title='$title', `post_message`='$message', `category_id`=$category WHERE `post_id` = $post_id";
    
        if (mysqli_query($conn, $editPost))  {
            header("Location: posts.php");
            exit;
        }
        else{
            echo 'Failed to edit post: '. mysqli_error($conn);
        }
        
    }
    ?>
   

</body>
</html>