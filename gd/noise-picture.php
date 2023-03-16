<?php
$img = imagecreatefromjpeg("images/noise.jpg");

$colors = [
  0 => $red = imagecolorallocate($img, 255, 0,0),
  1 => $blue = imagecolorallocate($img, 0, 0,255),
  2 => $black = imagecolorallocate($img, 0, 0,0),
  3 => $green =  imagecolorallocate($img, 0, 255,0),
  4 => $violet =  imagecolorallocate($img, 127, 0,255),
  5 => $purple =  imagecolorallocate($img, 128, 0,128)
];

$fonts = [
    0 => $bell1 = "fonts/bellb.ttf",
    1 => $georgia1 = "fonts/georgia.ttf",
    2 => $georgia2 = "fonts/georgia.ttf",
    3 => $bell2 = "fonts/bellb.ttf",
    4 => $georgia3 = "fonts/georgia.ttf",
    5 => $bell3 = "fonts/bellb.ttf",
];

$red = imagecolorallocate($img, 255, 0,0);
imageAntiAlias($img, true);

$string = bin2hex(random_bytes(3));
$count = strlen($string);

$angle = 0;
$size = 20;
for ($l = 0 & $x = 20;
     $l <= $count;
     $l++ & $x +=35
){
    $angle +=15;
    $randomSize = rand(15, 30);
    $randomAngle = rand(15, 90);
    $randomColor = rand(0, 5);
    $rc = $randomColor;
    $randomFont = rand(0, 5);
    imagettftext($img, $randomSize, $randomAngle, $x, 30, $colors[$rc],
        $fonts[$randomFont], $string{$l});
}

header("Content-type: image/jpg");
imagejpeg($img, null, 50);

session_start();
$_SESSION["captchaString"] = $string;




