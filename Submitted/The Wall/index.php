<?php session_start();
if (!isset($_SESSION['start'])) {
    $_SESSION['registerErr'] = array();
    $_SESSION['loginErr'] = array();
    $_SESSION['regTrue'] = "";
    $_SESSION['start'] = TRUE;
    $_SESSION['resetErr'] = '';
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>Encryption</title>
    </head>
    <body>
        <!-- For Register -->
        <form id="register" action="process.php" method="post">
            <h1>Register</h1>
<?php       if (!empty($_SESSION['registerErr'])) {
                foreach ($_SESSION['registerErr'] as $input_error) { ?>
                    <span><?= $input_error ?></span>
<?php       }
                $_SESSION['registerErr'] = array();
            } else { ?>
                <span class='success'> <?= $_SESSION['regTrue'] ?> </span>
<?php       } ?>
            <div class="form_inputs">
                <label for="first_name">First Name:</label>
                <input title="first_name" type="text" name="first_name">

                <label for="last_name">Last Name:</label>
                <input title="last_name" type="text" name="last_name">

                <label for="email">Email:</label>
                <input title="email" type="text" name="email">

                <label for="contact">Contact:</label>
                <input title="contact" type="text" name="contact">

                <label for="password">Password:</label>
                <input title="subject" type="password" name="password">

                <label for="confirm_password">Confirm Password:</label>
                <input title="subject" type="password" name="confirm_password">
            </div>
            <input type="hidden" name="form_type" value="register">
            <input class="sub" type="submit" name="submit" value="Register">
        </form>
        <!-- For Login -->
        <form id="login" action="process.php" method="post">
            <h1>Login</h1>
<?php       if (!empty($_SESSION['loginErr'])) { ?>
                <span><?= $_SESSION['loginErr'] ?></span>
<?php       $_SESSION['loginErr'] = '';
            } ?>
            <div class="form_inputs">
                <label for="email">Email:</label>
                <input title="email" type="text" name="email">

                <label for="passowrd">Password:</label>
                <input title="subject" type="password" name="password">
            </div>
            <input type="hidden" name="form_type" value="login">
            <input class="sub" type="submit" name="submit" value="Login">
            <input class="sub" type="submit" name="reset_password" value="Reset Password" />
        </form>
        <form action="process.php" method="post">
            <input id="reset" type="submit" name="reset" value="Reset Session">
            <input type="hidden" name="form_type" value="out">
        </form>
    </body>
</html>