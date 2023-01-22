<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Reset Password</title>
</head>

<body>
    <form method="get" action="process.php">
        <div>
            <?php if (!empty($_SESSION['resetErr'])) { ?>
                <span><?= $_SESSION['resetErr'] ?></span>
            <?php   }  ?>
            <h1>Password Reset</h1>
            <label for="contact">Contact:</label>
            <input title="contact" type="text" name="contact">
            <input title="submit" type="submit" name="reset_pass" value="Reset Password">
        </div>
    </form>
</body>

</html>