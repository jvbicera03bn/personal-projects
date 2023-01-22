<?php
session_start();
require 'dbcon.php';
$custom_err = array('fname' => 'First Name',
					'email' => 'Email', 
					'lname' => 'Last Name',
					'password' => 'Password',
					'conf_password' => 'Confirm Password',);
//Login System
if(isset($_POST['login'])){
    unset($_SESSION['error_log']);
    $record = fetch_one("SELECT email,password FROM grping_users WHERE email = '".$_POST['email']."'");
	foreach($_POST as $key => $value){
		if(empty($value)){
			array_push($_SESSION['error_log'],$custom_err[$key]." is required");
		}
	}
    if(empty($_SESSION['error_log'])){
        if(empty($record)){
            array_push($_SESSION['error_log'],"No Account found");
        }else if ($record['email'] !== $_POST['email'] or $record['password'] !== $_POST['password']){
            array_push($_SESSION['error_log'],"Wrong email or password");
        }else if(empty($_SESSION['error_log'])){
            $_SESSION['acc_info'] = fetch_one("SELECT * FROM grping_users WHERE email = '".$_POST['email']."'");
            mysqli_query($connection,"UPDATE `KA95vMzAni`.`grping_users` SET `acc_status` = 'active' WHERE `id` = '".$_SESSION['acc_info']['id']."';");
            header("Location: adminview.php");
        }
    }
}
//Register System
if(isset($_POST['register'])){
    unset($_SESSION['errors_reg']);
	foreach($_POST as $key => $value){
		if(empty($value)){  
			array_push($_SESSION['errors_reg'],$custom_err[$key]." is required");
		}
		if($key == 'fname' or $key == 'mname'){
			if(is_numeric($value)){
				array_push($_SESSION['errors_reg'] ,$custom_err[$key]." Must Consist of Character only");
			}
        }
	}
	if($_POST['password'] !== $_POST['conf_password']){
		array_push($_SESSION['errors_reg'],"Password & Confirm Password must be the same");
	}
	if(empty($errors_reg)){
		$query="INSERT INTO `KA95vMzAni`.`grping_users`(`fname`,`lname`,`email`,`password`)";
		$values="VALUES('".esc_string($_POST['fname'])."','".esc_string($_POST['lname'])."','".esc_string($_POST['email'])."','".esc_string($_POST['password'])."');";
		echo $query.$values;
        mysqli_query($connection,$query.$values);
        header('location:register.php');
	}else{
        header('location:register.php');
    }
}

//Chat System
if (isset($_POST['send_chat'])){
    $query="INSERT INTO `KA95vMzAni`.`grping_chats`(`sender_id`,`reciever_id`,`created_at`,`updated_at`,`message_content`)";
    $values="VALUES('".$_SESSION['acc_info']['id']."','".$_SESSION['reciever']."',now(),now(),'".esc_string($_POST['message'])."');";
    mysqli_query($connection,$query.$values);
    header("Location: adminview.php");
}

if (isset($_POST['chat']) or isset($_POST['update_chat']) or isset($_POST['send_chat'])){
    $_SESSION['reciever'] = $_POST['recipient_user_id'];
    $_SESSION['recipient_info'] = fetch_one('SELECT fname,mname,lname FROM grping_users WHERE id="'.$_SESSION['reciever'].'";');
    $_SESSION["chats"]  = fetch_all("SELECT message_content,sender_id,reciever_id FROM grping_chats WHERE reciever_id = '".$_SESSION['reciever']."' AND sender_id = '".$_SESSION['acc_info']['id']."' OR reciever_id = '".$_SESSION['acc_info']['id']."' AND sender_id = '".$_SESSION['reciever']."' ORDER BY created_at DESC;");
    header("Location: adminview.php");
}

if(isset($_POST["log_out"])){
    mysqli_query($connection,"UPDATE `KA95vMzAni`.`grping_users` SET `acc_status` = 'inactive' WHERE `id` = '".$_SESSION['acc_info']['id']."';");
    session_destroy();
    header('location:index.php');
}
?>