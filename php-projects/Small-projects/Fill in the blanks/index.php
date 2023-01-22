<?php
$list = array(6, 1, 3, 5, 7);
function convert_to_blanks($arr){
    foreach($arr as $val){
        for($i=0;$i<$val;$i++){
            echo '_ ';
        }
        echo '<br>';
    }
}
convert_to_blanks($list);
$list = array(4, "Michael", 3, "Karen", 2, "Rogie");
function convert_to_blanks2($arr)
{
    foreach ($arr as $val) {
        if (is_string($val)){
            echo $val[0];
            for($j=0;$j<strlen($val)-1;$j++){
                echo '_ ';
            }
            echo '<br>';
        }
        else{
            for ($i = 0; $i < $val; $i++) {
                echo '_ ';
            }
            echo '<br>';
        }
    }
}
convert_to_blanks2($list);
?>