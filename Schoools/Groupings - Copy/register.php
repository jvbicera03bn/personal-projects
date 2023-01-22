<?php
require 'dbcon.php';
$custom_err = array('fname' => 'First Name',
					'lname' => 'Last Name', 
					'email' => 'Email', 
					'mname' => 'Middle Name',
					'status' => 'Status',
					'student_number' => 'Student Number',
					'password' => 'Password',
					'conf_password' => 'Confirm Password',);
$errors = array();
if(isset($_POST['register'])){
	foreach($_POST as $key => $value){
			if($key == "status" and $value='student'){
				if($key == "student_number" and empty($value)){
					array_push($errors,$custom_err[$key]." is required");
				}
			}
		else if(empty($value)){
			array_push($errors,$custom_err[$key]." is required");
		}
		if($key == 'fname' or $key == 'lname' or $key == 'mname'){
			if(is_numeric($value)){
				array_push($errors,$custom_err[$key]." Must Consist of Character only");
			}
        }
	}
	if($_POST['password'] !== $_POST['conf_password']){
		array_push($errors,"Password & Confirm Password must be the same");
	}
	if(empty($errors)){
		if(empty($_POST['student_number'])){
			$_POST['student_number']	= 'N/A';
		}
		$query="INSERT INTO `KA95vMzAni`.`grping_users`(`status`,`fname`,`lname`,`mname`,`email`,`password`,`student_num`)";
		$values="VALUES('".$_POST['status']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['mname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['student_number']."');";
		mysqli_query($connection,$query.$values);
	}
}
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
        <h1 id="header">Registration / Enrollment</h1>
<?php	if(isset($_POST['register'])){
			if (!empty($errors)){?>
					<div id="errors">
<?php			foreach ($errors as $error){?>
					<p><?=$error?></p>
<?php			}}else{?>
					<div id="success">
<?php				if($_POST['status'] == "student"){?>			
						<p>You Have Successfully Enrolled</p>	
<?php				}else{?>
						<p>You Have Successfully Registered</p>	
<?php				}	
				}?>
		</div>
<?php	}?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form_group">
              <h2>Status</h2>
              <div id="radio_status">
                <input type="radio" name="status" id="status_admin" value="administrator">
                <label for="status_admin">Administrator</label>
                <input type="radio" name="status" id="status_student" value="student" >
                <label for="status_student">Student</label>
              </div>
            </div>
			<div id="form_group_inps">
				<input type="text" id="fname" name="fname" placeholder="First Name" >
				<input type="text" id="mname" name="mname" placeholder="Middle Name" >
				<input type="text" id="lname" name="lname" placeholder="Last Name" >        
				<input type="email" id="email" name="email"placeholder="Email" >
				<input type="text" id="student_number" name="student_number" placeholder="Sutdent Number"> 
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
