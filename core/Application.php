<?php

namespace app\core;

/**
 * Class application
 * 
 * This is main application
 * 
 * @package app\core
 */
class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;

    public array $errors;
    //way to get this app's properties everywhere in this web
    public static Application $app;

    public function __construct($rootPath)
    {
        //creating static property
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->response = new Response();
        $this->request = new Request();
        $this->router = new Router($this->request);
        // $this->errors =;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
