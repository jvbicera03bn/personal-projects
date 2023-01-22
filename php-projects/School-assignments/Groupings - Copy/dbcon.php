<?php
//create connection
$servername='remotemysql.com';
$username='KA95vMzAni';
$password='l6tot5fj4C';
$dbname = "KA95vMzAni";
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
function fetch_one($query){
        global $connection;
        $result = mysqli_query($connection, $query);
        $data = mysqli_fetch_all ($result, MYSQLI_ASSOC);
        return $data[0];
    }

?>
