<?php
class html_generator{

function render_input($array){
    foreach($array as $keys=>$val){
    echo "<label for='$keys'>{$keys}</label>\r\n ";
    echo "<input type='text' name='{$keys}' value='{$val}'>\r\n";
    }
}
function render_list($array,$list_type){
    if($list_type === 'ordered list'){
        echo "<ol>";
    }elseif($list_type === 'unordered list'){
        echo "<ul>";
    }
    echo "\r\n";
    foreach ($array as $val){
        echo "<li>{$val}</li>";
        echo "\r\n";
    }
    if($list_type === 'ordered list'){
        echo "</ol>";
    } elseif ($list_type === 'unordered list') {
        echo "</ul>";
    }
    echo "\r\n";
}
}

$samplearray = array("name" => "Bag", "price" => "250", "stocks" => "10");
$samplearray2 = array("Apple", "Banana", "Cherry");

$htmls = new html_generator();

$htmls->render_input($samplearray);
$htmls->render_list($samplearray2,"ordered list");
$htmls->render_list($samplearray2, "unordered list");
?>