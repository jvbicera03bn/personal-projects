<?php
require "dbcon.php";
$errs = array();
    if(isset($_POST["login"])){
        $account = fetch_all('SELECT * FROM register_login WHERE email = "'.$_POST["username"].'"');
        if(empty($account)){
            $errs[] = "No account with that username";
        }elseif($_POST["password"] = $account[0]['password']) {
            echo '<script>alert("Hello you have Successfully logged in '.$account[0]["firstname"].' '.$account[0]["lastname"].'")</script>';
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
                <input type="password" name="passworrd" id="password" placeholder="Password" required>
                <input type="submit" value="Login" name="login">
            </form>
                <p><a href="register.php">No Account yet?</a></p>
            </div>
        </main>
    </body>
</html>