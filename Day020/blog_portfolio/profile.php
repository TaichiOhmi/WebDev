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

    if(isset($_GET['profile_id'])){
        $user = $_GET['profile_id'];
    }else{
        $user = $_SESSION['userAccount'];
    }

    if(isset($_POST['btn_uploadAvatar'])){
        $image_name = $_FILES['avatar']['name']; // image_name = name of the uploaded file
        $tmp_name = $_FILES['avatar']['tmp_name']; // tmp_name = temporary path of the uploaded file

        $uploadAvatar = "UPDATE users SET avatar = '$image_name' WHERE `user_id` = $user";

        if(mysqli_query($conn, $uploadAvatar)){
            $destination = "images/$image_name";
            if(move_uploaded_file($tmp_name, $destination)){
                header("Location: profile.php?profile_id=$user");
            }
            else{
                die('Error moving the photo.');
            }
        }
        else{
            die("Error uploading photo: " . mysqli_error($conn));
        }
    }
    
    $sql_userInfo = "SELECT * FROM users WHERE account_id = $user";
    $result = mysqli_query($conn, $sql_userInfo);
    $userInfo = mysqli_fetch_assoc($result);
    $fullName = $userInfo['first_name'] . ' ' . $userInfo['last_name'];



?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-sm w-75 text-black">
        <h1 class="mx-auto text-center mt-3">Profile <a href="update.php?<?="user=$user"; ?>"><i class="fa-solid fa-pencil text-warning"></i></a></h1>
        <div class="row">
            <div class="col-8 py-5">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr class="fs-4">
                            <th scope="col">Name</th>
                            <td><?php echo htmlspecialchars($fullName , ENT_QUOTES);?></td>
                        </tr>
                        <tr class="fs-4">
                            <th scope="col">Address</th>
                            <td><?php echo htmlspecialchars($userInfo['address'], ENT_QUOTES); ?></td>                
                        </tr>
                        <tr class="fs-4">
                            <th scope="col">Contact</th>
                            <td><?php echo htmlspecialchars($userInfo['contact_number'], ENT_QUOTES); ?></td>
                        </tr>
                        <tr></tr>
                        <tr class="fs-4">
                            <th scope='col'>Biography</th>
                            <td><?php echo htmlspecialchars($userInfo['bio'], ENT_QUOTES); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4 p-5">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <label for="avatar" class="form-label">Avatar: </label>
                <?php if($userInfo['avatar']){ ?>
                    <img src="images/<?= $userInfo['avatar'] ?>" alt="Profile Avatar" class="img-fluid img-thumbnail mx-auto my-auto d-block" style="height: auto;">
                <?php }?>
                    <div class="input-group mb-2">
                        <input type="file" name="avatar" id="avatar" class="form-control" aria-describedby="avatar" aria-label="Upload" required>
                        <button class="btn btn-secondary" type="submit" name="btn_uploadAvatar" id="avatar">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row my-3 mx-auto">
            <div class="table-responsive">
                <table class="table table-borderless align-middle">
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
                            $sql_userPost = "SELECT posts.post_id, posts.post_title, posts.post_message, posts.date_posted, posts.account_id, categories.category_name  from posts INNER JOIN categories ON posts.category_id = categories.category_id WHERE posts.account_id = $user";
    
                            $result = mysqli_query($conn, $sql_userPost);
    
                            if(mysqli_num_rows($result) >  0) {
                                $ctr = 1;
                                while($post = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $ctr++; ?></th>
                                <td><?php echo htmlspecialchars($post['post_title'], ENT_QUOTES); ?></td>
                                <td><?php echo htmlspecialchars($post['post_message'], ENT_QUOTES); ?></td>
                                <td><?php echo $post['date_posted']; ?></td>
                                <td><?php echo htmlspecialchars(ucfirst(strtolower($post['category_name'])), ENT_QUOTES); ?></td>
                                <td><a href="postselect.php?post_id=<?php echo $post['post_id']; ?> "><i class="fa-solid fa-eye text-primary"></i></a></td>
                                <td>
                                    <a href="postDelete.php?post_id=<?php echo $post['post_id']?> " onclick="return  confirm('do you want to delete')"><i class="fa-solid fa-trash-can text-danger"></i></a>
                                </td>
                                <td><a href="postEdit.php?post_id=<?php echo $post['post_id']; ?> "><i class="fa-solid fa-pencil text-warning"></i></a></td>
                            </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>