<?php
session_start();

if (!isset($_SESSION['start'])) {
    $_SESSION['noErr'] = $_SESSION['dateErr'] =
        $_SESSION['fnameErr'] = $_SESSION['lnameErr'] =
        $_SESSION['emailErr'] = $_SESSION['ISSUETitleErr'] =
        $_SESSION['ISSUEdetailErr'] = '';
    $_SESSION['start'] = TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Bug Ticket</title>
</head>
<form method="get" action="process.php">
    <input type="submit" name="reset" value="Reset">
</form>

<body>

    <form id="mainform" method="post" action="process.php" enctype="multipart/form-data">
        <span><?= $_SESSION['noErr'] ?></span>

        <label for="date_today">Date Today:</label>
        <span><?= $_SESSION['dateErr'] ?></span>
        <input type="date" name="date" title="Date">

        <label for="first_name">First Name:</label>
        <span><?= $_SESSION['fnameErr'] ?></span>
        <input type="text" name="first_name" title="First Name">


        <label for="last_name">Last Name:</label>
        <span><?= $_SESSION['lnameErr'] ?></span>
        <input type="text" name="last_name" title="Last_Name">


        <label for="email">Email:</label>
        <span><?= $_SESSION['emailErr'] ?></span>
        <input type="text" name="email" title="Email">


        <label for="issue_title">Issue Title:</label>
        <span><?= $_SESSION['ISSUETitleErr'] ?></span>
        <input type="text" name="issue_title" title="Issue">


        <label for="issue_detail">Issue Details:</label>
        <span><?= $_SESSION['ISSUEdetailErr'] ?></span>
        <textarea name="issue_details" name="issue_detail" title="issue_detail"></textarea>


        <input type="submit" name="submit">
    </form>
</body>

</html>