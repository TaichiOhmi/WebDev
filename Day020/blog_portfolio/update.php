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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Profile</title>
</head>
    <?php 

    require_once ('connection.php');
    
    $user = $_GET['user'];
    $sql = "SELECT * FROM users WHERE account_id = $user";
    $result = mysqli_query($conn, $sql);
    $user_profile = mysqli_fetch_assoc($result);

    if(isset($_POST['update'])){

        $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $cnum = mysqli_real_escape_string($conn, $_POST['cnum']);
        $bio = mysqli_real_escape_string($conn, $_POST['bio']);
        
        $update_user = "UPDATE users SET first_name='$fname', last_name='$lname', address='$address', contact_number='$cnum', bio='$bio' WHERE `user_id` = $user";
       
        if (mysqli_query($conn, $update_user))  {
            if(!isset($_POST['avatar'])){
                header("Location: users.php");
                exit;  
            }
        }
        else{
            echo 'Failed to edit profile: '. mysqli_error($conn);
        }
    }

    ?>
<body class=" bg-info">
    <?php include 'navbar.php'; ?>
    <div class="container-fluid w-50 p-3 text-white">
        <h1 class="text-center">Update Profile</h1>
        <form method="POST" action="#" class="mb-3">
            <div class="row form-group mb-3">
                <div class="col-6">
                    <label for="Fname" class="form-label">First Name</label>
                    <input type="text" class="form-control border-bottom border-white" id="Fname" name="first_name" placeholder="First Name" value="<?= $user_profile['first_name']; ?>" required>
                </div>
                <div class="col-6">
                    <label for="Lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control border-bottom border-white" id="Lname" name="last_name"  placeholder="Last Name" value="<?= $user_profile['last_name']; ?>" required>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control border-bottom border-white" id="address" name="address"  placeholder="Address" value="<?= $user_profile['address']; ?>">
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="Cnum" class="form-label">Contact Number</label>
                    <input type="text" class="form-control border-bottom border-white" id="Cnum" name="cnum" placeholder="Contact Number" value="<?= $user_profile['contact_number']; ?>" required>
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" rows="3" name="bio" placeholder="Bio"><?= $user_profile['bio']; ?></textarea>
                </div>
            </div>
            <!-- <div class="row form-group mb-5">
                <div class="col input-group-sm mb-2">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input class="form-control" type="file" id="avatar" name="avatar">
                </div>
            </div> -->
            <div class="row form-group">
                <div class="col">
                    <button type="submit" name="update" class="btn btn-success btn-block w-100">Update</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>