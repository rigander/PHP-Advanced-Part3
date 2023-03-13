<?php
// Описание функции Web-сервиса
  function getStock($id) {	
    $stock = array(
			"1" => 100,
			"2" => 200,
			"3" => 300,
			"4" => 400,
			"5" => 500
    );
    if (isset($stock[$id])) {
      return $stock[$id];
    } else {
      throw new SoapFault("Server", "None");
    }	
  }
// Отключение кэширования WSDL-документа
ini_set("soap.wsdl_cache_enabled", "0");
// Создание SOAP-сервер
$server = new SoapServer("http://mysite.local/demo/soap/stock.wsdl");
// Добавить класс к серверу
$server->addFunction("getStock");
// Запуск сервера
$server->handle();
?>