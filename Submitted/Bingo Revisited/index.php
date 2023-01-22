<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <?php
    $bingo = "BINGO";
    $rowskip = 2;
    $row = 0;
    ?>
    <div class="board">
        <?php for ($i = 0; $i < strlen($bingo); $i++) { ?>
            <h1><?= $bingo[$i] ?></h1>
        <?php } ?>
        <table>
            <?php for ($i = 1; $i < strlen($bingo) + 1; $i++) { ?>

                <tr>
                    <?php for ($j = 1; $j < strlen($bingo) + 1; $j++) {
                        $row += $rowskip ?>
                        <?php if ($i % 2 == 0) {
                            $font_color = 'red';
                        } else {
                            $font_color = 'blue';
                        }
                        ?>
                        <td class=<?= $font_color ?>> <?= $row ?> </td>
                    <?php }
                    $row = 0;
                    $rowskip++; ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>