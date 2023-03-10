<?php 
  header( "Content-Type: text/html;charset=utf-8"); 
  //todo  Создание парсера. указывать кодировку utf-8 не обязательно.
  // SAX и так по умолчанию выставит как utf-8. Такая запись возвращает сам
  // в php.
$sax = xml_parser_create("utf-8");
  //todo  Функция обработчик начальных тегов. Обрабатывает событие когда
  // SAX нашел открывающий тэг. Название функции произвольное.
  // туда обязательно определить 3 параметра.
  // $parser - то есть он передаст в первую очередь сам себя.
  // $tag - имя тэга (элемента). Причем тэг прейдет в верхнем регистре.
  // $attributes - если у элемента есть атрибуты, то сюда прейдет ассоциативный
  // массив.
function onStart($parser, $tag, $attributes){
    //todo Для создания нужной нам таблицы сам тэг <catalog> нас не интересует.
    // Если в параметр $tag парсер передал не CATALOG и не BOOK, то вывести <td>.
    if($tag != "CATALOG" and $tag != "BOOK")
        echo "<td>";
    if ($tag == "BOOK")
        echo "<tr>";
};
  //todo Функция обработчик закрывающих тегов. Всё тоже самое.
function onEnd($parser, $tag){
    if($tag != "CATALOG" and $tag != "BOOK")
        echo "</td>";
    if ($tag == "BOOK")
        echo "</tr>";
};
  //todo Функция обработчик текстового содержимого
function onText($parser, $text){
    echo $text;
};

  //todo Регистрация функций как обработчиков событий. Теперь нужно как-то указать
  // парсеру какая из функция для чего служит.
  // Назначение обработчиков начальных и конечных тегов.
  // Первый параметр парсер, кому это предназначается. Далее ввиде строк передаём
  // имена функций обработки открывающего и закрывающего тега.
    xml_set_element_handler($sax, "onStart", "onEnd");
  //todo  Назначение обработчика текстового содержимого.
    xml_set_character_data_handler($sax, "onText");
?>
<html>

<head>
  <title>Catalog</title>
</head>

<body style="background-color: #3c3f41; color: #bd6f31">
  <h1>Book catalog</h1>
  <table border="1" width="100%">
    <tr>
      <th>Author</th>
      <th>Name</th>
      <th>Year published</th>
      <th>Price, usd</th>
    </tr>
    <?php
      //todo Парсинг. Так как SAX всего лишь читалка, то все что нам осталось
      // это запустить сам парсер. Этот парсер не работает с файлами, он работает
      // только со строками.
      // xml_parse($sax, "XML string!");
    //todo Чтобы зачитать файл в строку вторым параметром нужно указать функцию.
    // и уже в ней передать файл.
    xml_parse($sax, file_get_contents("catalog.xml"));
    ?>
  </table>
</body>

</html>