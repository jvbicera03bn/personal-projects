<?php
$score = rand(1, 100);
function score_comment($score)
{
    echo '<h1>' . $score . '</h1>';
    if ($score <= 50) {
        echo '<h2>' .  'Never sing again, ever!' . '</h2>';
    } elseif ($score <= 79) {
        echo '<h2>' .  'Practice More!' . '</h2>';
    } elseif ($score <= 94) {
        echo '<h2>' . 'You\'re getting better!' . '</h2>';
    } elseif ($score <= 100) {
        echo '<h2>' . 'What an excellent singer!' . '</h2>';
    }
}
for($i=1;$i<50;$i++){
    score_comment($score);
    $score = rand(1, 100);
}
?>