<?php
// phpinfo();exit;

use app\core\AuthController;

require_once '../vendor/autoload.php';


$app = new app\core\Application(dirname(__DIR__));


$app->router->get('/', [\app\controller\SiteController::class, 'home']);

$app->router->get('/about', [\app\controller\SiteController::class, 'about']);

$app->router->get('/contact', [\app\controller\SiteController::class, 'contact']);

$app->router->post('/contact', [\app\controller\SiteController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);

$app->router->post('/register', [AuthController::class, 'register']);

$app->run();
