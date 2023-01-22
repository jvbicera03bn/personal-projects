<?php
require 'dbcon.php'; 
session_start();
if (!isset($_SESSION['acc_info']) or $_SESSION['acc_info']['status'] !== 'administrator'){
    header('location:index.php');
}
$admin_info = $_SESSION['acc_info'];
$studens_info = fetch_all("SELECt id,fname,mname,lname,email,acc_status,student_num FROM grping_users WHERE status = 'student'");
if(isset($_POST["encode_grade"])){
    //encode here
}
if(isset($_POST["log_out"])){
    unset($_SESSION['acc_info']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminview.css">
    <title>Administrator</title>
</head>
<body>
    <main>
        <div id="top_section">
        <section id="profile">
            <h1>Welcome Administrator</h1>
            <p><?=ucfirst($admin_info['fname']).", ".ucfirst($admin_info['mname']).", ".ucfirst($admin_info['lname'])?> </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input id="logout"type="submit" value="Log Out" name="log_out">
            </form>
        </section>
        <section id="grading_form">
            <h1>Enter Grades</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="number" id="prelim" name="prelim" placeholder="Pre-lim">
                <input type="number" id="midterm" name="midterm" placeholder="Mid-terms">
                <input type="number" id="prefinal" name="prefinal" placeholder="Pre-Final">
                <input type="number" id="finals" name="finals" placeholder="Finals">
                <select name="sudents" id="sudents">
                    <option value="" selected disabled hidden>Student Name</option>
<?php           foreach ($studens_info as $student){?>
                    <option value="<?=$student['id']?>"><?=ucfirst($student['fname']).", ".ucfirst($student['lname'])?></option>
<?php           }?>
                </select>
                <input type="submit" value="Encode Grades" name="encode_grade">
            </form>
        </section>
        </div>
        <section id="attendance">
            <h3>Student Attendance</h3>
            <div id="table_box">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Student Number</th>
                        <th>Email</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
<?php           foreach ($studens_info as $student){?>
                    <tr>
                        <td><?=$student['id']?></td>
                        <td><?=$student['fname']?></td>
                        <td><?=$student['lname']?></td>
                        <td><?=$student['mname']?></td>
                        <td><?=$student['student_num']?></td>
                        <td><?=$student['email']?></td>
<?php                   if ($student['acc_status'] == "active"){?>
                            <td id="<?=$student['acc_status']?>">✔</td>
<?php                   }else if($student['acc_status'] == "inactive"){?>    
                            <td id="<?=$student['acc_status']?>">✖</td>
<?php                   }?>
                    </tr>
<?php           }?>
                </tbody>
            </table>
            </div>
        </section>
    </main>
</body>
</html>