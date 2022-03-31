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
        <title>Posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<?php
    require_once 'connection.php';
    $user = $_SESSION['userAccount'];
?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-sm w-50 p-3 text-black">
        <div class="header">
            <h1> Posts</h1>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT posts.post_title, posts.post_message, posts.date_posted, categories.category_name  from posts INNER JOIN categories ON posts.category_id = categories.category_id";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) >  0) {
                        $ctr = 1;
                        while($post = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <th scope="row"><?php echo $ctr++; ?></th>
                        <td><?php echo $post['post_title'] ?></td>
                        <td><?php echo $post['post_message']; ?></td>
                        <td><?php echo $post['date_posted']; ?></td>
                        <td><?php echo $post['category_name']; ?></td>
                        <td><a href="postselect.php?post_id=<?php echo $post['post_id']; ?> "><i class="fa-solid fa-eye text-primary"></i></a></td>
                        <td>
                            <a href="postEdit.php?post_id=<?php echo $users['post_id'] . "&user=" . $user; ?> " onclick="return  confirm('do you want to delete')"><i class="fa-solid fa-trash-can text-danger"></i></a>
                        </td>
                        <td><a href="postEdit.php?post_id=<?php echo $post['post_id']; ?> "><i class="fa-solid fa-pencil text-warning"></i></a></td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>


        <div class="row my-3">
            <div class="col text-end">
                <a href="createNewPost.php?user_id=<?= $user; ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Create New Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <a href="sections.php" class="btn btn-light ms-2"><i class="fas fa-plus-circle"></i> Create New Category</a>
            </div>            
        </div>

    </div>
</body>
</html>