<?php 
session_start();
require("new-connection.php");

if (isset($_POST['contact'])){
    if (empty($_POST['contact'])){
        $_SESSION['contactErr'] = "Must provide a contact number";
        header('Location: index.php');
    }elseif (strlen($_POST['contact'])!= 11){
        $_SESSION['contactErr'] = "A valid contact number consists of 11 digits";
        header('Location: index.php');
    }elseif ($_POST['contact'][0]!= 0 or $_POST['contact'][1] != 9){
        $_SESSION['contactErr'] = "A valid contact number should start with 09";
        header('Location: index.php');
    }else {
        $query = "INSERT INTO `hhero`.`contacts`(`contact_num`,`created_at`,`updated_at`) VALUES ('" . $_POST['contact']."', now(), now());";
        run_mysql_query($query);
        header('Location: success.php');
        $_SESSION['insertedcontact'] = $_POST['contact'];
    }
}
if (isset($_POST['reset'])){
    session_destroy();
    unset($_POST['reset']);
    header('Location: index.php');
}
$query = "SELECT contact_num , DATE_FORMAT(created_at,'%m-%d-%Y %I:%i%p') as date_inserted FROM contacts;";
$_SESSION['raffle_entries'] = fetch_all($query);