<?php session_start();
if (!isset($_SESSION['start'])) {
    $_SESSION['contactErr'] = '';
    $_SESSION['start'] = TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Raffle Entry</title>
</head>

<body>
    <form method="post" action="process.php">
        <h1>Enter contact number to enter the raffle</h1>
        <span><?= $_SESSION['contactErr'] ?></span>
        <input type="text" name="contact">
        <input type="submit" name="submit">
        <input id="reset" type="submit" name="reset" value="Reset">
    </form>
</body>

</html>