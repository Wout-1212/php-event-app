<?php

require_once "../vendor/autoload.php";

use Core\Core;
use Core\Router;
use Core\Session;

define('PUBLIC_PATH', __DIR__);

Core::Init();

// TODO: Remove this after implementing proper authentication
if (!Session::get('user_id')) {
    Session::set('user_id', 1);
}

$router = new Router();
$router->add('/', 'HomeController', 'index');

$router->add('login', 'LoginController', 'showLoginForm');
$router->add('authenticate', 'LoginController', 'authenticate');
$router->add('logout', 'LoginController', 'logout');

$router->add('add', 'AddController', 'showAddForm');

$router->add('update/{id}', 'UpdateController', 'showUpdateForm');
$router->add('save/{id?}', 'Savecontroller', 'save');

$uri = trim($_SERVER['REQUEST_URI'], '/');
$router->dispatch($uri);
