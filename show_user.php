<?php

require_once "bootstrap.php";

$theUserId = $argv[1];

$user = $entityManager->find("App\Model\User", (int)$theUserId);

echo "Name: " . $user->getName() . "\n";

//print_r($user->getReportedBugs());
foreach($user->getReportedBugs() as $bug) {
    echo $bug->getDescription() . PHP_EOL;
}

//echo "Engineer: ".$bug->getEngineer()->getName()."\n";
