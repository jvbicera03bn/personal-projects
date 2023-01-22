<?php
require_once "dbcon.php";
$errs = array();
/* Get Array of Records */

if(!empty($_POST["search"])){
    $searchword = $_POST['search_kword'];
    $records = fetch_all('SELECT * FROM register_login WHERE lastname ="'.$searchword.'"or firstname = "'.$searchword.'"');
}else{
    $records = fetch_all("SELECT * FROM register_login");
}

if(isset($_POST["register"])){
    /* IF there are input fields that is empty an error will be returned*/
    foreach($_POST as $POST){
        if(empty($POST)){
            $errs[] = "All fields are required";
            break;
        }
    }
    if(is_numeric($_POST["firstname"])){
        $errs[] = "Firstname must be a character";
    }
    if(is_numeric($_POST["lastname"])){
        $errs[] = "Lastname must be a character";
    }
    /* If No error the register account will be registerd */
    if(empty($errs)){
        $query ="INSERT INTO `register_login`.`register_login`(`firstname`,`lastname`,`email`,`password`)";
        $values = 'VALUES("'.$_POST['firstname'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['password'].'");';
        mysqli_query($connection ,$query.$values);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Register / Activity3.2</title>
</head>
    <body>
        <main>
            <div id="form_container">
                <h1>Register</h1>
<?php           if(!empty($errs)){ ?>
                    <div id="err">
<?php                   foreach($errs as $err){
                            echo"<p>".$err."</p> ";
                        } ?> 
                    </div>         
<?php           } ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                <input type="password" name="password" id="password" placeholder="Password" required> 
                <input type="submit" name="register" value="Register">
            </form>
                <p><a href="login.php">Already have an account?</a></p>
            </div>
            <div id="search">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="text" name="search_kword" id="search">
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
                        </tr>
                    </thead>
                    <tbody>
<?php                   foreach($records as $record){?>
                            <tr>
                                <td><?=$record['id']?></td>
                                <td><?=$record['email']?></td>
                                <td><?=$record['firstname']?></td>
                                <td><?=$record['lastname']?></td>
                            </tr>
<?php                   }?>
                    </tbody>
                </table>
            </div>            
        </main>
    </body>
</html>