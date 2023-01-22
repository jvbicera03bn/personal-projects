<?php

//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once "dbcon.php";
session_start();

if(isset($_SESSION['username'])){
    if($_SESSION['category']=="Administrator"){
        header('location: admindisplay.php');
    }elseif($_SESSION['category']=="User"){               
        header('location: display.php');
    }else{
    }
}

if(isset($_POST['Register'])) {

        echo "<script>window.location = 'registrationwithDB.php';</script>";
}

if(isset($_POST['Login'])) {
    $emailadd = $_POST['emailadd'];
    $schoolid = $_POST['schoolid'];
    $bday = $_POST['bday'];

$sql1 = mysqli_query($conn, "SELECT * FROM tblsecurity WHERE email='$emailadd' AND  school_id='$schoolid' AND  bday='$bday' AND status='Active' ");

   $count=0;

    while($row=mysqli_fetch_array($sql1))
    { 
    $count++;
        if ($count!=0)
            {
            $ids = $row['id'];
            $_SESSION['category'] = $row['category'];
            $_SESSION['username'] = $schoolid; 

            if($_SESSION['category']=="Administrator"){
                echo "<script>alert('Welcome ".$_SESSION['category']."!'); window.location = 'admindisplay.php?result=Successfully AdminLogin';</script>";
            }elseif($_SESSION['category']=="Student"){               
                echo "<script>alert('Welcome ".$_SESSION['category']."!'); window.location = 'display.php?result=Successfully UserLogin';</script>";
            }else{
                echo "<script>alert('Invalid Account Category!');</script>";      
            }

        }else{
            echo "<script>alert('Invalid Username and Password!');</script>";      
        }
    }
}

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
            <div class="col-lg-10">
                <div class="page-header">
                    <h2>Login Form</h2>
                </div>
                <p>Please fill all the required fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>* Email Address : </label>
                        <input type="email" name="emailadd" class="form-control" maxlength="" required="" placeholder="Enter Email Address" autocomplete="off">                  
                    </div>  
                    <div class="form-group">
                        <label>* School ID : </label>
                        <input type="text" name="schoolid" class="form-control" maxlength="" required="" placeholder="Enter School ID" autocomplete="off" >                      
                    </div> 
                    <div class="form-group">
                        <label>* Birthday : </label>
                        <input type="text" name="bday" class="form-control" maxlength="" required="" placeholder="Enter Birthday" autocomplete="off"  >                      
                    </div> 
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="Login" value=" Login ">                    
                    </div> 
                </form>
                <hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="Register" value="Register ( Not Registered Yet? )">                      
                    </div>                 
                </form>
            </div>
        </div>     
    </div>
</body>
</html>