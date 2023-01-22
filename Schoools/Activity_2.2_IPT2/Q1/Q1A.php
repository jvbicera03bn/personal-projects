<?php
require_once "db-connection.php";
if (isset($_POST['submit'])){
    $txtValue = $_POST['txtValue'];
    if(is_numeric($txtValue)){
        echo"<script>alert('You have Entered a Number(s)')</script>";
    }else{
        echo"<script>alert('You have Entered a String(s)/Character')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Question Number1.A</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Question Number 1 Answers</h2>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <label for="txtValue">Please Fill-in the text Field:</label>
                        <input type="text" name="txtValue" class="form-control" maxlength="30">
                    </div>
                        <input type="submit" class="btn-primary" name="submit" value="Submit" />
                </form>
                <div class="form-group">
                    <span>
                        <?php if (isset($_POST['submit'])){
                            echo $display;
                         }?> 
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>