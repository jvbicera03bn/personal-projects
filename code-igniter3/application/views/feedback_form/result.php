<?php
$name = $post['name'];
$course = $post['course'];
$rate = $post['rate'];
$reason = $post['reason'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <h1> Submitted Entry</h1>
    <div>
        <div>
            <h4>Your Name:</h4>
            <p><?= $name ?></p>
        </div>
        <div>
            <h4>Course Title:</h4>
            <p><?= $course ?></p>
        </div>
        <div>
            <h4>Given Score:</h4>
            <p><?= $rate ?></p>
        </div>
        <div>
            <h4>Reason:</h4>
            <p><?= $reason ?></p>
        </div>
        <form>
            <input type="button" value="Return" onclick="history.back()">
        </form>
    </div>
</body>

</html>