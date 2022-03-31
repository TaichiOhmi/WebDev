<?php    
    session_start();
    if(!isset($_SESSION['userAccount'])){
        header('location: login.php'); 
        //header function send a raw HTTP header.
        //header function must be called before all output.
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<?php
    require_once 'connection.php';

    if(isset($_GET['post_id'])){
        $post = $_GET['post_id'];
        $user = $_SESSION['userAccount'];
    }
    
    $sql = "SELECT posts.post_title as title, posts.post_message as post_message, posts.date_posted as date_posted, categories.category_name as category_name, accounts.username as username FROM posts INNER JOIN categories ON posts.category_id = categories.category_id INNER JOIN accounts ON posts.account_id = accounts.account_id WHERE posts.post_id = $post";
    $result = mysqli_query($conn, $sql);
    $postsInfo = mysqli_fetch_assoc($result);

?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-sm w-50 p-3 text-black">
        <div class="row">
            <!-- <div class="col"><h1>Profile of <span class="fst-italic fw-bold"><?php //$fullName ?></h1></span></div> -->
            <div class="col"><h1>Posts</h1></div>
        </div>
        <div class="row">
            <div class="col">Title: </div>
            <div class="col"><?php echo htmlspecialchars($postsInfo['title'], ENT_QUOTES); ?></div>
        </div>
        <div class="row">
            <div class="col">Message: </div>
            <div class="col"><?php echo htmlspecialchars($postsInfo['post_message'], ENT_QUOTES); ?></div>
        </div>
        <div class="row">
            <div class="col">Date Posted: </div>
            <div class="col"><?php echo $postsInfo['date_posted'] ?></div>
        </div>
        <div class="row">
            <div class="col">Category: </div>
            <div class="col"><?php echo htmlspecialchars($postsInfo['category_name'], ENT_QUOTES); ?></div>
        </div>
        <div class="row">
            <div class="col">User: </div>
            <div class="col"><?php echo htmlspecialchars($postsInfo['username'], ENT_QUOTES); ?></div>
        </div>    
    </div>
</body>
</html>