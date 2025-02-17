<?php
session_start();
$image = imagecreatetruecolor(200, 50);

$background_color = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image,0,0,200,50,$background_color);

$line_color = imagecolorallocate($image, 64,64,64);
for($i=0;$i<8;$i++) {
    imageline($image,0,rand()%50,200,rand()%50,$line_color);
}

$pixel_color = imagecolorallocate($image, 0,0,255);
for($i=0;$i<500;$i++) {
    imagesetpixel($image,rand()%200,rand()%50,$pixel_color);
} 

$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$len = strlen($letters);
$word = "";
$text_color = imagecolorallocate($image, 0,0,0);

for ($i = 1; $i< 7;$i++) {
    $letter = $letters[rand(0, $len-1)];
    //imagestring($image, 5,  5+($i*30), 20, $letter, $text_color);
    imagettftext($image, 22, random_int(-50, 50), $i*26, 30, $text_color, "./font.ttf", $letter);
    $word .= $letter;
}

$_SESSION['captcha_string'] = $word;

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);