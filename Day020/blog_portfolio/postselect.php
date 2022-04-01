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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="container-sm w-50  text-black mt-5">
        <div class="card my-auto mx-auto w-50 ">
            <div class="card-body">
                <div class="card-title fw-bold fs-2"><?= htmlspecialchars($postsInfo['title'], ENT_QUOTES); ?></div>
                <div class="card-subtitle mb-2 text-muted text-end">Posted by <?= htmlspecialchars($postsInfo['username'], ENT_QUOTES); ?></div>
                <br>
                <p class="card-text"><?= htmlspecialchars($postsInfo['post_message'], ENT_QUOTES); ?></p>
                <br>
                <div class="row">
                    <div class="col-7">Category: <?= htmlspecialchars($postsInfo['category_name'], ENT_QUOTES); ?></div>
                    <div class="col"><p class="card-text text-end"><?= $postsInfo['date_posted'] ?></span></p></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>