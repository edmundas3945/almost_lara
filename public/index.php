<?php
// phpinfo();exit;
require_once '../vendor/autoload.php';


$app = new app\core\Application(dirname(__DIR__));


$app->router->get('/', 'home');

$app->router->get('/about', 'about');

$app->router->get('/contact', 'contact');

$app->router->post('/contact', [\app\controller\SiteController::class, 'handleContact']);

$app->run();
