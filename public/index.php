<?php

require_once "../vendor/autoload.php";

use Core\Core;
use Core\Router;

define('PUBLIC_PATH', __DIR__);

Core::Init();

$router = new Router();
$router->add('/', 'HomeController', 'index');

$router->add('login', 'LoginController', 'showLoginForm');
$router->add('authenticate', 'LoginController', 'authenticate');
$router->add('logout', 'LoginController', 'logout');

$router->add('add', 'AddController', 'showAddForm');

$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
