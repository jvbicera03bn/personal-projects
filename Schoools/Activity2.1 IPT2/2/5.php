<?php
require_once "db-connection.php";
session_start();
$subjects = array();
$records =  0;
if(isset($_POST['reset_session'])){
    /* Destroy the session to go back to start if the button is clicked */
    session_destroy();
}
if(isset($_POST['num_of_sub'])){
    /* Get the Inputted Num of subject */
    if(is_numeric($_POST['num_of_subject'])){
        $num_of_sub = $_POST['num_of_subject'];
    } else{
        echo"<script>alert('Invalid Input, Must be a number');</script>";
    }
}

if(isset($_POST['submit'])){
    /* Convert Input to Intiger Value */
    $num_of_sub = $_POST['num_of_subject'];
    /* Adds All Input Grades */
    for($i=1;$i<=$num_of_sub;$i++){
        if(!is_numeric($_POST['sub'.$i])){
            $err2 = TRUE;
            echo"<script>alert('Invalid Input in Subject#".$i.", Must be a number');</script>";
        }
        else{ 
            $err2 = FALSE;
            $records +=  $_POST['sub'.$i];
        }
    }
    /* Store into readable Variable */
    if(!$err2){
        $num_of_sub = intval($num_of_sub);
        $records = intval($records/$num_of_sub);
        $student_num = $_POST['student_num'];
        /* Create a prompt and Record to Database */
        if($records >= 0 && $records <= 100){
            if($records > 74){
                echo"<script>alert('Your grade is ".$records." , You  Passed'); </script>";
                echo"<script>alert('Your grade Has Been Recorded'); </script>";
                $query = "INSERT INTO grades( `student_number` , `average` , `num_of_subjects` , `status` )";
                $values = "VALUES('".$student_num."','".$records."','".$num_of_sub."','Passed')";
                $result = mysqli_query($conn, $query.$values);
            } else {
                echo"<script>alert('Your grade is ".$records." , Unfortunately You didnt Pass '); </script>";
                echo"<script>alert('Your grade Has Been Recorded'); </script>";
                $query = "INSERT INTO grades( `student_number` , `average` , `num_of_subjects` , `status` )";
                $values = "VALUES('".$student_num."','".$records."','".$num_of_sub."','Failed')";
                $result = mysqli_query($conn, $query.$values);
            } 
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
    <style>
        *{
            margin: 0px;
            padding: 0px;
            border: 0px;
        }
        main{
            padding:10px;
            border:1px solid;
            width:500px;
            margin: 30px auto;
            border-radius: 10px;
        }
        h1,p{
            text-align: center;
        }
        form{
            margin: 0px auto;
            text-align: center;
            padding:10px;
        }
        form input{
            border:1px solid;
            margin:5px;
            padding:5px;
            border-radius: 10px;
            display:block;
            margin:3px auto;
            text-align: center;
        }
    </style>
    <title>Grade Calculator 3</title>
</head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" name='reset_session'value="Reset Session">
        </form>
        <main>
<?php if(!isset($num_of_sub)){?>
            <h1>Subjects</h1>
            <p>Enter the number of subjects</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <label for="sub1">Number of Subjects</label>
                    <input type="text" name="num_of_subject" id="num_of_subject">
                <input type="submit" value="Submit" name="num_of_sub">
            </form>
<?php   } ?>
<?php if(isset($num_of_sub)){?>
            <h1>Grade Calculator</h1>
            <p>Enter your grade to Compute your average</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="student_num">Student Number</label>
                <input type="text" name="student_num" >
<?php           for($i=1;$i<=$num_of_sub;$i++){ ?>
                    <label for="sub1">Subject#<?=$i?></label>
                    <input type="text" name="sub<?=$i?>" id="sub<?=$i?>">
<?php           } ?>
                <input type="hidden" name="num_of_subject" value="<?=$_POST['num_of_subject']?>">
                <input type="submit" value="Submit" name="submit">
            </form>
<?php   } ?>
        </main>
    </body>
</html>