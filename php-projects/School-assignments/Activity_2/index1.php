<?php
if(isset($_POST['Compute'])){
    $numval1 = $_POST['num1'];
    $numval2 = $_POST['num2'];

    if(!is_numeric($numval1)){
        $numval1_error = "Please Enter a valid number for value number 1";
    }
    if(!is_numeric($numval2)){
        $numval2_error = "Please Enter a valid number for value number 2";
    }
    else if((is_numeric($numval1)) && (is_numeric($numval2))){
        $sum = $numval1 + $numval2;
        $diff = $numval1 - $numval2;
        $prod = $numval1 * $numval2;
        $quo = $numval1 / $numval2;
        $mod = $numval1 % $numval2;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Simple Number Computation</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Simple Number Computation</h2>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <div class="form-group">
                        <label for="num1">Value Number 1</label>
                        <input type="text" name="num1" class="form-control" maxlength="30" required="TRUE">
                        <span class="text-danger"><?php if(isset($numval1_error)) echo $numval1_error; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="num2">Value Number 2</label>
                        <input type="text" name="num2" class="form-control" maxlength="30" required="TRUE">
                        <span class="text-danger"><?php if(isset($numval2_error)) echo $numval2_error; ?></span>
                    </div>

                    <input type="submit" value="Compute" name="Compute" class="btn btn-primary">
                    <br>

                    <span class="card-text">
                        <?php
                        if((!isset($numval1_error)) && (!isset($numval2_error)) )
                            echo "<br><br>Textbox value 1: <b>". $numval1 ."</b>";
                            echo "<br>Textbox value 2: <b>". $numval2 ."</b>";
                            echo "<br><br>The sum of 2 numbers: <b>". $sum ."</b>";
                            echo "<br>The Difference of 2 numbers: <b>". $diff ."</b>";
                            echo "<br>The Product of 2 numbers: <b>". $prod ."</b>";
                            echo "<br>The Quotient of 2 numbers: <b>". $quo ."</b>";
                            echo "<br>The Modulo/Remainder of 2 numbers: <b>". $mod ."</b>";
                        ?>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>