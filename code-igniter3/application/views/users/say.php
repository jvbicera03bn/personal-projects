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
            width: 35%;
            margin: 10px auto;
            padding: 20px;
            border-radius: 20px;
            background-color: #2d612e;
        }
    </style>
    <title>Say What?</title>
</head>

<body>
    <?php for ($i = 1; $i <= $this->session->userdata('count'); $i++) { ?>
        <div>
            <h1><?= $i ."." ?>You said ? <?= $this->session->userdata('say') ?>
        </div>
    <?php } ?>
</body>

</html>