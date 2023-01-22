<?php
header('Content-type: image/jpeg');
$rand = rand(10000000,40000000);
header("Content-type: image/png");
$my_img = imagecreate( 350, 200 );
$gap = 0;

$background = imagecolorallocate( $my_img, 0, 0, 255 );
$text_colour = imagecolorallocate( $my_img, 0, 0, 0 );
$line_colour = imagecolorallocate( $my_img, 0, 0, 0 );
$white = imagecolorallocate( $my_img,43, 34, 140);

imagesetthickness ( $my_img, 5 );
imagefilledrectangle($my_img, 15,15,335,185,$white);
imagerectangle($my_img, 15, 15, 335, 185, $line_colour);
imagearc($my_img, 10, 100, 100, 100,  -85, 85, $line_colour);
imagefilledarc($my_img, 10, 100, 95, 86,  -86, 86, $background, IMG_ARC_PIE);
imagerectangle($my_img, 70, 30, 320, 170, $line_colour);
imagestringup($my_img, 6, 85,130, "TICKETS", $text_colour);
imagestring($my_img, 6, 150, 40, "No.". $rand , $text_colour);
imagestring($my_img, 6, 115, 140, "A Move:Movie", $text_colour);
for($i = 0; $i < 12;$i++) {
    imagerectangle($my_img, 120 + $gap, 70, (125 + $gap)- rand(1, 6), 125, $line_colour);
    $gap=$gap+15;
}
imagepng( $my_img );
imagedestroy( $my_img );
?>