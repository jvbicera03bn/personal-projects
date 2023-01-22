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
  	<script type="text/javascript" src="styles.js"></script>
  	<title>Registration Form</title>
  	<link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="form_container">
        <h1 id="header">Registration</h1>
<?php	if (!empty($_SESSION['errors_reg'] )) {?>
			<div id="errors">
<?php		foreach ($_SESSION['errors_reg']  as $error){?>
				<p><?=$error?></p>
<?php		}?>
			</div>	
<?php		}else{?>
			<div id="success">
				<p>You Have Successfully Registered</p>	
			</div>
<?php	}?>
        <form action="process.php" method="post">
            <div class="form_group">
			<div id="form_group_inps">
				<input type="text" id="fname" name="fname" placeholder="First Name" >
				<input type="text" id="lname" name="lname" placeholder="Last Name" >        
				<input type="email" id="email" name="email"placeholder="Email" >
				<input type="password" id="password" name="password" placeholder="Password" >
				<input type="password" id="conf_password" name="conf_password" placeholder="Confirm Password" >
				<p>Already Registered? <a href="index.php">Login</a> Here</p>
				<div id="button_holder">
					<input type="submit" value="Register" name="register">
				</div>
			</div>

        </form>
    </div>
</body>
