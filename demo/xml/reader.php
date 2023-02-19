<?php
$str = <<<XML
<?xml version='1.0'?>
<catalog>
	<book>
		<title>PHP5</title>
		<author>John Smith</author>
		<price>570</price>
	</book>
	<book>
		<title>PHP and XML</title>
		<author>Mike Doe</author>
		<price>480</price>
	</book>
	<book>
		<title>HTML and CSS</title>
		<author>Ivan Petrov</author>
		<price>320</price>
	</book>
</catalog>
XML;
error_reporting(E_ALL);
$reader = new XMLReader();
//var_dump($reader);
$reader->XML($str);
$count=0;
//$reader->read();
while($reader->read()){
	//echo $reader->name.': '.$reader->depth.'<br>';
	//echo $a;
	if($reader->name === "book" && $reader->nodeType == XMLReader::ELEMENT){
		$dom = $reader->expand();//.'<br>'; 
		//var_dump($dom);
		foreach($dom->childNodes as $item)
			echo 'item: '.$item->nodeName.'<br>';
		exit;
		//echo $reader->name.'<br>';
		//$reader->next();
		//echo $reader->value;
		echo 'ok';//exit;
	}
	//$reader->next();
}	
//echo $count;	
?>