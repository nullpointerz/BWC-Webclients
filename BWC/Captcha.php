<?php
//starts a session
session_start();

//generates a random number
$code=rand(1000,9999);

//stores that random number in a session called code 
$_SESSION["code"]=$code;

//declare image properties
$im = imagecreatetruecolor(50, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white

//fill and create the image with above properties
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>