<?php
/* Создание изображения */
$i = imageCreate(500, 300);
//$i = imageCreateTrueColor(500, 300);

/* Подготовка к работе */
//imageAntiAlias($i, true);
/*
$red = imageColorAllocate($i, 255, 0, 0);
$white = imageColorAllocate($i, 0xFF, 0xFF, 0xFF);
$black = imageColorAllocate($i, 0, 0, 0);
$green = imageColorAllocate($i, 0, 255, 0);
$blue = imageColorAllocate($i, 0, 0, 255);
$grey = imageColorAllocate($i, 192, 192, 192);
*/
//imageFill($i, 0, 0, $grey);

/* Рисуем примитивы */
//imageSetPixel($i, 10, 10, $black);
//imageLine($i, 20, 20, 80, 280, $red);
//imageRectangle($i, 20, 20, 80, 280, $blue);
//$points = array(0, 0, 100, 200, 300, 200);
//imagePolygon($i, $points, 3, $green);
//imageEllipse($i, 200, 150, 300, 200, $red);
//imageArc($i, 200, 150, 300, 200, 0, 40, $black);
//imageFilledArc($i, 200, 150, 300, 200, 0, 40, $red, IMG_ARC_PIE);

/* Рисуем текст */
//imageString($i, 5, 150, 200, 'PHP5', $black);
//imageChar($i, 3, 20, 20, 'PHP5', $blue);
//imageTtfText($i, 30, 10, 300, 150, $green,'arial.ttf', 'PHP5');

/* Отдаем изображение */
header("Content-type: image/gif");
imageGif($i);
//header("Content-type: image/png");
//imagePng($i);
//header("Content-type: image/jpg");
//imageJpeg($i);
?>
