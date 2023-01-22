<?php
require_once "db-connection.php";
if(isset($_POST['submit'])){
    /* Convert Input to Intiger Value */
    $sub1 = intval($_POST['sub1']);
    $sub2 = intval($_POST['sub2']);
    $sub3 = intval($_POST['sub3']);
    $sub4 = intval($_POST['sub4']);
    $sub5 = intval($_POST['sub5']);
    $sub6 = intval($_POST['sub6']);
    $sub7 = intval($_POST['sub7']);
    $sub8 = intval($_POST['sub8']);
    $records = $sub1 + $sub2 + $sub3 + $sub4 + $sub5 + $sub6 + $sub7 + $sub8;
    $records = $records/8;
    echo"<script>alert('Your average Grade is ".$records."'); </script>";
    echo"<script>alert('Your grade Has Been Recorded'); </script>";
    $query = "INSERT INTO`grades1`(`filipino`,`christian_living`,`algebra`,`physics`,`english`,`pe`,`NSTP`,`phillipine_history`,`average`)";
    $values = "VALUES('".$sub1."','".$sub2."','".$sub3."','".$sub4."','".$sub5."','".$sub6."','".$sub7."','".$sub8."','".$records."')";
    $result = mysqli_query($conn, $query.$values);
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
    <title>Grade Calculator 1</title>
</head>
    <body>
        <main>
            <h1>Grade Calculator</h1>
            <p>Enter your grade to Compute your average</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="sub1">Filipino</label>
                <input type="number" name="sub1" id="sub1">
                <label for="sub2">Christian Living</label>
                <input type="number" name="sub2" id="sub2">
                <label for="sub3">Algebra</label>
                <input type="number" name="sub3" id="sub3">
                <label for="sub4">Physics</label>
                <input type="number" name="sub4" id="sub4">
                <label for="sub5">English</label>
                <input type="number" name="sub5" id="sub5">
                <label for="sub6">Physical Education</label>
                <input type="number" name="sub6" id="sub6">
                <label for="sub7">NSTP</label>
                <input type="number" name="sub7" id="sub7">
                <label for="sub8">Philippine History</label>
                <input type="number" name="sub8" id="sub8">
                <input type="submit" value="Submit" name="submit">
            </form>
        </main>
    </body>
</html>