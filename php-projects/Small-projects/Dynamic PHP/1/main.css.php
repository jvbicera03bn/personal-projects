<?php
header('Content-type: text/css');
$random1 = rand(15, 30);
$random2 = rand(40, 60);
?>
p { font-size: <?= $random1 ?>px; }
em { font-size: <?= $random2 ?>px; }