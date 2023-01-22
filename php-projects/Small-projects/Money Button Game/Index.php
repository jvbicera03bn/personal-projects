<?php
session_start();
if (!isset($_SESSION['done'])) {
    $_SESSION['done'] = 1;
    $_SESSION['chance'] = 10;
    $_SESSION['money'] = 500;
    $_SESSION['history'] = array();
}
$today = date('d/m/Y h:i A');
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
    <header>
        <div>
            <h2>Your Money <?= $_SESSION['money'] ?> </h2>
            <p>Chance Left <?= $_SESSION['chance'] ?>
            <p>
        </div>
        <form method="post" action="process.php">
            <input type="submit" name="reset" value="Reset Game" id="reset" />
        </form>
    </header>
    <main>
        <div class="bet">
            <h2>Low Risk</h2>
            <form method="post" action="process.php">
                <input type=hidden name="range1" value="-25">
                <input type=hidden name="range2" value="100">
                <input type="submit" name="bets" value="Low Risk" />
            </form>
            <h3>by -25 up to 100</h3>
        </div>
        <div class="bet">
            <h2>Moderate Risk</h2>
            <form method="POST" action="process.php">
                <input type=hidden name="range1" value="-100">
                <input type=hidden name="range2" value="1000">
                <input type="submit" name="bets" value="Moderate Risk" />
            </form>
            <h3>by -100 up to 1000</h3>
        </div>
        <div class="bet">
            <h2>High Risk</h2>
            <form method="POST" action="process.php">
                <input type=hidden name="range1" value="-500">
                <input type=hidden name="range2" value="2500">
                <input type="submit" name="bets" value="High Risk" />
            </form>
            <h3>by -500 up to 2500</h3>
        </div>
        <div class="bet">
            <h2>Severe Risk</h2>
            <form method="POST" action="process.php">
                <input type=hidden name="range1" value="-3000">
                <input type=hidden name="range2" value="5000">
                <input type="submit" name="bets" value="Severe Risk" />
            </form>
            <h3>by -3000 up to 5000</h3>
        </div>

        <h2 id="host">Game Host</h2>
        <div id="gmhost">
            <p>
                [<?= $today ?>] Welcome to Money Button Game, Risk taker! All you need to do is to push buttons to try your luck, You have free 10 chances with initial money 500. Choose wisely and good luck!
            </p>

            <?php if (isset($_SESSION['bet'])) {
                foreach ($_SESSION['history'] as $history) {
                    if ($history['color'] == 'red') { ?>
                        <p class="red"> [<?= $today ?>] You pushed "<?= $history['risk'] ?>" value is <?= $history['rng'] ?>
                            your current money is <?= $history['money'] ?> with <?= $history['chance'] ?> Chance(s) left </p>
                    <?php } elseif ($history['color'] == 'blue') { ?>
                        <p class="blue"> [<?= $today ?>] You pushed "<?= $history['risk'] ?>" value is <?= $history['rng'] ?>
                            your current money is <?= $history['money'] ?> with <?= $history['chance'] ?> Chance(s) left </p>
                    <?php } ?>
                <?php }
                if ((isset($_SESSION['no_chance']))) { ?>
                    <p>Game Over</p>
                <?php } ?>
            <?php unset($_SESSION['bet']);
            } ?>
        </div>
    </main>
</body>

</html>