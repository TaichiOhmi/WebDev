<?php
#1. PERFORM CRUD on USERS table
    // 1. UI
    // 2. Action [EDIT - DELETE - CREATE]
    // 3. METHODS


    include 'Connection.php'; // combines 2files

    class User extends Connection{

        public function store_user($fname, $lname ,$contact, $username, $password, $email){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(fname, lname, contact, username, password, email) VALUES('$fname', '$lname', '$contact', '$username', '$password', '$email')";
            $result = $this->conn->query($sql);

            if ($result){
                header('location: ../views/dash-users.php');
            }
            else{
                $this->conn->error();
            }
        }


        public function show_users(){
            $sql = "SELECT * FROM users";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){ // if there are any data inside table::users
                while($rows = $result->fetch_assoc()){
                    $container[] = $rows;
                }
                return $container;
            }
            else{
                return false;
            }
        }

        public function destroy_user($id){
            $sql = "DELETE FROM users WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                header('location: ../views/dash-users.php');
            }
        }

        public function update_user($id, $fname, $lname ,$contact, $username, $password, $email){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET fname = '$fname', lname = '$lname', contact = '$contact', username = '$username', password = '$password', email = '$email' WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                header('location: ../views/dash-users.php');
            }else{
                $this->conn->error();
            }
        }

        public function show_user($id){
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                return $result->fetch_assoc();
            }
        }

    }


?>
