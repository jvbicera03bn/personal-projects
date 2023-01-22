<?php 
session_start();
require("new-connection.php");

if(isset($_POST['subject'])){
    if (empty($_POST['subject'])){
        array_push($_SESSION['inputErr'], "Must specify a subject");
        header("Location: index.php");
    }elseif(strlen($_POST['subject']) > 50){
        array_push($_SESSION['inputErr'], "Subject is too long must be at least 50 characters");
        header("Location: index.php");
    }
}
if (isset($_POST['detail'])) {
    if (empty($_POST['detail'])) {
        array_push($_SESSION['inputErr'], "Must Include Details");
        header("Location: index.php");
    } elseif (strlen($_POST['detail']) < 250) {
        array_push($_SESSION['inputErr'], "Details is too short must be at least 150 characters");
        header("Location: index.php");
    }
}
if (empty($_SESSION['inputErr'])){ // IF THERES NO ERROR THIS WILL RUN 
    $query = "INSERT INTO `hhero`.`bulletin_board`(`subject`,`details`,`created_at`,`updated_at`)VALUES('". ($_POST['subject']) ."','". $_POST['detail'] ."', now(),now());";
    run_mysql_query($query);
    header('Location: main.php');
}

if (isset($_POST['skip'])){
    header('Location: main.php');
}
if (isset($_POST['reset'])){
    session_destroy();
    unset($_POST['reset']);
    header('Location: index.php');
}
?>