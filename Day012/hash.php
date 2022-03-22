<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        echo $_SESSION['Username'] . "<br>";
        $password = "my_passW0rd";
        $pw = "123445";
        echo "actual password is " . $password;
        echo "<br>";
        echo "hashed password is " . password_hash($password, PASSWORD_DEFAULT);
        echo "actual password is " . $password;
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        echo "<hr>";

        if(password_verify($pw, $hashed)){
            echo "valid password";
        }
        else{
            echo "invalid password";
        }


    ?>



</body>
</html>