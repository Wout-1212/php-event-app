<?php

require_once "../vendor/autoload.php";

use Core\Core;
use Core\Router;

define('PUBLIC_PATH', __DIR__);

Core::Init();

$router = new Router();
$router->add('/', 'HomeController', 'index');

$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
