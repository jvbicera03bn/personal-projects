<?php
$date_today = $vdata['date_today'];
$time_remain = $vdata['time_remain'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1{
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        div.container {
            border: 3px solid #091c1c;
            border-radius: 20px;
            background-color: #349c9b;
            text-align: center;
            width: fit-content;
            padding: 20px 50px;
            margin:100px auto;
        }
    </style>
    <title>Time Remaining</title>
</head>
<body>
    <h1>Countdown before the day ends!</h1>
    <div class="container">
        <h1><?= $date_today; ?></h1>
        <h1><?= $time_remain; ?> Seconds</h1>
    </div>
</body>

</html>