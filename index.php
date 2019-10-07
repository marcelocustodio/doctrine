<?php

define('APP_PATH', __DIR__);

define('DS', DIRECTORY_SEPARATOR);

require_once APP_PATH . DS . 'app' . DS . 'core' . DS . 'bootstrap.php';

App\Core\Application::run( $entityManager );