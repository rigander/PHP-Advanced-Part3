<?php
/* Наш склад */
$stock = ['a'=>100, 'b'=>200, 'c'=>300];

/* Основная функция */
function get_stock($method_name, $args, $extra) {
  $code = $args[0];
  if (isset($GLOBALS['stock'][$code]))
    return "На полке '$code' " . $GLOBALS['stock'][$code] . ' товаров';
  else
    return ['faultCode' => 1, 'faultString' => "Полка '$code' отсутствует!"];
}

/* Создаем XML-RPC сервер и регистрируем функцию */
$server = xmlrpc_server_create();
xmlrpc_server_register_method($server, "getStock", "get_stock");

// Принимаем запрос
$request = file_get_contents("php://input");

/*Отдаем правильный заголовок*/
header('Content-Type: text/xml;charset=utf-8');
/* Отдаем результат */
print xmlrpc_server_call_method($server, $request, null);
?>