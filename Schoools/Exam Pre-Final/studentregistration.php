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
    if(is_numeric($_POST["middlename"])){
        $errs[] = "Middle must be a character";
    }
    if(is_numeric($_POST["suffix"])){
        $errs[] = "Suffix must be a character";
    }
    if(empty($_POST["acc_type"])){
        $errs[] = "Account type is required ";
    }
    if(empty($_POST["bday"])){
        $errs[] = "Birthday is required ";
    }
    /* If No error the register account will be registerd */
    if(empty($errs)){
        $query1 ="INSERT INTO `tbl_studentinfo`(`school_id`,`lname`,`fname`,`mname`,`suffix`,`gender`)";
        $query2 ="INSERT INTO `tblsecurity`(`school_id`,`email`,`bday`,`category`)";
        $values1 = 'VALUES("'.$_POST['school_id'].'","'.$_POST['lastname'].'","'.$_POST['firstname'].'","'.$_POST['middlename'].'","'.$_POST['suffix'].'","'.$_POST['gender'].'");';
        $values2 = 'VALUES("'.$_POST['school_id'].'","'.$_POST['email'].'","'.$_POST['bday'].'","'.$_POST['acc_type'].'");';
        mysqli_query($connection ,$query1.$values1);
        mysqli_query($connection ,$query2.$values2);
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
                <input type="text" name="school_id" id="school_id" placeholder="School ID" required>
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                <input type="text" name="middlename" id="middlename" placeholder="Middlename" required>
                <input type="text" name="suffix" id="suffix" placeholder="Suffix" required>
                <select name="acc_type" id="acc_type">
                    <option value="" disabled selected hidden>Account Type</option>
                    <option value="administrator">Administrator</option>
                    <option value="student">Student</option>
                </select>
                <fieldset id="gender">
                    <label id="whole" for="gender">Gender:</label>
                    <input type="radio" value="male" name="gender">
                    <label for="male">Male</label>
                    <input type="radio" value="female" name="gender">
                    <label for="female">Female</label>
                </fieldset>
                <label for="bday">Birthdate:</label>
                <input type="date" name="bday" id="bday" required>
                <input type="submit" name="register" value="Register">
            </form>
                <p><a href="index.php">Already have an account?</a></p>
            </div>
        </main>
    </body>
</html>