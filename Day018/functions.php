<?php


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
                echo 'Incorrect password';
            }
        }
        else{
            echo 'Username not found';
        }
    }


    function RegisterAccounts($conn, $username, $password, $status){

        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO accounts(`username`, `password`, `status`) VALUES ('$username', '$password', '$status')";

        if(mysqli_query($conn, $sql)){
            echo "record successfully added to accounts<br>";
            header('location: login.php');
        }else{
            echo "inserting record unsuccessful: " . mysqli_error($conn);
        }

    }


    function RegisterUsers($conn, $fname, $lname, $address, $cnum){
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

    function Update($conn, $fname, $lname, $address, $cnum, $bio){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $address = $_POST['address'];
        $cnum = $_POST['cnum'];
        $bio = $_POST['bio'];

        $update_user = "UPDATE users SET first_name='$fname', last_name='$lname', `address`='$address', contact_number='$cnum', bio='$bio' WHERE `user_id` = $user";
    
        if (mysqli_query($conn, $update_user))  {
            header("Location: users.php");
            exit;
        }
        else{
            echo 'Failed to edit profile';
        }
    }