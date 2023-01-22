<?php
session_start();
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
    <div id="success">
        <h1>Success! Contact Number <?= $_SESSION['insertedcontact'] ?> Is now added</h1>
    </div>
    <table>
        <tr>
            <th>Contact Number</th>
            <th>Date Inserted</th>
        </tr>
<?php       foreach ($_SESSION['raffle_entries'] as $raffle_entries) { ?>
            <tr>
                <td><?= $raffle_entries['contact_num'] ?></td>
                <td><?= $raffle_entries['date_inserted'] ?></td>
            </tr>
<?php       } ?> 
    </table>
    <form id="succreset" method="post" action="process.php">
        <input id="succreset" type="submit" name="reset" value="Add new raffle Entry">
    </form>
</body>

</html>