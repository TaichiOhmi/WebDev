<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card w-50 mt-5 mx-auto">
        <div class="card-header">
            <h2 class="display-4">
                Calculator with OOP
            </h2>
        </div>
        <div class="card-body">
        <form action="" method="post">
        <div class="form-group">
            <label for="">Enter first number</label>
            <input type="text" name="num1" class="form-control">
            <label for="">Enter Second Number</label>
            <input type="text" name="num2" class="form-control">
            <br>
            <input type="radio" name="operator" value="addition" >Addition
            <input type="radio" name="operator" value="subtraction" >Subtraction
            <input type="radio" name="operator" value="multiplication" >Multiplcation
            <input type="radio" name="operator" value="division">Division
            <br> <br>
            <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
        </div>
    </form>
    <?php
        include 'classes/calculator_T.php';

        $calc = new Calculator();

        if(isset($_POST['calculate'])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $calculate = $_POST['operator'];

            $calc->set_values($num1,$num2,$calculate);

            echo "<div class = 'alert alert-success'>The Answer is: ".$calc->get_calculation()."</div>";

        }




    ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>