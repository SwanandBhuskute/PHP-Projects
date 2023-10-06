<?php
    //initially set all the values to null string
    $x = "";
    $y = "";
    $result = "";
    $error = "";


    //operations for num1 and num2
    if(isset($_GET['op'])) {
        $x = $_GET['num1'];
        $y = $_GET['num2'];
        $op = $_GET['op'];
        
        //check f num1 and num2 are valid inputs else return error
        if(is_numeric($x) && is_numeric($y)) {
            switch($op) {
                case 'add': $result = $x + $y;
                            break;
                case 'sub': $result = $x - $y;
                            break;
                case 'pro': $result = $x * $y;
                            break;
                case 'div': $result = $x / $y;
                            break;
                default: echo "Error! invalid credentials!";
                            break;
            }
        }
        else {
            $error = "Enter valid numbers!!";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1><?= $error ?></h1>
                <!-- this form sends data to itself -->
                <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
                    <!-- Input Number 1 -->
                    <div class="form-group">
                        <label for="num1">Enter Number 1:</label>
                        <input type="number" class="form-control" id="num1" name="num1" value="<?= $x ?>">
                    </div>
                    <!-- Input Number 2 -->
                    <div class="form-group">
                        <label for="num2">Enter Number 2:</label>
                        <input type="number" class="form-control" id="num2" name="num2" value="<?= $y ?>">
                    </div>
                    <!-- Result -->
                    <div class="form-group">
                        <label for="result">Result:</label>
                        <input type="number" class="form-control" id="result" value="<?= $result ?>" readonly>
                    </div>
                    <!-- buttons for operations -->
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="add" name="op">
                        <input type="submit" class="btn btn-secondary" value="sub" name="op">
                        <input type="submit" class="btn btn-success" value="pro" name="op">
                        <input type="submit" class="btn btn-danger" value="div" name="op">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
