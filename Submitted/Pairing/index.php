<?php
$cards = array('King'=> 13, 'Queen' => 12, 'Jack' => 11, 'Ace' => 1,);
function pairing($card){
    echo 'list of keys in the array:';
    echo '<ul>';
    foreach ($card as $key => $val) {
        echo '<li>' . $key . '</li>';
    }
    echo '</ul>';
    foreach ($card as $key => $val) {
        echo 'The value of ' . $key . ' in Pyramid Solitaire is' . $val .'<br>';
    }
}
    pairing($cards);

?>