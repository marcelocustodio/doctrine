<?php

require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new App\Model\Product('name');
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
