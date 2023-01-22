<!DOCTYPE html>
<?php
$register_status = $vdata['register_status'];
$login_status = $this->session->userdata('login_status');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/authentication.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="forms" id="form_register">
            <form id="register" action="/register" method="post">
                <h1>Register</h1>
                <?php if ($register_status == TRUE) { ?>
                    <div id="success">
                        <p>Success! You have registered</p>
                    </div>
                <?php } else { ?>
                    <div id="errors">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php } ?>
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
        </div>
        <div class="forms" id="form_login">
            <form id="login" action="/log-in" method="post">
                <h1>Login</h1>
<?php               if ($login_status == 'no password') { ?>
                    <div id="errors">
                        <p>You have entered the wrong password</p>
                    </div>
<?php               } else if ($login_status == 'no account') { ?>
                    <div id="errors">
                        <p>This account does not exist</p>
                    </div>
<?php               } ?>
                <div class="form_inputs">
                    <label for="email">Email/Contact:</label>
                    <input title="email" type="text" name="email">

                    <label for="passowrd">Password:</label>
                    <input title="subject" type="password" name="password">
                </div>
                <input type="hidden" name="form_type" value="login">
                <input class="sub" type="submit" name="submit" value="Login">
            </form>
        </div>
    </main>
</body>

</html>