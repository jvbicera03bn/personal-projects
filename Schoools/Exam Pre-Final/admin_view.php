<?php
session_start();
require_once "dbcon.php";
if(!isset($_SESSION["account_info"])){
    header("Location: index.php");
}
if(!empty($_POST["search"])){
    $searchword = $_POST['search_kword'];
    $records = fetch_all('SELECT * FROM tblsecurity LEFT JOIN tbl_studentinfo ON tblsecurity.id = tbl_studentinfo.id WHERE category = "student" lname ="'.$searchword.'" or fname = "'.$searchword.'" or mname = "'.$searchword.'"or suffix = "'.$searchword.'"');
}else{
    $records = fetch_all("SELECT * FROM tblsecurity LEFT JOIN tbl_studentinfo ON tblsecurity.id = tbl_studentinfo.id WHERE category = 'student'");
}
if(isset($_POST['logout'])){
    header("Location: index.php");
    unset($_SESSION["account_info"]);
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="logged_in.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <main>
        <div id="intro">
            <h1>Welcome <?=ucfirst($_SESSION['account_info'][0]['fname'])?> <?=ucfirst($_SESSION['account_info'][0]['lname'])?></h1>
        </div>
        <div id="search">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="search_kword" id="search" placeholder="Search for a name">
                <div id="searcheg">
                    <input class="searcheg" type="submit" value="Search" name="search">
                    <input class="searcheg" type="submit" value="Show All" name="showall">
                </div>
            </form>
        </div>
        <div class="tableFixHead">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>School ID</th>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Middle Name</th>  
                        <th>Last Name</th>
                        <th>Suffix</th>
                        <th>Birthday</th>
                        <th>Edit Grades</th>
                    </tr>
                </thead>
                <tbody>
<?php               foreach($records as $record){?>
                        <tr>
                            <td><?=$record['id']?></td>
                            <td><?=$record['school_id']?></td>
                            <td><?=$record['email']?></td>
                            <td><?=$record['fname']?></td>
                            <td><?=$record['mname']?></td>
                            <td><?=$record['lname']?></td>
                            <td><?=$record['suffix']?></td>
                            <td><?=$record['bday']?></td>
                            <td>
                                <form method="POST" action="studentgraderecord.php">
                                    <input type="submit" name="submit" value="Edit/Add">
                                    <input type="hidden" name="acc_id" value="<?=$record['school_id']?>">
                                </form>
                            </td>
                        </tr>
<?php               }?>
                </tbody>
            </table>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" value="Log Out" name="logout" />
        </form>          
    </main>
</body>
</html>