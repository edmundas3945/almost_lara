<?php
// phpinfo();exit;
require_once '../vendor/autoload.php';


$app = new app\core\Application(dirname(__DIR__));


$app->router->get('/', [\app\controller\SiteController::class, 'home']);

$app->router->get('/about', [\app\controller\SiteController::class, 'about']);

$app->router->get('/contact', [\app\controller\SiteController::class, 'contact']);

$app->router->post('/contact', [\app\controller\SiteController::class, 'handleContact']);

$app->run();
