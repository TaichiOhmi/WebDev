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
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        span {
            color:red;
        }
    </style>
</head>
<?php
    ini_set("display_errors", "On");
    require_once('connection.php');

    if(isset($_POST['btn_newPost'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $category = $_POST['category'];
        $date = date('Y-m-d H:i:s');
        $user = $_SESSION['userAccount'];

        $sql = "INSERT INTO posts(`post_title`, `date_posted`, `category_id`, `post_message`, `account_id`) VALUES ('$title', '$date', $category, '$message', $user)";

        if(mysqli_query($conn, $sql)){
            header('location: posts.php');
        }else{
            echo "inserting record unsuccessful: " . mysqli_error($conn);
        }
    }
?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-fluid w-50 p-3 text-white">
        <h1 class="text-center">Create New Post</h1>
        <form method = "POST" action="#">
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="title" class="form-label">Title <span>*</span></label>
                    <input type="text" class="form-control border-bottom border-white" id="title" name="title" placeholder="Title" required focus>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="message" class="form-label">Message <span>*</span></label>
                    <textarea name="message" id="message" rows="6" class="form-control mb-2" placeholder="Message" required></textarea>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col">
                    <label for="category" class="form-label">Category <span>*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="" hidden>Select Category</option>
                    <?php
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($category = mysqli_fetch_assoc($result)){
                    ?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                    <?php
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <button type="submit" name="btn_newPost" class="btn btn-success btn-block w-100">Post</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>