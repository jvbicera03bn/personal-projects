<?php
if(isset($_POST['input'])){
    if(is_numeric($_POST['input'])){
        echo"<script>alert('The Inputted text is a number '); </script>";
    } else{
        echo"<script>alert('The Inputted text is not a number '); </script>";
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
    <title>Is this a Number</title>
</head>
    <body>
        <main>
            <h1>Number Detector</h1>
            <p>Enter a number to detect if its a number or not</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="input" id="input">
                <input type="submit" value="Submit" name="Submit">
            </form>
        </main>
    </body>
</html>