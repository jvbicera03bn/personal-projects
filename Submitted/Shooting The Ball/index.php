<?php
$success = 0;
$fail = 0;
for ($i = 0; $i < 1000; $i++) {
    $ballshot = rand(1, 2);
    
    if ($ballshot == 1) {
        $success++;
        echo 'Attempt #' . $i . ' Shooting the ball...Success!...Got ' . $success . 'x success and' . $fail . 'x epic fail(s) so far' . '<br>';
    } else {
        $fail++;
        echo 'Attempt #' . $i . ' Shooting the ball...Epic Fail...Got ' . $success . 'x success and' . $fail . 'x epic fail(s) so far' . '<br>';
    }
}
?> 