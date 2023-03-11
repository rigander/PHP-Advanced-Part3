<?php
// Создание объекта XML
	$xml = new DOMDocument();
// Загрузка XML документа
	$xml->load("catalog.xml");
// Создание объекта XSL
	$xsl = new DOMDocument();
// Загрузка XSL документа
	$xsl->load("catalog.xsl");
// Создание XSLT парсера
	$processor = new XSLTProcessor();
// Загрузка XSL объекта
	$processor->importStylesheet($xsl);
// Преобразование
    echo $processor->transformToXml($xml);
?>