<?php
session_start();
require 'dbcon.php'; 
/* if (!isset($_SESSION['acc_info']) or $_SESSION['acc_info']['status'] !== 'student'){
    header('location:index.php');
} */
$acc_info = $_SESSION['acc_info'];
mysqli_query($connection, "UPDATE `KA95vMzAni`.`grping_users`SET `acc_status` = 'active' WHERE `id` = '".$acc_info['id']."';");

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentview.css">
    <title>Student</title>
</head>
    <body>
        <main>
            <section id="profile">
                <h1>Welcome Student</h1>
                <p><?=ucfirst($acc_info['fname']).", ".ucfirst($acc_info['mname']).", ".ucfirst($acc_info['lname'])?> </p>
            </section>
        </main>
    </body>
</html>