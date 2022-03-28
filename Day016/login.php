<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Log in</title>
</head>
<?php
    ini_set("display_errors", "On");
    require_once('connection.php');

    function Login($conn, $username, $password){
        $sql = "SELECT * FROM accounts where username = '$username'";
        $result  = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)){ // Gets the number of rows in the $result
            $useraccount = mysqli_fetch_assoc($result); // Fetches one row of data from the result set and returns it as an associative array. 
            if(password_verify($password, $useraccount['password'])){
                session_start();
                $_SESSION['userAccount'] = $useraccount['account_id'];
                //echo "<h1 class='h1 text-success'>You're successfully logged in!</h1>";
                header('location: profile.php');
            }
            else{
                echo 'incorrect password';
            }
        }
        else{
            echo 'username not found';
        }
    }

    if(isset($_POST['btn_log_in'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        Login($conn, $username, $password);
    }
?>
<body class=" bg-info">
    <div class="container-fluid w-50 p-3">
        <div class="text-white">
            <h1 class="text-center">Log in</h1>
            <form action="#" method="POST">
                <div class="row form-group mb-3">
                    <div class="col">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="username" required>
                    </div>
                </div>
                <div class="row form-group mb-5">
                    <div class="col">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PassWord" name="password" required>
                    </div>
                </div>
                <button type="submit" name="btn_log_in" class="btn btn-secondary btn-block w-100">Log in</button>
                <div class="text-end mt-3">
                    <a href="register.php" class="small">Create an acount</a>
                </div>
                </div>
            </form>
            
        </div>
        
        <!-- <div class="card w-50 mx-auto mt-5 p-0">
            <div class="card-header">
                <h1 class="card-title h3 mb-0">Log in</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row form-group mb-3">
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="Username" name="username" required>
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="PassWord" name="password" required>
                        </div>
                    </div>
                    <button type="submit" name="btn_log_in" class="btn btn-primary btn-block w-100">Log in</button>
                </form>
                <div class="text-end mt-3">
                    <a href="register.php" class="small">Create an acount</a>
                </div>
            </div>
        </div> -->
    </div>


</body>
</html>