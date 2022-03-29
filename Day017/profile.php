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
    $user = $_SESSION['userAccount'];
    $sql = "SELECT * FROM users WHERE account_id = $user";
    $result = mysqli_query($conn, $sql);
    $userInfo = mysqli_fetch_assoc($result);

    $fullName = $userInfo['first_name'] . ' ' . $userInfo['last_name']
?>
<body class=" bg-info">
    <div class="container-sm w-50 p-3 text-white">
        <div class="row">
            <!-- <div class="col"><h1>Profile of <span class="fst-italic fw-bold"><?php //$fullName ?></h1></span></div> -->
            <div class="col"><h1>Profile</h1></div>
        </div>
        <div class="row">
            <div class="col">name: </div>
            <div class="col"><?php echo $fullName ?></div>
        </div>
        <div class="row">
            <div class="col">address: </div>
            <div class="col"><?php echo $userInfo['address'] ?></div>
        </div>
        <div class="row">
            <div class="col">contact number: </div>
            <div class="col"><?php echo $userInfo['contact_number'] ?></div>
        </div>
        <div class="row">
            <div class="col">bio: </div>
            <div class="col"><?php echo $userInfo['bio'] ?></div>
        </div>
        <div class="row">
            <div class="col">avatar: </div>
            <div class="col"><?php echo $userInfo['avatar'] ?></div>
        </div>
        <div class="row">
            <a href="logout.php" class="text-end">log out</a>
        </div>

        <!-- If status == 'A', link is displayed. -->
        <?php
            $sql = "SELECT * FROM accounts WHERE account_id = $user";
            $result = mysqli_query($conn, $sql);
            $account_info = mysqli_fetch_assoc($result);
            if ($account_info['status']=='A'){
        ?>
        <div class="row">
            <a href="users.php" class="text-end">view all users</a>
        </div>
        <?php
            }
        ?>
        <!--  -->

    </div>
</body>
</html>