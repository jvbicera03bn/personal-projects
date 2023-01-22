<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bingo</title>
        <style>
            * {
                margin: 0px;
                padding: 0px;
                border: 0px;
            }

            th,
            td {
                font-size: 25px;
                width: 50px;
                height: 50px;
                padding: 2px 5px;
                text-align: center;
            }

            .red {
                color: red;
            }

            .blue {
                color: blue;
            }

            table {
                background-color: black;
                margin: 0px auto;
                position: relative;
                top: 300px
            }

            th,
            td {
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php
            $bingo = "BINGO";
            $rowskip = 2;
            $row = 0;
            echo '<table>';
            echo '<tr>';
            for ($i = 0; $i < strlen($bingo); $i++) {
                echo '<th>' . $bingo[$i] . '</th>';
            }
            echo '</tr>';
            for ($i = 1; $i < strlen($bingo) + 1; $i++) {
                $font_color = ($i % 2 == 0) ? 'red' : 'blue';
                echo '<tr>';
                for ($j = 0; $j < strlen($bingo); $j++) {
                    $row += $rowskip;
                    echo '<td class=' . "$font_color" . '>' . $row . '</td>';
                }
                $row = 0;
                $rowskip++;
                echo '</tr>';
            }
            echo '</table>';
        ?>
    </body>
</html>