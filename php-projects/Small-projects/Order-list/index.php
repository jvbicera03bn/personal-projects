<?php
$x = array('Spaghetti', 'Pizza', 'Iced tea');
function order_list($x){
    echo '<ol>';
    foreach ($x as $list) {
        echo '<li>' . $list . '</li>';
    }
    echo '</ol>';
}

order_list($x);



?>