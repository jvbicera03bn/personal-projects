<?php
/* Exponent1 */
$digits = array(3, 12, 30);
function exponential($arr)
{
    foreach ($arr as $ind => $value) {
        $expo[$ind] = $value ** 3;
    }
    return $expo;
}

$result = exponential($digits);
var_dump($result);
echo '<br>';
/* Exponent2 */
$digits = array(8, 11, 4);
function exponential2($arr,$exponent)
{
    foreach ($arr as $ind => $value) {
        $expo[$ind] = $value ** $exponent;
    }
    return $expo;
}

$result = exponential2($digits,4);
var_dump($result);
?>