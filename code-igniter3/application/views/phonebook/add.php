<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/phonebook.css">
    <title>Add Phonebook</title>
</head>
<body>
    <main id="show">
        <form id="link_contact" class="show_form" method="post" action="choice">
            <input type="submit" name="action_rec" value="Go Back">
        </form>
        <h2 id="edit_head">Add Contact Number</h2>
        <form id="edit" method="post" action="add">
            <label for="add_name">Name</label>
            <input type="text" name="add_name">
            <label for="add_contact">Contact Number</label>
            <input type="text" name="add_contact">
            <input type="submit" name="submit_add" value="Create">
        </form>
    </main>
</body>
</html>