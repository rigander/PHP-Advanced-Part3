<?php
$xmlWriter = new XMLWriter();
$xmlWriter->openMemory();
$xmlWriter->setIndent(true);
$xmlWriter->startDocument('1.0','UTF-8');
$xmlWriter->startElement('books');
	$xmlWriter->startElement('book');
		$xmlWriter->startElement('author');
		$xmlWriter->text('John Smith');
		$xmlWriter->endElement();
		$xmlWriter->startElement('title');
		$xmlWriter->text('PHP5');
		$xmlWriter->endElement();
	$xmlWriter->endElement();
$xmlWriter->endElement();	
$xmlWriter->endDocument();
echo $xmlWriter->outputMemory();
/*
$xmlWriter = new XMLWriter();
$xmlWriter->openUri('php://output');
$xmlWriter->setIndent(true);
if($xmlWriter)
{
  $xmlWriter->startDocument('1.0','UTF-8');
  $xmlWriter->startElement('Books');
  
  $memXmlWriter = new XMLWriter();
  
  $memXmlWriter->openMemory();
  $memXmlWriter->setIndent(true);
  //$memXmlWriter->setIndentString('\t\t');
  for($i=1;$i<=25;$i++)
  {
    $memXmlWriter->startElement('book');
      $memXmlWriter->text('book_'.$i);
    $memXmlWriter->endElement();
    
    if($i%5 == 0)
    {
      $batchXmlString = $memXmlWriter->outputMemory(true);
      $xmlWriter->writeRaw($batchXmlString);
    }
  }
  $memXmlWriter->flush();
  unset($memXmlWriter);
  $xmlWriter->endElement();
  $xmlWriter->endDocument();  
}
*/
?>