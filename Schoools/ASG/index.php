<?php
session_start();
require 'dbcon.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
</head>
<body>
    <div id="form_container">
<?php   if (!empty($_SESSION['error_log'])){?>
			<div id="errors">
<?php	foreach ($_SESSION['error_log'] as $error){?>
			<p><?=$error?></p>
<?php		}?>
		    </div>
<?php	 }?>
        <h1>Login</h1>
        <form action="process.php" method="post">
            <input type="email" id="email" name="email"placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Password">
            <p>No Account yet? <a href="register.php">Register</a> Here</p>
            <div id="button_holder">
                <input type="submit" value="Login" name="login">
            </div>
        </form>
    </div>
</body>
</html>