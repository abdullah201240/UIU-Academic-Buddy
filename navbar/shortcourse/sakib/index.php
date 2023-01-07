<?php
//$font = "./ZacharyBinx.ttf";
$font = "./FaberSansPro66reduced.ttf";
$image = imagecreatefromjpeg("./vecteezy_modern-certificate-with-abstract-gradient-background_.jpg");
//header('Content-type: image/jpg'); 
$color = imagecolorallocate($image, 19, 21, 22);
$name = "Abdullah Al Sakib";
$course = "C for beginner";
imagettftext($image, 90, 0, 500, 600, $color, $font, $name);
imagejpeg($image, "sa.jpg");
$fonts = "./EMPORO.TTF";
$colors = imagecolorallocate($image, 18, 78, 176);
imagettftext($image, 38, 0, 800, 730, $colors, $fonts, $course);
imagejpeg($image, "sa.jpg");
imagedestroy($image);
echo "Done";


?>