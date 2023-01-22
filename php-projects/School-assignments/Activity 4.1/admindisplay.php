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

    if($_SESSION['category']=="Administrator")
    {



if (isset($_POST['Submit'])) {
    $schoolid = $_POST['schoolid'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $prefinal = $_POST['prefinal'];
    $final = $_POST['final'];     
    $remarks = $_POST['remarks']; 
    $average = (($prelim + $midterm + $prefinal + $final)/4);  

    $sql4 = mysqli_query($conn, "SELECT * FROM tbl_studinfo WHERE school_id='$schoolid' ");
    $count2=0;

    while($row=mysqli_fetch_array($sql4))
    { 
    $count2++;
        if ($count2==1)
        {
            $sql5 = mysqli_query($conn, "SELECT * FROM tblstudentrecords WHERE school_id ='$schoolid' ");
            $count6=0;

            while($row6=mysqli_fetch_array($sql5))
            { 
                $count6++;    
                echo "<script>alert('Student Records Already Graded!');</script>";  
            } 
                if($count6 == 0)
                {
                     //check if the value entered each fields where valid names of characters and not numeric value
                    if( (!is_numeric($prelim)) || (!is_numeric($midterm)) || (!is_numeric($prefinal)) || (!is_numeric($final)) ){

                        if (!is_numeric($prelim)) {
                             $prelim_error = "Please enter a valid value for Prelim";
                        }

                        if (!is_numeric($midterm)) {
                             $midterm_error = "Please enter a valid value for Midterm";
                        }

                        if (!is_numeric($prefinal)) {
                             $prefinal_error = "Please enter a valid value for Prefinal";
                        }

                        if (!is_numeric($final)) {
                             $final_error = "Please enter a valid value for Final";
                        }          

                    }else{

                         //PHP MySQL Insert Data - The INSERT INTO statement is used to add new records to a table of a database: 
                         $result = mysqli_query($conn, "INSERT INTO tblstudentrecords (id,school_id,prelim,midterm,prefinal,final,average,remarks) VALUES (NULL,'$schoolid','$prelim','$midterm','$prefinal','$final', '$average','$remarks')");
                                            echo "<script>alert('Successfully Recorded! ');</script>";      
                    }

                }

        }else{
            echo "<script>alert('Multiple Records With The Same Student Number Found!');</script>";
        }        
    }
        if( $count2==0){
           echo "<script>alert('Student Records / Student Number Not Found!');</script>"; 
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
            <div class="col-lg-11">
                <div class="page-header">
                    <h2>LIST OF REGISTERED STUDENTS</h2>                            
                </div> 
            </div> 
            <div class="col-lg-1">
                <div class="page-header"> 
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                     
                        <input type="submit" class="btn btn-primary" name="Logout" value="Logout">                      
                    </form>
                </div> 
            </div>                        
        </div>    
        <hr> 
        <br>   
        <div class="row">


            <div class="col-lg-4">
                <div class="page-header">                              
                    <h2>Record Form</h2>
                </div>
                <p>Please fill all the required fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                        <label>* School ID : </label>
                        <input type="text" name="schoolid" class="form-control" value="" maxlength="" placeholder="Enter Prelim Grade ( if any... )">
                        <span class="text-danger"><?php if (isset($schoolid_error)) echo $schoolid_error; ?></span>                        
                    </div>
                    <div class="form-group ">
                        <label>Prelim Grade : </label>
                        <input type="text" name="prelim" class="form-control" value="" maxlength="" placeholder="Enter Prelim Grade ( if any... )">
                        <span class="text-danger"><?php if (isset($prelim_error)) echo $prelim_error; ?></span>                        
                    </div>
                    <div class="form-group">
                        <label>Midterm Grade: </label>
                        <input type="text" name="midterm" class="form-control" value="" maxlength="" placeholder="Enter Midterm Grade ( if any... )" >
                         <span class="text-danger"><?php if (isset($midterm_error)) echo $midterm_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>Prefinal Grade : </label>
                        <input type="text" name="prefinal" class="form-control" value="" maxlength="" required="" placeholder="Enter Prefinal Grade ( if any... )" >
                         <span class="text-danger"><?php if (isset($prefinal_error)) echo $prefinal_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>Final Grade</label>
                        <input type="text" name="final" class="form-control" value="" maxlength="" placeholder="Enter Final Grade ( if any... )" >
                         <span class="text-danger"><?php if (isset($final_error)) echo $final_error; ?></span>                       
                    </div>  
                    <div class="form-group">
                        <label>Remarks</label>
                        <select name="remarks" class="form-control" required="" >
                            <option value="">Select Remarks</option>
                            <option value="Passed">Passed</option>
                            <option value="Failed">Failed</option>                            
                        </select>                      
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="Submit" value="Submit">                      
                    </div> 
                </form>
            </div>

            <div class="col-lg-8">
                <div class="page-header">
                    <h2>Class Records</h2>        
                </div>
                    <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                            <table width="100%" ><tr>
                                <td width="10%"> Search: </td>
                                <td width="80%"><input type="text" id="txtSearch" name="txtSearch" class="form-control" value="" maxlength="" placeholder="Search by ( e.g. ID Number, Remarks )" ></td>
                                <td><input type="submit" class="btn btn-primary" name="Search" value="Search"></td> 
                            </tr></table>
                     </form>  
                    </div>                     
                    <div class="form-group"> 
                            <table width="100%" border="1"><tr>                                                      
                                <td width="2" colspan="" style="text-align:center;background-color:green;color:white;"></td>                                    
                                <td width="4%" style="text-align:center;background-color:green;color:white;">No.</td>                               
                                <td width="5%" style="text-align:center;background-color:green;color:white;">ID</i></td>
                                <td style="text-align:center;background-color:green;color:white;">Fullname <br><i> ( LastName, FirstName MiddleName Suffix ) </i></td>                                
                                <td width="6%" style="text-align:center;background-color:green;color:white;">Prelim</i></td> 
                                <td width="8%" style="text-align:center;background-color:green;color:white;">Midterm</td> 
                                <td width="8%" style="text-align:center;background-color:green;color:white;">Prefinal</td>
                                <td width="6%" style="text-align:center;background-color:green;color:white;">Final</td>
                                <td width="5%" style="text-align:center;background-color:green;color:white;">Avg.</td>                                
                                <td width="6%" style="text-align:center;background-color:green;color:white;">Remarks</td>                                                                                                                                                                                             
                            </tr>  
<?php 

if (!isset($_POST['txtSearch'])) { 
    $_POST['txtSearch'] = "undefined";
}
$search = $_POST['txtSearch'];
$counter = 0;
    if ($search=="undefined" || $search==""){
        $sql = mysqli_query($conn, "SELECT * FROM tblstudentrecords ");
    }else{
        $sql = mysqli_query($conn, "SELECT * FROM tblstudentrecords WHERE id LIKE '$search%' OR school_id LIKE '$search%' OR prelim LIKE '$search%' OR midterm LIKE '$search%' OR prefinal LIKE '$search%' OR final LIKE '$search%' OR remarks LIKE '$search%'");
    }  
        while($row=mysqli_fetch_array($sql))
        {

$sql2 = mysqli_query($conn, "SELECT * FROM tbl_studinfo WHERE school_id='".$row['school_id']."' ");

   $count=0;

    while($row2=mysqli_fetch_array($sql2))
    { 
    $count++;
        if ($count!=0)
            {
            $ids = $row2['id'];
            $lname = $row2['lname'];
            $fname = $row2['fname']; 
            $mname = $row2['mname']; 
            $suffix = $row2['suffix'];              

?> 
                        <tr><TD ALIGN="CENTER"><a href="del.php?SID=<?php echo $row['school_id']; ?>"><IMG SRC="images/del.png"></a></TD>      
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['school_id']; ?></td>
                        <td><?php echo $lname.", ".$fname." ".$mname." ".$suffix; ?></td>
                        <td><?php echo $row['prelim']; ?></td>
                        <td><?php echo $row['midterm']; ?></td>                        
                        <td><?php echo $row['prefinal']; ?></td>
                        <td><?php echo $row['final']; ?></td>
                        <td><?php echo $row['average']; ?></td>                        
                        <td><?php echo $row['remarks']; ?></td>                                                                                                   
                        </tr>
<?php

            }
            else{

            }
    }
            $counter++;  
        }
        if($counter==0){
?>                      
                        <tr><td colspan="8" style="text-align:center;"><i><?php echo "********* NO RECORD FOUND! *********"; ?></i></td></tr>                  
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

<?php

    }elseif($_SESSION['category']=="Student"){               
        header('location: display.php');
    }else{
        header('location: index.php');      
    }

}
?>
