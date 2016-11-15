<?php
include_once '../config/Database.php';
$database = new Database();
$db = $database->connect();
include_once '../objects/Read.php';
$reader = new Reader($db);

// Start XML file, create parent node
$stmt = $reader->read();
$doc = new DOMDocument;
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);
header("Content-type: text/xml");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt as $row){
  // ADD TO XML DOCUMENT NODE
  $node = $doc->createElement("marker", " ");
  $newnode = $parnode->appendChild($node);
  	$newnode->setAttribute("name", $row['name']);
  	$newnode->setAttribute("address", $row['address']);
  	$newnode->setAttribute("lat", $row['lat']);
  	$newnode->setAttribute("lon", $row['lon']);
  	$newnode->setAttribute("type", $row['type']);
}
//print_r($doc->saveXML());
echo $doc->saveXML();
 ?>
