<?php
if (isset($_SESSION['errors'])){
    session_destory();
}else{
    session_start();
}
require "dbcon.php";
$errs = array();
    if(isset($_POST["login"])){

        $_SESSION["account_info"] = fetch_all('SELECT * FROM tblsecurity LEFT JOIN tbl_studentinfo ON tblsecurity.id = tbl_studentinfo.id WHERE email = "'.$_POST["email"].'" and tblsecurity.school_id = "'.$_POST["school_id"].'"');

        
        if(empty($_SESSION["account_info"])){

            $errs[] = "No account with that information, Please try Again";

        }elseif($_POST["school_id"] == $_SESSION["account_info"][0]["school_id"] and $_POST["bday"] == $_SESSION["account_info"][0]["bday"]){

            if($_SESSION["account_info"][0]["category"] == "administrator"){

                header("Location: admin_view.php");

            }elseif($_SESSION["account_info"][0]["category"]== "student"){

                header("Location: student_view.php");

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
    <link href="style.css" rel="stylesheet" type="text/css">
    </style>
    <title>Login / Exam Prefinals</title>
</head>
    <body>
        <main>
            <div id="form_container">
                <h1>Login</h1>
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
                <label for="bday">Birthdate:</label>
                <input type="date" name="bday" id="bday" required>
                <input type="submit" value="Login" name="login">
            </form>
                <p><a href="register.php">No Account yet?</a></p>
            </div>
        </main>
    </body>
</html>