<?php
//todo abs — Абсолютное значение (модуль числа)
// int - это целое число.
global $news;
$title = $news->escape($_POST["title"]);
$category =abs((int)$_POST["category"]);
$description = $news->escape($_POST["description"]);
$source = $news->escape($_POST["source"]);

//todo Текстовые поля проверяем не на isset(), а на empty(). Т.к. они всегда isset,
// даже если пустые.
if(empty($title) or empty($description)){
        $errMsg = "Fill up all required form fields.";
}else{
    if(!$news->saveNews($title, $category, $description, $source)){
        $errMsg = "Error. Something went wrong.";
    }else{
        header("Location: news.php");
        exit;
    }
}


