<?php
session_start();
require("new-connection.php");
$query = "SELECT email, contact_num FROM user;";
$user_acc = fetch_all($query);
/* Validation Register*/
if ($_POST['form_type'] === 'register') {
    /* first name*/
    if (empty($_POST['first_name'])) {
        $_SESSION['registerErr'][] = 'Must include First Name';
    } elseif(strlen($_POST['first_name']) <= 2) {
        $_SESSION['registerErr'][] = 'Must be more than 2 characters long';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $_POST['first_name'])) {
        $_SESSION['registerErr'][] = 'First Name must only include letters';
    }
    /* lastname */
    if (empty($_POST['last_name'])) {
        $_SESSION['registerErr'][] = 'Must include Last Name';
    } elseif (strlen($_POST['last_name']) <= 2) {
        $_SESSION['registerErr'][] = 'Must be more than 2 characters long';
    } elseif (!preg_match('/^[a-zA-Z]+$/', $_POST['last_name'])) {
        $_SESSION['registerErr'][] = 'Last name Must only include letters';
    }
    /* email */
    if (empty($_POST['email'])) {
        $_SESSION['registerErr'][] = 'Must include Email';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registerErr'][] = 'Not a valid Email';
    }
    /*contact*/
    if (empty($_POST['contact'])) {
        $_SESSION['registerErr'][] = 'Must include Contact Number';
    } elseif (!preg_match('/^[0-9]+$/', $_POST['contact'])) {
        $_SESSION['registerErr'][] = 'Contact number must only include Number';
    }
    /* password */
    if (empty($_POST['password'])) {
        $_SESSION['registerErr'][] = 'Must include Password';
    } elseif (strlen($_POST['password']) >= 8) {
        $_SESSION['registerErr'][] = 'Password is too long';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $_SESSION['registerErr'][] = 'Password and confirm password Doesnt match';
    }
    /* confirm password */
    if (empty($_POST['confirm_password'])) {
        $_SESSION['registerErr'][] = 'Must include Confrim Password';
    } elseif (strlen($_POST['confirm_password']) >= 8) {
        $_SESSION['registerErr'][] = 'Password is too long';
    }
    /* Extra if you registered using the same cp number and email it will not let you register */
    foreach ($user_acc as $accs) {
        if ($accs['email'] == $_POST['email']) {
            $_SESSION['registerErr'][] = 'This Email is already in use';
        }
        if ($accs['contact_num'] == $_POST['contact']) {
            $_SESSION['registerErr'][] = 'This Contact number is already in use';
        }
    }
    /* if everthing pass a reg query will run */
    if (empty($_SESSION['registerErr'])) {
        /* Initialize Variables */
        $first_name_reg = escape_this_string($_POST['first_name']);
        $last_name_reg = escape_this_string($_POST['last_name']);
        $emailreg = escape_this_string($_POST['email']);
        $contact_reg = escape_this_string($_POST['contact']);
        $password = escape_this_string($_POST['password']);
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($password . '' . $salt);
        /* put query inside a variable */
        $query = "INSERT INTO `encryption`.`user`(`first_name`,`last_name`,`email`,`contact_num`,`password`,`salt`,`created_at`,`updated_at`)
            VALUES('{$first_name_reg}','{$last_name_reg}','{$emailreg}','{$contact_reg}','{$encrypted_password}','{$salt}',NOW(),NOW());";
        /* run the query using the giving function */
        run_mysql_query($query);
        $_SESSION['regTrue'] = 'Congratulations, You have successfully created your account';
        header('Location:index.php');
        exit();
    } else {
        header('Location:index.php');
        exit();
    }
}
/* Validation Login*/
if ($_POST['form_type'] === 'login') {
    $email = escape_this_string($_POST['email']);
    $password = escape_this_string($_POST['password']);
    $query = "SELECT * FROM user WHERE email = '{$email}'";
    $user = fetch_all($query);
    if (count($user) > 0) {
        var_dump($user);
        $encrypted_password = md5($password . '' . $user[0]['salt']);
        if ($user[0]['password'] == $encrypted_password) {
            $query = "SELECT user_id ,first_name, last_name, email, contact_num FROM user WHERE email = '{$email}'";
            $_SESSION['personal_infos'] = fetch_all($query);
            $_SESSION['log_status'] = TRUE;
            header('Location: main.php');
            exit();
        }
    } else {
        $_SESSION['loginErr'] = 'This account does not exist';
        header('Location: index.php');
        exit();
    }
}
if (isset($_POST['reset_password'])) {
    header('Location: reset_password.php');
    exit();
    unset($_POST['reset_password']);
}
if (isset($_GET['reset_pass'])) {
    if (empty($_POST['reset_password'])) {
        $_SESSION['resetErr'] = 'Must provide a contact';
        header('Location: reset_password.php');
        exit();
        unset($_SESSION['resetErr']);
    } else {
        $contact = escape_this_string($_GET['contact']);
        $query = "SELECT * FROM user WHERE contact_num = '{$contact}'";
        $user = fetch_all($query);
        $default_password = md5('village88' . '' . $user[0]['salt']);
        $query = "UPDATE `encryption`.`User` SET `password` = '{$default_password}' WHERE (`contact_num` = '{$contact}');";
        run_mysql_query($query);
    }
}
if ($_POST['form_type'] === 'out_main') {
    $_SESSION['log_status'] = FALSE;
    header('Location: main.php');
    exit();
}
//reset session button for easy debug 
if ($_POST['form_type'] === 'log_in_main' or $_POST['form_type'] === 'out') {
    session_destroy();
    header('Location: index.php');
    exit();
}
if ($_POST['form_type'] === 'review') {
    $query = "INSERT INTO `encryption`.`reviews`(`content`,`created_at`,`updated_at`,`user_id`)
    VALUES('{$_POST['review_content']}',now(),now(),'{$_SESSION['personal_infos'][0]['user_id']}');";
    run_mysql_query($query);
    header('Location: main.php');
    exit();
}
if ($_POST['form_type'] === 'reply') {
    $query = "INSERT INTO `encryption`.`reply`(`content`,`created_at`,`updated_at`,`review_id`,`user_id`)
    VALUES('{$_POST['reply_content']}',now(),now(),'{$_POST['review_id']}','{$_SESSION['personal_infos'][0]['user_id']}');";
    run_mysql_query($query);
    header('Location: main.php');
    exit();
}
