<?php
//create connection
    $servername="localhost";
    $username="root";
    $password="";
    $dbname = "db_classrecord";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      
    //check connection
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>