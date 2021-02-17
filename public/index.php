<?php
// phpinfo();exit;
require_once '../vendor/autoload.php';

use app\core\Router;

$app = new app\core\Application();


$app->router->get('/', function () {
    return "this is home page";
});

$app->router->get('/about', function () {
    return "this is about page";
});

$app->run();
