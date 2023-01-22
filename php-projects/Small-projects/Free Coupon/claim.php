<?php
session_start();
$coupon = rand(1000000, 5000000);
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
            <?php if ($_SESSION['count'] !== 0) { ?>
                <span><?= $_SESSION['count'] ?></span> customer(s)
        </p>
    <?php } else { ?>
        <p>
        <?php } ?>
    </header>
    <main>
        <?php if ($_SESSION['count'] === 0) { ?>
            <h4>Sorry</h4>
            <p class="coupon">Unavailable</p>
            <form method="POST" action="index.php">
                <input type="submit" name='reset' value="Reset Counter">
                <input type="submit" name='reset' value="Claim Again">
            </form>
        <?php } elseif (isset($_POST['name']) && empty($_POST['name'])) { ?>
            <h4>You must enter your name</h4>
            <form action="index.php">
                <input type="submit" value="Go Back">
            </form>
        <?php } elseif (isset($_POST['name'])) { ?>
            <h4>50% Discount</h4>
            <p class="coupon"><?= $coupon ?></p>
            <form method="POST" action="index.php">
                <input type="submit" name='reset' value="Reset Counter">
                <input type="submit" name='claim_again' value="Claim Again">
            </form>
        <?php unset($_POST['name']);
        } ?>
    </main>
</body>

</html>