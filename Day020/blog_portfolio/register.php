<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

    if(isset($_POST['btn_register'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $cnum = mysqli_real_escape_string($conn, $_POST['cnum']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM accounts where username = '$username'";
        $result  = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){ // If $result is 0, or < 1 If $result is less than 1,
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO accounts(`username`, `password`, `status`) VALUES ('$username', '$password', '$status')";

            if(mysqli_query($conn, $sql)){
                echo "record successfully added to accounts<br>";
                header('location: login.php');
            }else{
                echo "inserting record unsuccessful: " . mysqli_error($conn);
            }            


            $selectAccountID = "SELECT account_id FROM accounts ORDER BY account_id DESC LIMIT 1";
            $result = mysqli_query($conn, $selectAccountID);
            $account = mysqli_fetch_assoc($result);
            $account_id = $account['account_id'];
            
            $sql = "INSERT INTO users (`first_name`,`last_name`, `address`, `contact_number`, `account_id`) VALUES ('$fname', '$lname', '$address', '$cnum', $account_id)";
        
            if(mysqli_query($conn, $sql)){
                echo "record successfully added to users<br>";
            }else{
                echo "inserting record unsuccessful: " . mysqli_error($conn);
            }            
        
        }
        else{
            echo 'That username already exists.'; // else:
        }
        
    }
?>
<body class=" bg-info">
    <div class="container-fluid w-50 p-3 text-white">
        <h1 class="text-center">Registration</h1>
        <form method = "POST" action="#">
            <div class="row form-group mb-3">
                <div class="col-6">
                    <label for="Fname" class="form-label">First Name <span>*</span></label>
                    <input type="text" class="form-control border-bottom border-white" id="Fname" name="fname" required>
                </div>
                <div class="col-6">
                    <label for="Lname" class="form-label">Last Name <span>*</span></label>
                    <input type="text" class="form-control border-bottom border-white" id="Lname" name="lname" required>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control border-bottom border-white" id="address" name="address">
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="Cnum" class="form-label">Contact Number <span>*</span></label>
                    <input type="text" class="form-control border-bottom border-white" id="Cnum" name="cnum" required>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="username" class="form-label">Username <span>*</span></label>
                    <input type="text" class="form-control border-bottom border-white" id="Username" name="username" required>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="Password" class="form-label">Password <span>*</span></label>
                    <input type="password" class="form-control border-bottom border-white" id="PassWord" name="password" required>
                </div>
            </div>
            <div class="row form-group mb-5">
                <div class="col">
                    <label for="status" class="form-label">Status <span>*</span></label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="" hidden>Select Status</option>
                        <option value="U">User</option>
                        <option value="A">Admin</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type="submit" name="btn_register" class="btn btn-primary btn-block w-100">Register</button>
                </div>
                <div class="col-6 text-end">
                    <p class="small">Have an account?<a href="login.php">Sign in</a></p>
                </div>
            </div>
        </form>
    </div>


</body>
</html>