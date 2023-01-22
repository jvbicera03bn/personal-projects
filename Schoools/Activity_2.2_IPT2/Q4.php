<?php 
require_once "db-connection.php";
if (isset($_POST['submit'])){
    $txtValue1 = $_POST['txtValue1'];
    $txtValue2 = $_POST['txtValue2'];
    $txtValue3 = $_POST['txtValue3'];
    $txtValue4 = $_POST['txtValue4'];
    $txtValue5 = $_POST['txtValue5'];
    $txtValue6 = $_POST['txtValue6'];
    $txtValue7 = $_POST['txtValue7'];
    $txtValue8 = $_POST['txtValue8'];

    if (is_numeric($txtValue1) && is_numeric($txtValue2) && is_numeric($txtValue3) && is_numeric($txtValue4) && is_numeric($txtValue5) && is_numeric($txtValue6) && is_numeric($txtValue7) && is_numeric($txtValue8)){
        $average = ($txtValue1+$txtValue2+$txtValue3+$txtValue4+$txtValue5+$txtValue6+$txtValue7+$txtValue8)/8;
        if($txtValue >= 75 && $txtValue <= 100){
            echo "<script>alert('You have Entered a Passing Grade-". $txtValue."')</script>";
            $display = "Passing Average Grade! =(".$txtValue1."+".$txtValue2."+".$txtValue3."+".$txtValue4."+".$txtValue5."+".$txtValue6."+".$txtValue7."+".$txtValue8.") / 8 = ".$average;
            
            $query = "INSERT INTO `tbl_gradessave` (grade1,grade2,grade3,grade4,grade5,grade6,grade7,grade8,average,ramarks)";
            $values = "VALUES('".$txtValue1."','".$txtValue2."','".$txtValue3."','".$txtValue4."','".$txtValue5."','".$txtValue6."','".$txtValue7."','".$txtValue8."','".$average."','".$display."')";
            $result = mysqli_query($conn, $query.$values);
        }elseif($txtValue >= 0 && $txtValue <= 74){
            echo "<script>alert('You have Entered a Failing Grade -". $txtValue."')</script>";
            $display = "Failing Average Grade! =(".$txtValue1."+".$txtValue2."+".$txtValue3."+".$txtValue4."+".$txtValue5."+".$txtValue6."+".$txtValue7."+".$txtValue8.") / 8 = ".$average;
            
            $query = "INSERT INTO `tbl_gradessave` (grade1,grade2,grade3,grade4,grade5,grade6,grade7,grade8,average,ramarks)";
            $values = "VALUES('".$txtValue1."','".$txtValue2."','".$txtValue3."','".$txtValue4."','".$txtValue5."','".$txtValue6."','".$txtValue7."','".$txtValue8."','".$average."','".$display."')";
            $result = mysqli_query($conn, $query.$values);    
        }else{
            echo "<script>alert('You have Entered an Invalid Grade Must Be Less Than 100 or More than 0 -". $txtValue."')</script>";
            $display="Invalid Grade Must Be Less Than 100 or More than 0";
        }
    }else{
        echo "<script>alert('Invalid Input, You Have entered  a String(s)/Character')</script>";
        $display = "(A) Invalid  Input, You have  entered  a String(s)/Character!";

            if(!is_numeric($txtValue1)){
                $txtValue1_err = "Please enter a Valid value for Filipino";
            }
            if(!is_numeric($txtValue2)){
                $txtValue2_err = "Please enter a Valid value for Christian Living";
            }
            if(!is_numeric($txtValue3)){
                $txtValue3_err = "Please enter a Valid value for Algebra";
            }
            if(!is_numeric($txtValue4)){
                $txtValue4_err = "Please enter a Valid value for Physics";
            }
            if(!is_numeric($txtValue5)){
                $txtValue5_err = "Please enter a Valid value for English";
            }
            if(!is_numeric($txtValue6)){
                $txtValue6_err = "Please enter a Valid value for Physical Education";
            }
            if(!is_numeric($txtValue7)){
                $txtValue7_err = "Please enter a Valid value for NSTP";
            }
            if(!is_numeric($txtValue8)){
                $txtValue8_err = "Please enter a Valid value for Phillipine History";
            }                     
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
    <title>Question Number3</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Question Number 3 Answers</h2>
                </div>
                <p>Please Fill the fields to identify if the value  entered  is valid input to compute Average grade or invalid Input</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <label for="txtValue1">Filipino*:</label>
                        <input type="text" name="txtValue1" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue1_err)){echo $txtValue1_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue2">Christian Living*:</label>
                        <input type="text" name="txtValue2" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue2_err)){echo $txtValue2_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue3">Algebra*:</label>
                        <input type="text" name="txtValue3" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue3_err)){echo $txtValue3_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue4">Physics*:</label>
                        <input type="text" name="txtValue4" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue4_err)){echo $txtValue4_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue5">English*:</label>
                        <input type="text" name="txtValue5" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue5_err)){echo $txtValue5_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue6">Physical Education*:</label>
                        <input type="text" name="txtValue6" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue6_err)){echo $txtValue6_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue7">NSTP*:</label>
                        <input type="text" name="txtValue7" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue7_err)){echo $txtValue7_err;}?></span>
                    </div>
                    <div class="form-group">
                        <label for="txtValue8">Phillipine History*:</label>
                        <input type="text" name="txtValue8" class="form-control" maxlength="30">
                        <span><?php if (isset($txtValue8_err)){echo $txtValue8_err;}?></span>
                    </div>
                        <input type="submit" class="btn-primary" name="submit" value="Submit" />
                </form>
                <div class="form-group">
                    <?php if (isset($_POST['submit'])){
                            echo $display;
                    }?>   
                </div>
            </div>
        </div>
    </div>
</body>
</html>