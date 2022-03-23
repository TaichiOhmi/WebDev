<?php

    require_once '../connection/conn.php';
?>
<form method = "post" action="#">
    <table>
        <tr>
            <td><label>User name</label></td>
            <td>:</td>
            <td><input type="text" name="user_name"></td>
        </tr>
        <tr>
            <td><label>User Password</label></td>
            <td>:</td>
            <td><input type="password" name="user_pw"></td>
        </tr>
        <tr>
            <td><label>Confirm Password</label></td>
            <td>:</td>
            <td><input type="password" name="user_cpw"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="register" name="submit"></td>
        </tr>
    </table>
</form>

<?php
    if(isset($_POST['submit'])){
        $uname = $_POST['user_name'];
        $pw = $_POST['user_pw'];
        $cpw = $_POST['user_cpw'];

        if($pw != $cpw){
            echo "password does not match";
        }
        else{
            $pw = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
            $sql = "insert into account(username, password) values ('$uname', '$pw')";
            if(mysqli_query($conn, $sql)){
                echo "<h3>record successfully added to your database</h3>";
            }else{
                echo "inserting record unsuccessful: " . mysqli_error($conn);
            }
        }
    }









?>