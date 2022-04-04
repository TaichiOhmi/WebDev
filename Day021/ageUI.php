<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Age</title>
</head>
<body>
    <div class="container w-50 mt-5">
        <div class="card mx-auto">
            <div class="card-header">
                DETERMIN AGE APP v1.0
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <input type="text" name="fname" id="" placeholder="FIRSTNAME" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <input type="text" name="lname" id="" placeholder="LASTNAME" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <input type="number" name="byear" id="" placeholder="BIRTH YEAR" class="form-control" min="0" required>
                    </div>
                    <div class="row mb-3">
                        <input type="number" name="cyear" id="" placeholder="CURRENT YEAR" class="form-control" min="0" required>
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-outline-primary" name="submit">submit</button>  
                    </div>
                    <?php

                    include 'classes/Age.php';

                    $age = new Age();

                    if (isset($_POST['submit'])){
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $byear = $_POST['byear'];
                        $cyear = $_POST['cyear'];

                        $age -> set_data($fname, $lname, $byear, $cyear);

                    ?>
                    <div class="row bg-success mb-3 rounded">
                        <div class="text-white p-2">The name is: <?= $age->get_fname() ?></div>
                    </div>
                    <div class="row bg-success mb-3 rounded">
                        <div class="text-white p-2">The lastname is: <?= $age->get_lname() ?></div>
                    </div>
                    <div class="row bg-success mb-3 rounded">
                        <div class="text-white p-2">The age is: <?= $age->get_age() ?></div>
                    </div>
                    <?php 
                    }
                    ?>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>