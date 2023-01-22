<?php
session_start();
require("new-connection.php");
$user_info = $_SESSION['personal_infos'][0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Success</title>
</head>

<body>

    <h3>First Name</h3>
    <h2><?= $user_info['first_name'] ?></h2>

    <h3>Last Name</h3>
    <h2><?= $user_info['last_name'] ?></h2>

    <h3>Email</h3>
    <h2><?= $user_info['email'] ?></h2>

    <h3>Contact Number</h3>
    <h2><?= $user_info['contact_num'] ?></h2>
    <form id="log_out" action="process.php" method="get">
    <input type="submit" name="log_out" value="log out"/>
    </form>
</body>

</html>