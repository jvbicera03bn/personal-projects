Sabao_JS_IntegrativeProgramming&Technologies2_4BSIT1
4-BSIT1
Activity 4.1 - Attachment of work activity along with 3-5 minutes videoclips
Joemari Saysay Sabao, MIT
•
Dec 6
100 points
Due Dec 14, 11:59 PM
Attach the hosting link of your work activity about Example Answer to Pre-final Examination  along with 3-5 minutes videoclips ( Domain and Hosting of Activity with Database )"


TAKE NOTE : Update the "dbcon.php  or php file" that connect to database in relation or related to your host account  and create database and table as seen in the image attached

tbl_studinfo.png
Image

tblsecurity.png
Image

tblstudentrecords.png
Image

admindisplay.php
PHP

dbcon.php
PHP

del.php
PHP

display.php
PHP

index.php
PHP

registrationwithDB.php
PHP
Class comments
Your work
Assigned
Private comments
<?php
//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once "dbcon.php";
session_start();

if (isset($_POST['Logout'])) {                
    //Unset the variables stored in session
    unset($_SESSION['username']);
        echo "<script>alert('Successfully Logout!'); window.location = 'index.php?result=Successfully Logout';</script>";
}


if (!isset($_SESSION['username'])){
     header('location: index.php');
}else{

    if($_SESSION['category']=="Student")
    {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pre-final Examination</title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>STUDENT PERSONAL INFORMATION</h2>        
                <hr>
                </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="Logout" value="Logout">                      
                    </div> 
                    <br>
                    </form>
                    <div class="form-group">
  
                            <table width="100%" border="0"><tr>                                                            
<?php 

if (!isset($_POST['txtSearch'])) { 
    $_POST['txtSearch'] = "undefined";
}
$search = $_POST['txtSearch'];
$counter = 0;
        $sql = mysqli_query($conn, "SELECT * FROM tbl_studinfo WHERE school_id = '".$_SESSION['username']."' ");    
        while($row=mysqli_fetch_array($sql))
        {

?>   
                    <td><h2>Profile Information</h2>
                    <hr>   
                    </td>        
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>School ID</td>
                    <tr>
                    <th><?php echo $row['school_id']; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Fullname ( Last Name, First Name Middle Name Suffix Name)</i></td>
                    </tr><tr>
                    <th><?php echo $row['lname'].", ".$row['fname']." ".$row['mname']." ".$row['suffix']; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Gender</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo $row['gender']; ?></th> 
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Birthday</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo $row['bday']; ?></th> 
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Email Address</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo $row['email']; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Schedule/Enrolled Status</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo $row['studschedstats']; ?></th>                                                                                                           
                    </tr>
<?php

            $counter++;  
        }
        if($counter==0){
?>                      
  
                    <td><h2>Profile Information</h2>
                    <hr>   
                    </td>        
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>School ID</td>
                    <tr>
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Fullname ( Last Name, First Name Middle Name Suffix Name)</i></td>
                    </tr><tr>
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Gender</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Birthday</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Email Address</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>
                    </tr><tr>
                    <td style="background-color:green;color:white;"><i>Schedule/Enrolled Status</i></td>                                                               
                    </tr><tr>  
                    <th><?php echo "********* NO RECORD FOUND! *********"; ?></th>                                                                                                        
                    </tr>                                        
<?php
        }          
    
  
?>
                        </table>
                    </div>
            <hr>          
            <br>                                             
            </div>
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>Student Grade</h2>
                <hr>            
                </div>
                    <div class="form-group">                        
                            <table width="100%" border="1"><tr>                                                            
                                <td width="16%" style="text-align:center;background-color:green;color:white;">Prelim</i></td> 
                                <td width="16%" style="text-align:center;background-color:green;color:white;">Midterm</td> 
                                <td width="16%" style="text-align:center;background-color:green;color:white;">Prefinal</td>
                                <td width="16%" style="text-align:center;background-color:green;color:white;">Final</td>
                                <td width="16%" style="text-align:center;background-color:green;color:white;">Average</td>                                
                                <td width="" style="text-align:center;background-color:green;color:white;">Remarks</td>                                                                                                                                                              
                            </tr>  
<?php

$sql2 = mysqli_query($conn, "SELECT * FROM tblstudentrecords WHERE school_id='".$_SESSION['username']."' ");
$counter2 = 0;
    while($row2=mysqli_fetch_array($sql2))
    { 
    $counter2++;             
?>          
                        <tr>
                        <td><?php echo $row2['prelim']; ?></td>
                        <td><?php echo $row2['midterm']; ?></td>                        
                        <td><?php echo $row2['prefinal']; ?></td>
                        <td><?php echo $row2['final']; ?></td>
                        <td><?php echo $row2['average']; ?></td>                        
                        <td><?php echo $row2['remarks']; ?></td>                                                                                                   
                        </tr>
<?php
    }

    if ($counter2==0){
?>                      
                        <tr><td colspan="6" style="text-align:center;"><i><?php echo "********* NO RECORD FOUND! *********"; ?></i></td></tr>                  
<?php
    }   
    mysqli_close($conn);    
?>    

                        </table>                
                    </div>
                </div>
            </div> 
            <hr>          
            <br>                     
        </div>     
    </div>
</body>
</html>
<?php

    }elseif($_SESSION['category']=="Administrator"){               
        header('location: admindisplay.php');
    }else{
        header('location: index.php');      
    }

}
?>
display.php
Displaying display.php.