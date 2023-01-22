<?php
if(isset($_POST['input'])){
    if($_POST['input'] >= 0 && $_POST['input'] <= 100){
        if($_POST['input'] > 74){
            echo"<script>alert('You Passed '); </script>";
        } else{
            echo"<script>alert('Unfortunately You didnt Pass '); </script>";
        } 
    }   else{
        echo"<script>alert('Invalid Input '); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            border: 0px;
        }
        main{
            border:1px solid;
            width:500px;
            margin: 30px auto;
            border-radius: 10px;
        }
        h1,p{
            text-align: center;
        }
        form{
            margin: 0px auto;
            text-align: center;
        }
        form input{
            border:1px solid;
            margin:5px;
            padding:5px;
            border-radius: 10px;
        }

    </style>
    <title>Does your grade Pass?</title>
</head>
    <body>
        <main>
            <h1>Does your grade Pass?</h1>
            <p>Enter your grade to detect if you pass or not</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="number" name="input" id="input">
                <input type="submit" value="Submit" name="Submit">
            </form>
        </main>
    </body>
</html>