<?php
//create connection
    $servername='localhost';
    $username='root';
    $password='1232';
    $dbname = "school2";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      
    //check connection
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>