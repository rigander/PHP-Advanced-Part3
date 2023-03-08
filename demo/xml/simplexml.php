<?php 
  header( "Content-Type: text/html;charset=utf-8");
  //todo Загружаем файл. Фактически получаю в объект корневой элемент
  // со всем его содержимым.
  $sxml = simplexml_load_file("catalog.xml");


?>
<html>

<head>
  <title>Catalog</title>
</head>

<body style="background-color: #3c3f41; color: #bd6f31;">
  <h1>Book Catalog</h1>
  <table border="1" width="100%">
    <tr>
      <th>Author</th>
      <th>Name</th>
      <th>Year published</th>
      <th>Price, usd</th>
    </tr>
    <?php 
      //Парсинг
    foreach ($sxml->book as $book){
        echo "<tr>";
        echo "<td>{$book->author}</td>";
        echo "<td>{$book->title}</td>";
        echo "<td>{$book->pubyear}</td>";
        echo "<td>{$book->price}</td>";
        echo "</tr>";
    }
    ?>
  </table>
</body>

</html>