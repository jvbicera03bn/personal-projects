<?php
session_start();
require("new-connection.php");
$query = "SELECT subject , details, DATE_FORMAT(created_at,'%m/%d/%Y ') as date_inserted FROM bulletin_board;";
$data = array();
global $connection;
$result = $connection->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Success</title>
</head>

<body>
    <div class="bulletin">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <h3><?= $row['date_inserted'] ?>-<?= $row['subject'] ?></h3>
            <p><?= $row['details'] ?></p>
            <span class=br></span>
        <?php } ?>
    </div>

</body>

</html>