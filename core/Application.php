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

    public array $errors;

    public function __construct($rootPath)
    {
        //creating static property
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);
        // $this->errors =;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
