<?php 
  header( "Content-Type: text/html;charset=utf-8");
  //todo Создадим экземпляр класса.
  $dom = new DOMDocument();
  //todo Загрузим в него документ.
  $dom->load("catalog.xml");
  //todo Получим корневой каталог.
  $root = $dom->documentElement;
//todo Пропустили коллекцию узлов через foreach и вывели содержимое каждого узла.
foreach($root->childNodes as $book){
    echo $book->textContent. "<br>";
}

?>
<html>

<head>
  <title>Catalog-DOM</title>
</head>

<body style="background-color: #3c3f41; color: #bd6f31">
  <h1>Books catalog</h1>
  <table border="1" width="100%">
    <tr>
      <th>Author</th>
      <th>Name</th>
      <th>Year published</th>
      <th>Price, usd</th>
    </tr>
    <?php 
      //Парсинг
    ?>
  </table>
</body>

</html>