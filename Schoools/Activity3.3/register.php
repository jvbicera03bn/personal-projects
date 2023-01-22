<?php
require_once "dbcon.php";
$errs = array();
/* Get Array of Records */
if(isset($_POST["register"])){
    /* IF there are input fields that is empty an error will be returned*/
    foreach($_POST as $POST){
        if(empty($POST)){
            $errs[] = "All fields are required";
            break;
        }
    }
    if(is_numeric($_POST["firstname"])){
        $errs[] = "Firstname must be a character";
    }
    if(is_numeric($_POST["lastname"])){
        $errs[] = "Lastname must be a character";
    }
    if($_POST["password"] !== $_POST["conf_password"]){
        $errs[] = "Password and Confirm Password must be the same";
    }

    /* If No error the register account will be registerd */
    if(empty($errs)){
        $query ="INSERT INTO `register_login`(`firstname`,`lastname`,`email`,`password`,`acc_status`,`acc_type`)";
        $values = 'VALUES("'.$_POST['firstname'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['password'].'","'.$_POST['acc_stat'].'","'.$_POST['acc_type'].'");';
        mysqli_query($connection ,$query.$values);
        echo "<script> alert('You have successfully register')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    
    <title>Register / Activity3.2</title>
</head>
    <body>
        <main>
            <div id="form_container">
                <h1>Register</h1>
<?php           if(!empty($errs)){ ?>
                    <div id="err">
<?php                   foreach($errs as $err){
                            echo"<p>".$err."</p> ";
                        } ?> 
                    </div>         
<?php           } ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                <select name="acc_type" id="acc_type">
                    <option value="" disabled selected hidden>Account Type</option>
                    <option value="administrator">Administrator</option>
                    <option value="user">User</option>
                </select>
                <label for="acc_stat">Account Status:</label>
                <fieldset na id="acc_stat">
                    <input type="radio" value="active" name="acc_stat">
                    <label for="acc_stat">Active</label>
                    <input type="radio" value="inactive" name="acc_stat">
                    <label for="acc_stat">Inactive</label>
                </fieldset>
                <input type="password" name="password" id="password" placeholder="Password" required> 
                <input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" required> 
                <input type="submit" name="register" value="Register">
            </form>
                <p><a href="login.php">Already have an account?</a></p>
            </div>
        </main>
    </body>
</html>