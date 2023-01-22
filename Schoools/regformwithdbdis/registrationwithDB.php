<?php

//The require_once expression is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once "dbcon.php";

if (isset($_POST['Register'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];


            //check if the value entered each fields where valid names of characters and not numeric value
             if( (is_numeric($fname)) || (is_numeric($lname)) || (is_numeric($gender)) ){

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
 $result = mysqli_query($conn, "INSERT INTO tbl_registration (fname,mname,lname,suffix,gender) VALUES ('" . $fname. "','".$mname."','".$lname."','".$suffix."','".$gender."')");


                    echo "<script>alert('Successfully Recorded! ');</script>";   
                }else{
                }
            }
            
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Registration</title>
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
                        <input type="text" name="fname" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>                        
                    </div>

                    <div class="form-group">
                        <label>Middle Name : </label>
                        <input type="text" name="mname" class="form-control" value="" maxlength="8" >
                         <span class="text-danger"><?php if (isset($mname_error)) echo $mname_error; ?></span>                       
                    </div>  

                    <div class="form-group">
                        <label>* Last Name : </label>
                        <input type="text" name="lname" class="form-control" value="" maxlength="8" required="">
                         <span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>                       
                    </div>  


                    <div class="form-group">
                        <label>Suffix : </label>
                        <input type="text" name="suffix" class="form-control" value="" maxlength="8" >
                         <span class="text-danger"><?php if (isset($suffix_error)) echo $suffix_error; ?></span>                       
                    </div>  

                    <div class="form-group">
                        <label>* Gender : </label>
                        <select name="gender" class="form-control" required="">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>                            
                        </select>                      
                    </div>  
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="Register" value="Register">                      
                    </div> 
                    <br>
                </form>
                <hr>
                <div class="page-header">
                    <h2>List of Records</h2>
                </div>
                    <div class="form-group">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <table width="100%" ><tr>
                                <td width="10%"> Search : </td>
                                <td width="85%"><input type="text" id="txtSearch" name="txtSearch" class="form-control" value="" maxlength="" placeholder="Search by ( e.g. ID Number, Last Name, First Name, Middle Name, Suffix" ></td>
                                <td><input type="submit" class="btn btn-primary" name="Search" value="Search"></td> 
                            </tr></table>
                        </form>

                            <table width="100%" border="1">
                                <tr>                                                            
                                    <th width="10%" style="text-align:center;background-color:green;color:white;">No.</th>
                                    <th style="text-align:center;background-color:green;">First Name</th>
                                    <th style="text-align:center;background-color:green;">Middle Name</th>
                                    <th style="text-align:center;background-color:green;">Last Name</th>
                                    <th style="text-align:center;background-color:green;">Suffix</th>
                                    <th style="text-align:center;background-color:green;">Gender</th>
                                </tr>  

<?php 

if (!isset($_POST['txtSearch'])) { 
    $_POST['txtSearch'] = "undefined";
}
$search = $_POST['txtSearch'];
$counter = 0;
    if ($search=="undefined" || $search==""){
        $sql = mysqli_query($conn, "SELECT * FROM tbl_registration ");
    }else{
        $sql = mysqli_query($conn, "SELECT * FROM tbl_registration WHERE id LIKE '$search%' OR lname LIKE '$search%' OR fname LIKE '$search%' OR mname LIKE '$search%' OR suffix LIKE '$search%'  ");
    }  


        while($row=mysqli_fetch_array($sql))
        {

?>          
                        <tr><td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname'] ?></td>
                        <td><?php echo $row['mname'] ?></td>
                        <td><?php echo $row['lname'] ?></td>
                        <td><?php echo $row['suffix'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        </tr>
<?php
           
            $counter++;  
        }
        if($counter==0){
?>                      
                        <tr><td colspan="3" style="text-align:center;"><i><?php echo "********* NO RECORD FOUND! *********"; ?></i></td></tr>                  
<?php
        }          
    
    mysqli_close($conn);
?>
                        </table>
                    </div> 

                                

            </div>
        </div>     
    </div>
</body>
</html>