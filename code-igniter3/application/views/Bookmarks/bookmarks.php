<?php
$bookmark = $vdata['bookmarks'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/bookmark.css">
    <title>Bookmark</title>
</head>

<body>
    <main>
        <div id="set_bmark">
            <h2>Set bookmark</h2>
            <form method="post" action="bookmarks/add" id="set_bmark">
                <label for="name">Name</label>
                <input type="text" name="Name">

                <label for="folder">URL</label>
                <input type="url" name="URL">

                <label for="folder">Choose a car:</label>
                <select name="folder">
                    <option value="Favorites">Favorites</option>
                    <option value="Other">Other</option>
                </select>
                <input type="submit" name="submit" value="Add">
            </form>
        </div>
        <h1>Bookmarks</h1>
        <div id="table">
            <table cellspacing="0.5">
                <thead>
                    <tr>
                        <th>Folder</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
<?php               foreach ($bookmark as $bmark) { ?>
                        <tr>
                            <td><?= $bmark['folder'] ?></td>
                            <td><?= $bmark['name'] ?></td>
                            <td><?= $bmark['URL'] ?></td>
                            <td>
                                <form method="post" action="bookmarks/delete" class="delete">
                                    <input type="hidden" name="delete_id" value="<?= $bmark["bookmark_id"] ?>">
                                    <input type="hidden" name="delete_folder" value="<?= $bmark['folder'] ?>">
                                    <input type="hidden" name="delete_name" value="<?= $bmark['name'] ?>">
                                    <input type="hidden" name="delete_url" value="<?= $bmark['URL'] ?>">
                                    <input class="delete_button" type="submit" name="delete" value="Delete">
                                </form>
                            </td>
                        </tr>
<?php               } ?>
            </table>
        </div>
    </main>
</body>

</html>