<?php
$binary = array(1, 1, 0, 1, 1, 0, 1);
function get_count($arr)
{
    $zero = 0;
    $one  = 0;
    foreach ($arr as $binary) {
        if ($binary == 1){
            $one++;
        }
        else{
            $zero++;
        }
    }
    return array("zeroes" => $zero,"ones" => $one);
}
$output = get_count($binary); 
var_dump($output);
?>