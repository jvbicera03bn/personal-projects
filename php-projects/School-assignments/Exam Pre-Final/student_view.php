<?php
session_start();
require_once "dbcon.php";
if(!isset($_SESSION["account_info"])){
    header("Location: index.php");
}
if(isset($_POST['logout'])){
    header("Location: index.php");
    unset($_SESSION["account_info"]);
}
$grades = fetch_all("SELECT * FROM tblstudentgrades WHERE school_id='".$_SESSION['account_info'][0]['school_id']."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="logged_in.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
    <body>
        <main>
            <div id="information">
                <h1>Hello Welcome <?=$_SESSION['account_info'][0]['fname']?> <?=$_SESSION['account_info'][0]['lname']?> </h1>
                <h2>Your Grades are</h2>
<?php            if (!empty($grades)){ ?>
                    <p>Prelim: <?=$grades[0]['prelim']?></p>
                    <p>Midterm: <?=$grades[0]['midterm']?></p>
                    <p>Prefinal: <?=$grades[0]['prefinal']?></p>
                    <p>Final: <?=$grades[0]['final']?></p>
                    <p>Remarks: <?=ucfirst($grades[0]['remarks'])?></p>
                    <p>Average: <?=$grades[0]['average']?></p>
<?php            }else{?> 
                    <h3>No Grades Yet</h3>
<?php            }?> 
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="submit" value="Log Out" name="logout" />
            </form>   
        </main>
    </body>
</html>