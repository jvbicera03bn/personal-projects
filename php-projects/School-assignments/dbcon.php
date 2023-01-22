<?php
//create connection
$servername='sql311.epizy.com';
$username='epiz_33012106';
$password='CTNkHzZEItPDb5i';
$dbname = "epiz_33012106_schooltesting";
$connection = mysqli_connect($servername,$username,$password,"$dbname");
    //check connection
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
    }

?>
