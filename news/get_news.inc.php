<?php
$items = $news->getNews();
if ($items === false){
    $errMsg = "Error";
}
elseif (!count($items)){
    $errMsg = "No news";
}
else{
    foreach ($items as $item) {
        $dt = date("d-m-Y H:i:s", $item["datetime"]);
        //todo nl2br — Вставляет HTML-код разрыва строки перед каждым переводом
        // строки.
        $desc = nl2br($item["description"]);
        echo <<<HEREDOC
        <h3>{$item['title']}</h3>
        <p>$desc<br><br>{$item['category']}. Date/time: $dt </p>
        <p align='right'> <a href='news.php?del={$item['id']}'>Delete</a>
            </p>
HEREDOC;
        }
    }