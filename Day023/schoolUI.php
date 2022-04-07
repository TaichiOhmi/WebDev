<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>TUITION CALCULATOR</title>
</head>
<body>
    <div class="container w-50 mt-5">
        <form action="" method="post">
            <h1 class="text-center">TUITION CALCULATOR</h1>
            <div class="row mb-3">
                <label for="fullname" class="form-label">Enter Full Name</label>
                <input type="text" name="fullname" id="fullname" placeholder="FULL NAME" class="form-control" required>
            </div>
            <div class="row mb-3">
                <label for="ylevel" class="form-label">Year Level</label>
                <select class="form-select" name="ylevel" aria-label="ylevel">
                    <option selected hidden>Choose Year Level</option>
                    <option value="1">First Year</option>
                    <option value="2">Second Year</option>
                    <option value="3">Third Year</option>
                    <option value="4">Forth Year</option>
                </select>
            </div>
            <div class="row mb-3">
                <label for="units" class="form-label">Total Units</label>
                <input type="number" name="units" id="units" placeholder="TOTAL UNITS" class="form-control" min="0" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="labofee" id="yes" value="yes"  required>
                <label class="form-check-label" for="yes">With Laboratory Fee</label>
            </div>
            <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="labofee" id="no" value="no">
                <label class="form-check-label" for="no">With Laboratory Fee</label>
            </div>
            <div class="row mb-3">
                <button type="submit" class="btn btn-outline-primary" name="submit">Calculate</button>  
            </div>
        </form>
        <?php

        include 'classes/School.php';

        $school = new School();

        if(isset($_POST['submit'])){
            $name = $_POST['fullname'];
            $ylevel = $_POST['ylevel'];
            $units = $_POST['units'];
            $labofee = $_POST['labofee'];

            $school->set_data($name, $ylevel, $units, $labofee);

        ?>
        <div class="row alert alert-warning" role="alert">
            Name: <?= $school->get_name() ?><br>
            Total Tuition is: <?= $school->calc_total_tuition() ?><br>
        </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>