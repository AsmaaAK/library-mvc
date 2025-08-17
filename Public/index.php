<?php
require __DIR__.'/../autoload.php';
// var_dump(class_exists("App\Core\Router"));
// require __DIR__ . '/../Core/Router.php';

use App\Core\Router;

$router = new Router();
require __DIR__.'/../App/routes/web.php';
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
