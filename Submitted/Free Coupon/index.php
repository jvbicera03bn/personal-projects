<?php
session_start();
if (isset($_POST['reset'])) {
    $_SESSION['count'] = 10;
    unset($_POST['reset']);
}
if (isset($_POST['claim_again'])) {
    $_SESSION['count'] = $_SESSION['count'] - 1;
    unset($_POST['claim_again']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Free Coupon</title>
</head>

<body>
    <header>
        <h1>Welcome Customer</h1>
        <p>Were Giving away <span>Free Coupons</span> as a token of appreciation
            for first <span><?= $_SESSION['count'] ?></span> customer(s)</p>
    </header>
    <main>
        <h2>Kindly type your name</h2>
        <form method="POST" action="claim.php">
            <input type="text" name="name">
            <input type="submit" name="submit">
        </form>

    </main>

</body>

</html>