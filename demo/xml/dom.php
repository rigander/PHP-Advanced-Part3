<?php 
  header( "Content-Type: text/html;charset=utf-8");
  //todo Создадим экземпляр класса.
  $dom = new DOMDocument();
  //todo Загрузим в него документ.
  $dom->load("catalog.xml");
  //todo Получим корневой каталог.
  $root = $dom->documentElement;
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
      //todo Парсинг
      // Пропустили коллекцию узлов через foreach и вывели содержимое каждого узла.
      // все пробелы будут восприняты
    foreach($root->childNodes as $book){
        //todo Нужно проверить что тип узла является элементом. Иначе если к примеру
        // существуют табуляции и они буду восприняты как текстовые узлы DOM, то например
        // таблица построится не верно.
        if ($book->nodeType == 1){
            echo "<tr>";
            foreach ($book->childNodes as $item){
                if ($item->nodeType == 1){
                    echo "<td>{$item->textContent}</td>";
                }
            }
            echo "</tr>";

        }
    }
    ?>
  </table>
</body>

</html>