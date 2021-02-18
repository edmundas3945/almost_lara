<?php
// phpinfo();exit;
require_once '../vendor/autoload.php';


$app = new app\core\Application(dirname(__DIR__));


$app->router->get('/', 'home');

$app->router->get('/about', 'about');

$app->router->get('/contact', 'contact');

$app->router->post('/contact', function () {
    return "handling form contact from Post request";
});

$app->run();
