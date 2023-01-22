<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Hello <?= $_POST['name'] ?></h1>
        <p>This is your password <?= $_POST['password'] ?></p>
        <p>This is your age <?= $_POST['age'] ?></p>
        <p>this is your birthday <?= $_POST['birthday'] ?></p>
    </body>
</html>