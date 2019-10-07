<?php

// list_bugs.php
require_once "bootstrap.php";

$dql = "SELECT b, e, r FROM App\Model\Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach ($bugs as $bug) {
    echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."<br>\n";
    echo "    Reported by: ".$bug->getReporter()->getName()."<br>\n";
    echo "    Assigned to: ".$bug->getEngineer()->getName()."<br>\n";
    foreach ($bug->getProducts() as $product) {
        echo "    Platform: ".$product->getName()."<br>\n";
    }
    echo "<br>\n";
}