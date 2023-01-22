<?php
session_start();
require("new-connection.php");
if (!isset($_SESSION['start'])) {
    $_SESSION['start'] = true;
    $_SESSION['ERRmsg'] = array();
    $_SESSION['UploadTrue'] = array();
}
$query = "SELECT * FROM files;";
$_SESSION['file_infos'] = fetch_all($query);?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css" />
        <title>Excel to Html</title>
    </head>
    <body>
        <main>
            <div id="uploadform">
                <h1>Excel to Html</h1>
                <div id="msg">
<?php               if (!empty($_SESSION['ERRmsg'])) { ?>
<?php                   foreach ($_SESSION['ERRmsg'] as $input_error) { ?>
                            <p id="error"><?= $input_error ?></p>
<?php               } ?>
<?php                   $_SESSION['ERRmsg'] = array();
                    } elseif (!empty($_SESSION['UploadTrue'])) { ?>
<?php               foreach ($_SESSION['UploadTrue'] as $input_success) { ?>
                        <p id="success"><?= $input_success ?></p>
<?php               } ?>
<?php                   $_SESSION['UploadTrue'] = array();
                    } ?>
                </div>
                <form method="post" action="process.php" enctype="multipart/form-data">
                    <input type="file" name="CSVFile_Upload" id="CSV_File_Upload">
                    <input type="submit" value="Upload CSV File" name="submit_file">
                </form>
            </div>
            <div id="uploaded">
                <h1>Uploaded Files</h1>
                <form id="file_list" method="post" action="process.php">
                    <input type="hidden" name="file_select">
                    <ol>
<?php                   foreach ($_SESSION['file_infos'] as $files) { ?>
                            <li><input class="files" type="submit" name="file_name" value="<?= $files['file_name'] ?>"></li>
<?php                   } ?>
                    </ol>
                </form>
            </div>
        </main>
        <form method="post" action="process.php">
            <input type="submit" name="reset" value="Reset Session">
        </form>
    </body>
</html>