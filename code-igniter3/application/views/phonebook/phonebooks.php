<!DOCTYPE html>
<?php
$records = $phonerecords['phonerecords'];
$numplace = 1;
?>
<!-- Implement Features tom-->
<!-- redirect to add page -->
<!-- redirect edit work on features -->
<!--  -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/phonebook.css">
    <title>Phonebook</title>
</head>

<body>
    <main>
        <h1>Contacts</h1>
        <div id="table">
            <table cellspacing="0.5">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
<?php           foreach ($records as $phonerecs) { ?>
                    <tbody>
                        <td><?= $phonerecs['name'] ?></td>
                        <td><?= $phonerecs['contact_number'] ?></td>
                        <td>
                            <form id="rec_action" method="post" action="phonebook/choice">
                                <input type="hidden" name="action_place" value="<?= $numplace ?>">
                                <input type="hidden" name="action_id" value="<?= $phonerecs['phonebook_id'] ?>">
                                <input type="hidden" name="action_name" value="<?= $phonerecs['name'] ?>">
                                <input type="hidden" name="action_contact" value="<?= $phonerecs['contact_number'] ?>">
                                <input type="submit" name="action_rec" value="Delete">
                                <input type="submit" name="action_rec" value="Show" class="middle_inp">
                                <input type="submit" name="action_rec" value="Edit">
                            </form>
                        </td>
                    </tbody>                    
<?php           $numplace = $numplace + 1;
                } ?>
            </table>
        </div>
        <form action="phonebook/choice" method="post" id="link_contact_pb">
            <input type="Submit" name="action_rec" value="Add new contact">
        </form>
    </main>
</body>

</html>

