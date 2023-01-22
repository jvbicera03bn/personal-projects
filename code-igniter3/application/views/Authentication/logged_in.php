<!DOCTYPE html>
<?php
$user_info = $vdata['acc_info'][0];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('application/assets/authentication.css');?>">
    <title>Document</title>
</head>

<body>
    <form id="logout_form" method="post" action="log-out">
        <input type="submit" name="log_out" value="Log Out" />
    </form>
    <main>
        <h1 id="login">Basic Information</h1>
        <div id="info_container">
            <h3>First Name:</h3>
            <p><?= $user_info['first_name'] ?></p>

            <h3>Last Name:</h3>
            <p><?= $user_info['last_name'] ?></p>

            <h3>Contact Number:</h3>
            <p><?= $user_info['contact'] ?></p>

            <h3>Email:</h3>
            <p><?= $user_info['email'] ?></p>

            <h3>Last Failed Login: </h3>
            <p><?= $user_info['failed_log_in'] ?></p>
        </div>
    </main>
</body>

</html>