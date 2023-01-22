<?php session_start();
if (!isset($_SESSION['start'])) {
    $_SESSION['inputErr'] = array();
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
        <h1>Bulletin Board Entry</h1>
        <?php if (!empty($_SESSION['inputErr'])) {
            foreach ($_SESSION['inputErr'] as $input_error) { ?>
                <span><?= $input_error ?></span>
        <?php }
            $_SESSION['inputErr'] = array();
        } ?>
        <div class="form_inputs">
            <label for="subject">Subject</label>
            <input title="subject" type="text" name="subject">

            <label for="detail">Details</label>
            <textarea rows="10" title="detail" name="detail"></textarea>
        </div>
        <input class="sub" type="submit" name="submit">
        <input class="sub" type="submit" name="skip" value="Skip">
        <input id="reset" type="submit" name="reset" value="Reset">
    </form>
</body>

</html>