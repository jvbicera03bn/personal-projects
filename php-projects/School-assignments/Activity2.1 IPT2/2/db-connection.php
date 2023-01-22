<?php
//create connection
$servername ='localhost:3306';
$username='root';
$password='1232';
$dbname='school';
$conn = mysqli_connect($servername,$username,$password,"$dbname");
//Check connection
    if(!$conn){
        die('Unable to connect to database' . mysqli_connect_error());
    }
?>