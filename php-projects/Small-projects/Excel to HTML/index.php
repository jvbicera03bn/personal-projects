<link rel="stylesheet" href="index.css">
<?php
ini_set('auto_detect_line_endings', true);
$row = 1;
?>
<table>
<?php   if (($handle = fopen("us-500.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ',', '"')) !== FALSE) {  
                if ($row % 10 !== 0) { ?>
                <tr>
<?php           }else { ?>
                    <tr class="gray">
<?php           } ?>
<?php           for ($c = 0; $c <= 11; $c++) { ?>
                        <td>
<?php               if ($c == 3){
                        for ($i = 0; $i <= 4; $i++) {?>
                            <?= $data[$c] ?>
<?php                       $c++;}?>                           
<?php                       $c=$c-1;
                        }else { ?>
                        <?= $data[$c] ?>
<?php               } ?>                        
                        </td>
<?php           }
                $row++ ?>
                </tr>
<?php       }
        fclose($handle); ?>
<?php   } ?>
</table>