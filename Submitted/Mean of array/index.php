<?php
$arr = array(13, 143, 88, 65, 120);
$sum = 0;
foreach ($arr as $sequence) {
    $sum = $sum + $sequence;
}
    $mean = $sum / count($arr);
    echo "The mean is " . $mean;
?>