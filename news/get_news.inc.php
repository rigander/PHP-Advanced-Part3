<?php
$items = $news->getNews();
if ($items === false){
    $errMsg = "Error";}
elseif(count(!count($items))){
    $errMsg = "No news";
}else{
    foreach ($items as $item){
        $dt = date("d-m-Y H:i:s", $item["datetime"]);
        $desc = nl2br($item["description"]);
        echo <<<ITEM
        <h3>{$item['title']}</h3>
        <p>$desc<br>{$item['category']} @ $dt</p>
        <p align="right">
        <a href='news.php?del={$item['id']}'>Delete</a></p>
    ITEM;
      endforeach;
    }
}

