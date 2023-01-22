<?php
require_once "db-connection.php";
if (isset($_POST['submit'])){
    $txtValue = $_POST['txtValue'];
    $numChar = strlen($txtValue);
    $countNum = 0;
    for($i = 0;$i < $numChar;$i++){
        if(is_numeric($txtValue[$i])){
            $countNum++;
        }
    }
    if($numChar == $countNum){
        echo "<script>alert('You have Entered a Number(s)! -". $txtValue. "')</script>";
        $display = "You have entered a Number(s)!- ".$txtValue;
    }elseif($countNum == 0){
        echo "<script>alert('You have Entered a String(s)/Character! -". $txtValue. "')</script>";
        $display = "You have Entered a String(s)/Character! - ".$txtValue;
    }else{
        echo "<script>alert('You have Entered a String(s)/Character And Number(s)! -". $txtValue."')</script>";
        $display = "You have Entered a String(s)/Character And Number(s)!- ".$txtValue;
    }
    // $query = "INSERT INTO `tbl_values` (txtvalue,display)";
    // $values = "VALUES('".$txtValue."','".$display."')";
    // $result = mysqli_query($conn, $query.$values);
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
    <title>Question Number1.B</title>
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