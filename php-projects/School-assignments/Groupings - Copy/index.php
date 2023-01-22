<?php
session_start();
require 'dbcon.php'; 
$custom_err = array('email' => 'Email', 
					'password' => 'Password');
$errors = array();
if(isset($_POST['login'])){
    $record = fetch_one("SELECT email, password,status FROM grping_users WHERE email = '".$_POST['email']."'");
	foreach($_POST as $key => $value){
		if(empty($value)){
			array_push($errors,$custom_err[$key]." is required");
		}
	}
    if(empty($errors)){
        if(empty($record)){
            array_push($errors,"No Account found");
        }else if ($record['email'] !== $_POST['email'] and $record['password'] !== $_POST['password']){
            array_push($errors,"Wrong email or password");
        }
        echo 'logged in ';
        if(empty($errors)){
            $_SESSION['acc_info'] = fetch_one("SELECT * FROM grping_users WHERE email = '".$_POST['email']."'");
            if($record['status']=='administrator'){
                header("Location: adminview.php");
            } else if($record['status'] == 'student'){
                header("Location: studentview.php");
            }
        }
    }
    }
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
<?php	if(isset($_POST['login'])){
			if (!empty($errors)){?>
					<div id="errors">
<?php			foreach ($errors as $error){?>
					<p><?=$error?></p>
<?php			}?>
		</div>
<?php	    }
        }?>
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">     
            <input type="email" id="email" name="email"placeholder="Email">
            <input type="password" id="password" name="password" placeholder="Password">
            <p>No Account yet? <a href="register.php">Register</a> or <a href="register.php">Enroll</a> Here</p>
            <div id="button_holder">
                <input type="submit" value="Login" name="login">
            </div>
        </form>
    </div>
</body>
</html>