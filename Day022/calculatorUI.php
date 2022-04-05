<?php

// merge the 2 files
include 'classes/Calculator.php';

// create an Object
$calc = new Calculator();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Calculator APP</title>
</head>
<body>
    <div class="container w-50 mt-5">
        <div class="card mx-auto">
            <div class="card-header">
                Calculator with OOP
            </div>
            <div class="card-body p-4">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label for="fnum" class="form-label">Enter First Number</label>
                        <input type="number" name="fnum" id="fnum" placeholder="FIRST NUMBER" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <label for="fnum" class="form-label">Enter Second Number</label>
                        <input type="number" name="snum" id="" placeholder="SECOND NUMBER" class="form-control" required>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="method" id="add" value="add"  required>
                        <label class="form-check-label" for="add">
                            Addition
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="method" id="sub" value="sub">
                        <label class="form-check-label" for="sub">
                            Subtraction
                        </label>                            
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="method" id="mul" value="mul">
                        <label class="form-check-label" for="mul">
                            Multiplication
                        </label>                            
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mb-3" type="radio" name="method" id="div" value="div">
                        <label class="form-check-label" for="div">
                            Division
                        </label>                            
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-outline-primary" name="submit">Calculate</button>  
                    </div>
                    <?php

                    if (isset($_POST['submit'])){
                        $fnum = $_POST['fnum'];
                        $snum = $_POST['snum'];
                        $method = $_POST['method'];

                        $calc->set_data($fnum, $snum, $method);

                    ?>
                    <div class="row alert alert-success">
                        The Answer is: <?= $calc->calculate() ?>
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