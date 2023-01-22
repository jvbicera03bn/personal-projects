<?php
if (isset($_SESSION['errors'])){
    session_destory();
}else{
    session_start();
}
require "dbcon.php";
$errs = array();
    if(isset($_POST["login"])){
        $_SESSION["account_info"] = fetch_all('SELECT * FROM register_login WHERE email = "'.$_POST["username"].'"');
        if(empty($_SESSION["account_info"])){
            $errs[] = "No account with that username";
        }elseif($_POST["password"] == $_SESSION["account_info"][0]["password"]){
            if($_SESSION["account_info"][0]["acc_type"] == "administrator"){
                header("Location: adming_view.php");
            }elseif($_POST["password"] == "user"){
                echo '<script>alert("Hello you have Successfully logged in '.$_SESSION["account_info"][0]["firstname"].' '.$_SESSION["account_info"][0]["lastname"].'")</script>';
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
    <title>Login / Activity3.2</title>
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
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="submit" value="Login" name="login">
            </form>
                <p><a href="register.php">No Account yet?</a></p>
            </div>
        </main>
    </body>
</html>