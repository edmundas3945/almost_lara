<?php
// phpinfo();exit;
require_once './core/Application.php';
require_once './vendor/autoload.php';

use app\core\Router;

$app = new app\core\Application();

$router = new app\core\Router();

$app->router->get('/', function () {
    return "this is home page";
});

$app->router->get('/about', function () {
    return "this is home page";
});

$app->run();
