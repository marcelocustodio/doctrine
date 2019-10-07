<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

define('APP_PATH', __DIR__);

define('DS', DIRECTORY_SEPARATOR);


// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(
        $paths = [APP_PATH . DS . 'app' . DS . 'model'], 
        $isDevMode, 
        $proxyDir, 
        $cache, 
        $useSimpleAnnotationReader);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// Setup connection parameters
$conn = [
    'dbname' => 'doctrine',
    'user' => 'root',
    'password' => '123',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);