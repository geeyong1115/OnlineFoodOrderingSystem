<?php
/**
 * @author YapYoonEn
 */
use App\Models\Order;
use App\Models\OrderDetails;

$orders = Order::all();
$xml = new \XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->startDocument();
$xml->writePI('xml-stylesheet', 'type="text/xsl" href="Order.xsl"');
$xml->writeDTD('orders', null, 'Order.dtd');
$xml->startElement('orders');

foreach ($orders as $order) {
    $xml->startElement('order');
    $xml->writeElement('id', $order->id);
    $xml->writeElement('total_price', $order->total_price);
    $xml->writeElement('table_no', $order->table_no);
    $xml->writeElement('status', $order->status);
    $xml->writeElement('created_at', $order->created_at);
    $xml->writeElement('updated_at', $order->updated_at);
    $xml->endElement();
}
$xml->endElement();
$xml->endDocument();

$contents = $xml->outputMemory();
Storage::put('Order.xml', $contents);



$details = OrderDetails::all();
$xml2 = new \XMLWriter();
$xml2->openMemory();
$xml2->setIndent(true);
$xml2->startDocument();
$xml2->writePI('xml-stylesheet', 'type="text/xsl" href="Details.xsl"');
$xml2->writeDTD('details', null, 'Details.dtd');
$xml2->startElement('details');

foreach ($details as $detail) {
    $xml2->startElement('detail');
    $xml2->writeElement('id', $detail->id);
    $xml2->writeElement('order_id', $detail->order_id);
    $xml2->writeElement('food_id', $detail->food_id);
    $xml2->writeElement('quantity', $detail->quantity);
    $xml2->writeElement('price', $detail->price);
    $xml2->writeElement('created_at', $detail->created_at);
    $xml2->writeElement('updated_at', $detail->updated_at);
    $xml2->endElement();
}
$xml2->endElement();
$xml2->endDocument();

$contents2 = $xml2->outputMemory();
Storage::put('Details.xml', $contents2);