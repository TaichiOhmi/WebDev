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
    $user = $_SESSION['userAccount'];
    $sql = "SELECT * FROM users WHERE account_id = $user";
    $result = mysqli_query($conn, $sql);
    $userInfo = mysqli_fetch_assoc($result);

    $fullName = $userInfo['first_name'] . ' ' . $userInfo['last_name']
?>
<body class=" bg-info">
    <div class="container-sm w-50 p-3">
        <div class="header">
            <h1>Users</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact Number</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM users order by last_name ASC";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) >  0) {
                        $ctr = 1;
                        while($users = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <th scope="row"><?php echo $ctr++; ?></th>
                        <td><?php echo $users['first_name'] . " " . $users['last_name']; ?></td>
                        <td><?php echo $users['address']; ?></td>
                        <td><?php echo $users['contact_number']; ?></td>
                        <td>
                            <a href="delete.php?account=<?php echo $users['account_id'] . "&user=" . $users['user_id']; ?> " onclick="return  confirm('do you want to delete')"><i class="fa-solid fa-trash-can text-danger"></i></a>
                        </td>
                        <td><a href="update.php?<?php echo "user=" . $users['user_id']; ?>"> <i class="fa-solid fa-pencil text-warning"></i></td>
                    </tr>
                <?php
                        }
                    }
                ?>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="logout.php"><button class="btn btn-secondary">logout</button></a></td>
                    <td><a href="profile.php"><button class="btn btn-primary">Profile</button></a></td>
                </tr>       
            </tbody>
        </table>
        <div class="row text-end">
            <div class="col">
            <a href="logout.php"><button class="btn btn-secondary">logout</button></a>
            </div>
        </div>
        <div class="row text-end">
            <div class="col">
            <a href="profile.php"><button class="btn btn-primary">Profile</button></a>
            </div>
           
        </div>
    </div>
</body>
</html>