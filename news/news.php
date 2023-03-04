<?php
require "NewsDB.class.php";
$news = new NewsDB();
$errMsg = "";
//todo  'REQUEST_METHOD' - Какой метод был использован для запроса страницы;
// к примеру 'GET', 'HEAD', 'POST', 'PUT'.
// $_SERVER - Информация о сервере и среде исполнения. это массив (array),
// содержащий такую информацию, как заголовки, пути и местоположения скриптов.
// Записи в этом массиве создаются веб-сервером.
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    require "save_news.inc.php";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>News feed</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Latest news</h1>
  <?php
if ($errMsg != ""){
    echo "<h3>$errMsg</h3>";
}
  ?>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    News headline:<br />
    <input type="text" name="title" /><br />
      <br>
    Choose category:<br />
    <select class="category" name="category">
      <option value="1">Politics</option>
      <option value="2">Culture</option>
      <option value="3">Sport</option>
    </select>
      <br>
    <br />
    News text:<br />
    <textarea name="description" cols="50" rows="5"></textarea><br />
      <br>
    Source:<br>
    <input type="text" name="source" /><br /><br>
    <br />
    <input class="add-button" type="submit" value="Add!" />
</form>
<?php
    require "get_news.inc.php";
?>
</body>
</html>