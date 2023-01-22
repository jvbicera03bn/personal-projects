<?php
require_once "dbcon.php";
session_start();
if(isset($_POST['submit'])){
    $records = fetch_all("SELECT * FROM tblsecurity LEFT JOIN tbl_studentinfo ON tblsecurity.id = tbl_studentinfo.id WHERE category = 'student' and tbl_studentinfo.id='".$_POST["acc_id"]."'"); 
}
if(isset($_POST['add_grades'])){
    $average = (intval($_POST['prelim']) + intval($_POST['midterm']) + intval($_POST['prefinal']) + intval($_POST['final']))/4;
    $query = "INSERT INTO tblstudentgrades (`school_id`,`prelim`,`midterm`,`prefinal`,`final`,`average`,`remarks`)";
    $values= 'VALUES("'.$_POST['school_id'].'",'.$_POST['prelim'].','.$_POST['midterm'].','.$_POST['prefinal'].','.$_POST['final'].','.$average.',"'.$_POST['remarks'].'")';
    mysqli_query($connection ,$query.$values);
    echo '<script>alert("Hello you have Successfully added Grades of '.ucfirst($records[0]['fname']).' '.ucfirst($records[0]['Lname']).'")</script>';
    header("Location: admin_view.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="logged_in.css" rel="stylesheet" type="text/css">
    <title>Edit Grades</title>
</head>
    <body>
        <main>
            <div id="stud_info">
                <h1>Adding <?=ucfirst($records[0]['fname'])?> <?=ucfirst($records[0]['lname'])?>'s Grades</h1>
                <p>First Name: <?=ucfirst($records[0]['fname'])?></p>
                <p>Last Name: <?=ucfirst($records[0]['lname'])?></p>
                <p>Middle Name: <?=ucfirst($records[0]['mname'])?></p>
                <p>Suffix: <?=ucfirst($records[0]['suffix'])?></p>
            </div>
            <div id="form_container">  
                <h1>Add Grades</h1>
                <form method="POST"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="number" name="prelim" id="prelim" placeholder="Prelim" required>
                    <input type="number" name="midterm" id="midterm" placeholder="Mid Term" required>
                    <input type="number" name="prefinal" id="prefinal" placeholder="Pre Final" required>
                    <input type="number" name="final" id="final" placeholder="Final" required>
                    <input type="hidden" name="school_id" id="school_id" value="<?=$records[0]["school_id"]?>">
                    <select name="remarks" id="remarks">
                        <option value="" disabled selected hidden>Remarks</option>
                        <option value="passed">Passed</option>
                        <option value="failed">Failed</option>
                        <option value="INC">INC</option>
                        <option value="FDA">FDA</option>
                        <option value="DROP">DROP</option>
                    </select>
                    <input type="submit" name="add_grades" value="Add Grades">
                </form>
            </div>
        </main>
    </body>
</html>