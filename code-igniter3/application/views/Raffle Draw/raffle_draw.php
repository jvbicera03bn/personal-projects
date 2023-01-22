<?php
$count = $vdata['claim_count'];
$randcode = $vdata['randcode'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/raffle_draw.css'); ?>">
    <title>Raffle Draw</title>
</head>

<body>
    <h3>There Are <?= $count ?> Lucky winner(s) selected</h3>
    <div>
        <h1><?= $randcode ?></h1>
    </div>
    <form method="post" action="raffle_draw">
        <input type="submit" name="Pick More" value="Pick More">
        <input type="hidden" name="count" value="<?= $count ?>">
    </form>
    <form method="post" action="raffle_draw">
        <input type="submit" name="resetses" value="Reset Session">
        <input type="hidden" name="reset" value="TRUE">
    </form>
</body>

</html>