<?php

//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once "dbcon.php";

if (isset($_POST['Login'])) {

        echo "<script>window.location = 'index.php';</script>";
}
if (isset($_POST['Register'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];     
    $email = $_POST['emailadd'];
    $bday = $_POST['bday'];
    $schoolid = $_POST['schoolid'];
    $schedstats = $_POST['schedstats'];
    $category = $_POST['category'];
    $status = $_POST['status'];   


            $sql5 = mysqli_query($conn, "SELECT * FROM tbl_studinfo WHERE school_id ='$schoolid' ");
            $count6=0;

            while($row6=mysqli_fetch_array($sql5))
            { 
                $count6++;    
                echo "<script>alert('Record(s) With The Same Student Number Found!');</script>";
            } 
                if($count6 == 0)
                {
                    //check if the value entered each fields where valid names of characters and not numeric value
                    if( (is_numeric($fname)) || (is_numeric($mname)) || (is_numeric($lname)) || (is_numeric($suffix)) ){

                        if (is_numeric($fname)) {
                             $fname_error = "Please enter a valid value for First Name";
                        }

                        if (is_numeric($mname)) {
                             $mname_error = "Please enter a valid value for Middle Name";
                        }

                        if (is_numeric($lname)) {
                             $lname_error = "Please enter a valid value for Last Name";
                        }

                        if (is_numeric($suffix)) {
                             $suffix_error = "Please enter a valid value for Suffix";
                        }          

                    }else{

                        if( (isset($fname)) && (isset($lname)) && (isset($gender)) ){

                            //PHP MySQL Insert Data - The INSERT INTO statement is used to add new records to a table of a database: 
                            $result = mysqli_query($conn, "INSERT INTO tbl_studinfo (id,school_id,lname,fname,mname,suffix,gender,bday,email,studschedstats) VALUES (NULL,'$schoolid','$lname','$fname','$mname','$suffix','$gender','$bday','$email','$schedstats')");

                            $result2 = mysqli_query($conn, "INSERT INTO tblsecurity (id,email,school_id,bday,category,status) VALUES (NULL,'$email','$schoolid','$bday','$category','$status')");

                            echo "<script>alert('Successfully Recorded! ');</script>";   

                        }else{
                        }
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
                    <h2>Simple Registration Form</h2>
                </div>
                <p>Please fill all the required fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                        <label>* First Name : </label>
                        <input type="text" name="fname" class="form-control" value="" maxlength="30" required="" placeholder="Enter First Name">
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>                        
                    </div>
                    <div class="form-group">
                        <label>Middle Name : </label>
                        <input type="text" name="mname" class="form-control" value="" maxlength="8" placeholder="Enter Middle Name ( if any... )" >
                         <span class="text-danger"><?php if (isset($mname_error)) echo $mname_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>* Last Name : </label>
                        <input type="text" name="lname" class="form-control" value="" maxlength="8" required="" placeholder="Enter Last Name" >
                         <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>Suffix : </label>
                        <input type="text" name="suffix" class="form-control" value="" maxlength="8" placeholder="Enter Suffix ( if any... )" >
                         <span class="text-danger"><?php if (isset($suffix_error)) echo $suffix_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>* Gender : </label>
                        <select name="gender" class="form-control" required="" >
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>                            
                        </select>                      
                    </div>
                    <div class="form-group">
                        <label>* Birthday : </label>
                        <input type="text" name="bday" class="form-control" maxlength="" required="" placeholder="Enter Birthday" >                      
                    </div> 
                    <div class="form-group">
                        <label>* Email Address : </label>
                        <input type="email" name="emailadd" class="form-control" maxlength="" required="" placeholder="Enter Email Address">                  
                    </div>  
                    <div class="form-group">
                        <label>* School ID : </label>
                        <input type="text" name="schoolid" class="form-control" maxlength="" required="" placeholder="Enter School ID" >                      
                    </div>  
                    <div class="form-group">
                        <label>* Status : </label>
                        <select name="schedstats" class="form-control" required="" >
                            <option value="">Select Status</option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>                            
                        </select>                      
                    </div> 
                    <div class="form-group">
                        <label>* Account Category : </label>
                        <select name="category" class="form-control" required="" >
                            <option value="">Select Account Category</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Student">Student</option>                            
                        </select>                      
                    </div>                    
                    <div class="form-group">
                        <label>* Account Status : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" class="form-check-input" required="" value="Active"> Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" class="form-check-input" required="" value="Inactive">  Inactive                       
                    </div>                      
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="Register" value="Register">                      
                    </div> 
                </form>
                <hr>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="Login" value="Login ( Already Registered? )">                      
                    </div>                 
                </form>                

                                

            </div>
        </div>     
    </div>
</body>
</html>
