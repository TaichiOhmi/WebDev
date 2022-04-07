<?php
    include 'Connection.php'; // combines 2files

    class Library extends Connection{

    // contain SQL codes INSERT INTO... SELECT * ...


        public function store_book($bName, $bGenre, $bAuthor){
            $sql = "INSERT INTO books(name, genre, author) VALUES('$bName', '$bGenre', '$bAuthor')";
            $result = $this->conn->query($sql);

            if ($result){
                header('location: ../views/dash-books.php');
            }
        }

        public function show_books(){
            $sql = "SELECT * FROM books";
            $result = $this->conn->query($sql);


            if($result->num_rows > 0){ // if there are any data inside table::books
                while($rows = $result->fetch_assoc()){
                    $container[] = $rows;
                }
                return $container;
            }
            else{
                return false;
            }
        }

        public function destroy_book($id){
            $sql = "DELETE FROM books WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                header('location: ../views/dash-books.php');
            }
        }

        // 1. create UI for update: (HTML/BOOTSTRP)
        // 2. complete update_book method
        // 3. create Update action
        public function update_book($id, $bName, $bGenre, $bAuthor){
            $sql = "UPDATE books SET name = '$bName', genre = '$bGenre', author = '$bAuthor' WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result){
                header('location: ../views/dash-books.php');
            }else{
                $this->conn->error();
            }
        }

        public function show_update_item($id){
            $sql = "SELECT * FROM books WHERE id = $id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){ // if there are any data inside table::books
                return $result->fetch_assoc();
            }
        }

    }


?>