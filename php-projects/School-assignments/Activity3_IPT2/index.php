<?php
require_once "db-connection.php";
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $errors = array();
    
    if(is_numeric($fname)){
        $errors += array('fname_err' => 'Enter a valid value for First Name');
    }
    if(is_numeric($mname)){
        $errors += array('mname_err' => 'Enter a valid value for Middle Name');
    }
    if(is_numeric($lname)){
        $errors += array('lname_err' => 'Enter a valid value for Last Name');
    }
    if(is_numeric($suffix)){
        $errors += array('suffix_err' => 'Enter a valid value for Suffix');
    }
    if(empty($errors)){
        $query = "INSERT INTO register_act3 (first_name,middle_name,last_name,suffix,gender)";
        $values = "VALUES('".$fname."','".$mname."','".$lname."','".$suffix."','".$gender."')";
        $result = mysqli_query($conn, $query.$values);
        echo"<script>alert('Successfully Recorded!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Register Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
           
            <input type="text" name="fname" id="fname" placeholder="*First Name">
            <span><?php if(isset($errors['fname_err'])){ echo $errors['fname_err']; } ?></span>

            <input type="text" name="mname" id="mname"placeholder="Middle Name">
            <span><?php if(isset($errors['mname_err'])){ echo $errors['mname_err']; } ?></span>

            <input type="text" name="lname" id="lname"placeholder="*Last Name">
            <span><?php if(isset($errors['lname_err'])){ echo $errors['lname_err']; } ?></span>

            <input type="text" name="suffix" id="suffix"placeholder="Suffix">
            <span><?php if(isset($errors['suffix_err'])){ echo $errors['suffix_err']; } ?></span>

            <div class="gender">
                <select name="gender" id="gender">
                    <option value="None" selected hidden>*Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Bisexual</option>
                    <option>Prefer Not to say</option>
                </select>
            </div>
            <input type="submit" value="Submit" name="register">
        </form>
    </main>
    
</body>
</html>