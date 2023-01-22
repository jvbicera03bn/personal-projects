<!DOCTYPE html>
<?php
$del_info = $vdata_del;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/bookmark.css">
    <title>Delete Bookmark</title>
</head>

<body>
    <main id="del_section">
        <h1>Are you sure you want to delete</h1>
        <h2><?= $del_info["delete_folder"] ?>/<?= $del_info["delete_name"] ?>(<?= $del_info["delete_url"] ?>)</h2>
        <form id="delete_choose" method="post" action="confirm_delete">
            <input type="hidden" name="del_id" value="<?= $del_info["delete_id"]?>">
            <input type="Submit" name="choise" value="Yes">
            <input type="Submit" name="choise" value="No">
        </form>
    </main>
</body>

</html>