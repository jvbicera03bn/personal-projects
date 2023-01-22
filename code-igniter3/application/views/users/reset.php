<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            border: 0px;
            text-align: center;
        }

        div {
            border: 2px solid;
            width: 600px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 20px;
            background-color: #2d612e;
        }

        form {
            padding: 10px;
        }

        form input {
            padding: 10px;
            border: 1px solid;
            border-radius: 10px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div>
        <h1>The Counter has been reset</h1>
        <form method="post" action="count">
            <input type="Submit" name="Count" value="Go Back" />
        </form>
    </div>
</body>

</html>