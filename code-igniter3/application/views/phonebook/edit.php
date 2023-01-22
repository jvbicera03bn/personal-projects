<!DOCTYPE html>
<html lang="en">
<?php
$show_name = $rec_choice['name'];
$show_contact = $rec_choice['contact'];
$show_id = $rec_choice['id'];
$show_place = $rec_choice['place'];
var_dump($rec_choice);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/phonebook.css">
    <title>Edit Phonebook</title>
</head>

<body>
    <main id="show">
        <form id="link_contact" class="show_form" method="post" action="choice">
            <input type="hidden" name="action_place" value="<?= $show_place ?>">
            <input type="hidden" name="action_id" value="<?= $show_id ?>">
            <input type="hidden" name="action_name" value="<?= $show_name ?>">
            <input type="hidden" name="action_contact" value="<?= $show_contact ?>">
            <input type="submit" name="action_rec" value="Go Back">
            <input type="submit" name="action_rec" value="Show">
        </form>
        <h2 id="edit_head">Edit Contact Number #<?= $show_place ?></h2>
        <form id="edit" method="post" action="edit">
            <input type="hidden" name="action_id" value="<?= $show_id ?>">
            <label for="edit_name">Name</label>
            <input type="text" name="edit_name">
            <label for="edit_contact">Contact Number</label>
            <input type="text" name="edit_contact">
            <input type="submit" name="submit_edit" value="Save">
        </form>
    </main>
</body>

</html>