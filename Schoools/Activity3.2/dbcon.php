<?php
//create connection
/* $servername='sql311.epizy.com';
$username='epiz_33012106';
$password='CTNkHzZEItPDb5i';
$dbname = "epiz_33012106_schooltesting"; */
$servername='127.0.0.1:3307';
$username='root';
$password='';
$dbname = "register_login";
$connection = mysqli_connect($servername,$username,$password,$dbname);
    //check connection
if(!$connection){
    die('Could not Connect MySql Server:' .mysql_error());
    }
/* Function For easy use */
/* Get an array of SELECT statement */
function fetch_all($query){
        global $connection;
        $result = mysqli_query($connection, $query);
        return mysqli_fetch_all ($result, MYSQLI_ASSOC);
    }
?>
