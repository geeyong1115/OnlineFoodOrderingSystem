<?php
/**
 * @author YapYoonEn
 */
use App\Models\FoodBeverages;

$foodbeverages = FoodBeverages::all();
$xml = new \XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->startDocument();
$xml->writePI('xml-stylesheet', 'type="text/xsl" href="foodBeverage.xsl"');
$xml->writeDTD('foodbeverages', null, 'foodBeverage.dtd');
$xml->startElement('foodbeverages');

foreach ($foodbeverages as $food) {
    $xml->startElement('foodbeverage');
    $xml->writeElement('id', $food->id);
    $xml->writeElement('name', $food->name);
    $xml->writeElement('desc', $food->desc);
    $xml->writeElement('price', $food->price);
    $xml->writeElement('status', $food->status);
    $xml->endElement();
}
$xml->endElement();
$xml->endDocument();

$contents = $xml->outputMemory();
Storage::put('foodBeverage.xml', $contents);