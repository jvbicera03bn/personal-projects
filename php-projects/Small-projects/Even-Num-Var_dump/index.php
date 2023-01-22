<?php
$arr = array();
for ($i = 0; $i <= 10000; $i++) {
    if ($i % 2 == 0) {
        array_push($arr, $i);
    }
}
var_dump($arr);
