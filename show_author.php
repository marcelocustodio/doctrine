<?php

require_once "bootstrap.php";

$theAuthorId = $argv[1];

$theAuthorId = 2;

$author = $entityManager->find("App\Model\Author", (int)$theAuthorId);

echo "Name: " . $author->getName() . "\n";

echo 'Posts:' . PHP_EOL;

foreach($author->getPosts() as $post) {
    echo $post->getTitle() . PHP_EOL;
}
