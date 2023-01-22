<?php
session_start();
ini_set('display_errors', 1);
if (isset($_GET['reset'])){
    session_destroy();
    unset($_GET['reset']);
    header('location: index.php');
}
if(isset($_SESSION['errors'])){
    $_SESSION['dateErr'] = $_SESSION['fnameErr'] = 
    $_SESSION['lnameErr'] = $_SESSION['emailErr'] = 
    $_SESSION['ISSUETitleErr'] = $_SESSION['ISSUEdetailErr'] = '';
    unset($_SESSION['errors']);
}

if (isset($_POST['date'])) {
    if (empty($_POST['date'])) {
        $_SESSION['dateErr'] = "Date is required";
        $_SESSION['errors'] = TRUE;
        
    }
}
if (isset($_POST['first_name'])) {
    if (empty($_POST['first_name'])) {
        $_SESSION['fnameErr'] = "First Name is required";
        $_SESSION['errors'] = TRUE;
        
    } elseif (preg_match('~[0-9]+~', $_POST['first_name'])) {
        $_SESSION['fnameErr'] = "First Name should not include numbers";
        $_SESSION['errors'] = TRUE;
        
    }
}
if (isset($_POST['last_name'])) {
    if (empty($_POST['last_name'])) {
        $_SESSION['lnameErr'] = "Last Name is required";
        $_SESSION['errors'] = TRUE;
        
    } elseif (preg_match('~[0-9]+~', $_POST['last_name'])) {
        $_SESSION['lnameErr'] = "Last Name should not include numbers";
        $_SESSION['errors'] = TRUE;
        
    }
}
if (isset($_POST['email'])) {
    if (empty($_POST['email'])) {
        $_SESSION['emailErr'] = "Email is required";
        $_SESSION['errors'] = TRUE;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailErr'] = "Email is not valid";
    }
}
if (isset($_POST['issue_title'])) {
    if (empty($_POST['issue_title'])) {
        $_SESSION['ISSUETitleErr'] = "Issue Title is required";
        $_SESSION['errors'] = TRUE;
        
    } else if (strlen($_POST['issue_title']) <= 50 && strlen($_POST['issue_title'] > 0)) {
        $_SESSION['ISSUETitleErr'] = "The issue title should not be more than 50 characters.";
        $_SESSION['errors'] = TRUE;
        
    }
}
if (isset($_POST['issue_details'])) {
    if (empty($_POST['issue_details'])) {
        $_SESSION['ISSUEdetailErr'] = "Issue Details is required";
        $_SESSION['errors'] = TRUE;
        
    } else if (strlen($_POST['issue_details']) <= 250 && strlen($_POST['issue_details'] > 0)) {
        $_SESSION['ISSUEdetailErr'] = "Issue details should not be more than 250 characters.";
        $_SESSION['errors'] = TRUE;
    }
}

if (!isset($_SESSION['errors'])) {
    $_SESSION['noErr'] = 'Thank you for your patience! Please wait a response from our IT team.';
    header('location: index.php');
    unset($_SESSION['errors']);
}else {
    header('location: index.php');
}
?>