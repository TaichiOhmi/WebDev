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
    <title>Create New Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        span {
            color:red;
        }
    </style>
</head>
<?php
    ini_set("display_errors", "On");
    require_once('connection.php');

    if(isset($_POST['btn_newCate'])){
        $category = mysqli_real_escape_string($conn, strtoupper($_POST['category']));

        $sql = "SELECT * FROM categories WHERE category_name = '$category'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO categories(`category_name`) VALUES ('$category')";
            if(mysqli_query($conn, $sql)){
                header('location: posts.php');
            }
            else{
                echo "inserting record unsuccessful: " . mysqli_error($conn);
            } 
        }else{
        echo "That category already exists.";
        }
    }
?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-fluid w-50 p-3 text-black mb-5">
        <h1 class="text-center">Create New Category</h1>
        <form method = "POST" action="#" class="w-50 mt-5 mx-auto">
            <div class="row form-group mb-3">
                <div class="col">
                    <!-- <label for="category" class="form-label">New Category</label> -->
                    <input type="text" class="form-control border-bottom border-white" id="category" name="category" placeholder="Category" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <button type="submit" name="btn_newCate" class="btn btn-success btn-block w-100">Create New Category</button>
                </div>
            </div>
        </form>
        <div class="w-50 mt-5 mx-auto">
            <h3 class="mt-5">All Categories</h3>
            <table class="table table-borderless">
                
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT *  from categories";
                        $result = mysqli_query($conn, $sql);
    
                        if(mysqli_num_rows($result) ) {
                            $ctr = 1;
                            while($cate = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $ctr++; ?></th>
                            <td><?php echo htmlspecialchars(ucfirst(strtolower($cate['category_name'])), ENT_QUOTES); ?></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>