<?php
$title = $news->escape($_POST["title"]);
//todo abs — Абсолютное значение (модуль числа)
// int - это целое число.
$category =abs((int)$_POST["category"]);
$description = $news->escape($_POST["description"]);
$source = $news->escape($_POST["source"]);

//todo Текстовые поля проверяем не на isset(), а на empty(). Т.к. они всегда isset,
// даже если пустые.
if(empty($title) or empty($description)){

}

if(!$news->saveNews($title, $category, $description, $source)){
    $errMsg = "Error. Something went wrong.";
}else{
    header("Location: news.php");
    exit;
}
