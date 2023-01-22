<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question Number 5</title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">

                <div class="page-header">
                    <h2>Answer of Question Number 5</h2>
                </div>            
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<?php
require_once "dbcon.php";
session_start();
$txtValue ="";
$sum = "";
        //Number of  Subjects Group....
        if (isset($_POST['SubmitNumSubject'])) {
            if (is_numeric($_POST['txtValue'])){
                $txtValue = $_POST['txtValue'];
                // Set session variables
                $_SESSION["txtValue"] = $_POST['txtValue'];    
                $txtSubject[]="";
                $_SESSION["txtSubjects[]"]="";
?>
                <p>Please fill the fields to compute the average of subject(s) entered by the user</p>
<?php
            for($x=0; $x<$txtValue; $x++){
                $counter = $x + 1;    
?>
                    <div class="form-group">
                        <label>* No. <?php echo $counter; ?> - Subject Name : </label>
                        <input type="text" name="<?php echo "subject".$x; ?>" class="form-control" value="" maxlength="30" required="" placeholder="Enter Subject Name Number <?php echo $counter." - subject".$x; ?>">                        
                    </div>        
<?php
            }
?>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" name="SubmitNamesSubject" value="Submit Subject(s)">                      
                    </div> 
                    <br>   
<?php
            }else{
                     echo "<script>alert('A - INVALID INPUT!, You have Entered a String(s)/Character! ');</script>";   
                     unset($_SESSION['txtValue']);          
            }
        }   

        //Number of Subject Group...
        if (!isset($_POST['SubmitNamesSubject']) && (!is_numeric($txtValue))){  
?>
                <p>Please fill the fields to compute the average of subject(s) entered by the user</p>
                <div class="form-group">
                    <label>* Enter the Number of Subject(s) to Compute : </label>
                    <input type="text" name="txtValue" class="form-control" value="<?php if (isset($_SESSION["txtValue"])){ echo $_SESSION["txtValue"]; } ?>" maxlength="30" required="">                        
                </div> 
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="SubmitNumSubject" value="Submit">                      
                </div> 
                <br>                            
<?php
        }        


        if (isset($_POST['SubmitGradesSubject']) ) {
   

                $txtSubject[]="";
                    for($m=0; $m < $_SESSION["txtValue"]; $m++){                       
                        $counter = $m + 1;            
                        $sum = $sum + $_POST['grade'.$m];
                        $_SESSION["txtGrades[".$m."]"] = $_POST['grade'.$m];
                    }
               
                     if(!is_numeric($sum) || $sum==0){  
                    echo "<script>alert('B - INVALID GRADE(S) VALUE! or You have Entered a String(s)/Character!');</script>"; 
                    unset($_SESSION['txtValue']);                                      
                    }else{
                        echo "The Average Grade of ".$_SESSION["txtValue"]." Subject(s) [ ";
                        for($p=0; $p<$_SESSION["txtValue"]; $p++){            
                            if( $p == ($_SESSION["txtValue"])-2 )  {         
                                echo "<b>".$_SESSION["txtSubjects[".$p."]"]." ( ".$_SESSION["txtGrades[".$p."]"]." ) </b>, and ";
                            }else if( $p == ($_SESSION["txtValue"])-1 )  {         
                                echo "<b>".$_SESSION["txtSubjects[".$p."]"]." ( ".$_SESSION["txtGrades[".$p."]"]." ) </b> ";
                            }else{
                                echo "<b>".$_SESSION["txtSubjects[".$p."]"]." ( ".$_SESSION["txtGrades[".$p."]"]." ) </b>, ";
                            }
                        }

                echo "  ] is <b> ".($sum/$_SESSION["txtValue"])."</b>";
                $result = mysqli_query($conn, "INSERT INTO tblgrades (id,averages) VALUES ('','".($sum/$_SESSION["txtValue"])."')");

                unset($_SESSION['txtValue']);
            }

        }

        if (!isset($_POST['SubmitNumSubject']) && isset($_POST['SubmitNamesSubject'])) {          
?>             
                <p>Please fill the fields to compute the average of subject(s) entered by the user</p>
<?php
        for($i=0; $i < $_SESSION["txtValue"]; $i++){               
            $counter = $i + 1;             
            $txtSubject[] = $_POST['subject'.$i];
            $_SESSION["txtSubjects[".$i."]"] = $_POST['subject'.$i];
?>
                <div class="form-group">
                    <label>* No. <?php echo $counter." - <b>".$txtSubject[$i]; ?></b> Grade : </label>
                    <input type="text" name="<?php echo "grade".$i; ?>" class="form-control" value="" maxlength="30" required="" placeholder="grade<?php echo $i; ?>">                        
                </div>                
<?php
}
?>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="SubmitGradesSubject" value="Computer ( Average )">                      
                </div> 
                <br>     
<?php

    
    }
?>

                </form>
                <br>
            </div>
        </div>     
    </div>
</body>
</html>               