<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <style>
        div {
            width: 15%;
            border: 2px solid;
            border-radius: 10px;
            margin: 0px auto;
        }

        form {
            padding: 10px;
        }

        input {
            display: block;
            margin: 10px auto;
            padding: 5px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div>
        <form method="post" action="create/true">
            <input type="text" name="fname" placeholder="First Name">
            <input type="text" name="lname" placeholder="Last Name">
            <input type="text" name="email" placeholder="E-mail Address">
            <input type="submit" name="submit">
        </form>
    </div>

</body>

</html>