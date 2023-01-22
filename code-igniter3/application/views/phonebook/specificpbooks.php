<!DOCTYPE html>
<?php
$show_name = $rec_choice['name'];
$show_contact = $rec_choice['contact'];
$show_id = $rec_choice['id'];
$show_place = $rec_choice['place'];
var_dump($rec_choice);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/phonebook.css">
    <title>Show PhoneBook</title>
</head>

<body>
    <main id="show">
        <form id="link_contact" class="show_form" method="post" action="choice">
            <input type="hidden" name="action_place" value="<?= $show_place ?>">
            <input type="hidden" name="action_id" value="<?= $show_id ?>">
            <input type="hidden" name="action_name" value="<?= $show_name ?>">
            <input type="hidden" name="action_contact" value="<?= $show_contact ?>">
            <input type="submit" name="action_rec" value="Go Back">
            <input type="submit" name="action_rec" value="Edit">
        </form>
        <div id="infos">
            <h2 class="show_contact">Contact #<?= $show_place ?></h2>
            <span class="show_contact">Name</span>
            <span class="show_contact info"><?= $show_name ?></span>
            <span class="show_contact">Contact Number</span>
            <span class="show_contact info"><?= $show_contact ?></span>
        </div>
    </main>
</body>

</html>