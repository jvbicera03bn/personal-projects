<?php
/* session_start(); */
require('process.php');
$page = $_SESSION['page_number'];
$MaxNumRow = 50*$page;
$BaseNumRow = ($page === 1)?(0):($MaxNumRow-50);
$numberofpage = count($_SESSION['csvToArray'])/50;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <main id="main">
        <h1><?= $_SESSION['file_name']?></h1>
        <form id="page" method="get" action="process.php">
            <h3>Pages</h3>
            <input type="hidden" name="page_change">
<?php       for ($i = 1; $i <= $numberofpage; $i++){?>
            <input type="submit" name="page" value="<?= $i ?>">
<?php       } ?>       
        </form>
        <table>
            <tr>
<?php           foreach ($_SESSION['csvToArray'][0] as $header => $val) { ?>
                    <th> <?= ucfirst(str_replace('_', ' ', $header)); ?></th>
<?php           } ?>
            </tr>
<?php           for ($i = $BaseNumRow; $i < $MaxNumRow; $i++) {
                    if ($i + 2 > count($_SESSION['csvToArray'])){ 
                        break;
                    } ?>
                <tr>
<?php               foreach ($_SESSION['csvToArray'][0] as $header => $val) {  ?>
                        <td><?= $_SESSION['csvToArray'][$i][$header] ?></td>
<?php               }?>
                </tr>
<?php           } ?>
        </table>
    </main>
</body>
</html>