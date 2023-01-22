<?php
session_start();
if(!isset($_SESSION["account_info"])){
    header("Location: login.php");
}
require_once "dbcon.php";
if(!empty($_POST["search"])){
    $searchword = $_POST['search_kword'];
    $records = fetch_all('SELECT * FROM register_login WHERE lastname ="'.$searchword.'"or firstname = "'.$searchword.'"');
}else{
    $records = fetch_all("SELECT * FROM register_login");
}
if(isset($_POST['logout'])){
    header("Location: login.php");
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
            <h1>Welcome <?=ucfirst($_SESSION['account_info'][0]['firstname'])?> <?=ucfirst($_SESSION['account_info'][0]['lastname'])?></h1>
        </div>
        <div id="search">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="search_kword" id="search" placeholder="Search for a name">
                <input type="submit" value="Search" name="search">
                <input type="submit" value="Show All" name="showall">
            </form>
        </div>
        <div class="tableFixHead">
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Account Status</th>  
                        <th>Account Type</th> 
                        <th>Password</th> 
                    </tr>
                </thead>
                <tbody>
<?php               foreach($records as $record){?>
                        <tr>
                            <td><?=$record['id']?></td>
                            <td><?=$record['email']?></td>
                            <td><?=$record['firstname']?></td>
                            <td><?=$record['lastname']?></td>
                            <td><?=$record['acc_status']?></td>
                            <td><?=$record['acc_type']?></td>
                            <td><?=$record['password']?></td>
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