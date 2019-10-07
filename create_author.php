<?php

require_once "bootstrap.php";

$newAuthorName = $argv[1];

$author = new App\Model\Author();
$author->setName($newAuthorName);
$post = new App\Model\Post();
$post->setText('Teologia Sistematica');
$post->setTitle('TS');
$author->assignToPost($post);

$post->setAuthor($author); // sem essa linha, o author_di em 'post' ficará nulo

$entityManager->persist($author);
//$entityManager->persist($post); // OK TANTO COM COMO SEM
$entityManager->flush();

echo "Created User with ID " . $author->getId() . "\n";
