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

    public Router $router;
    public Request $request;

    public array $errors;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        // $this->errors =;
    }

    public function run()
    {
        $this->router->resolve();
    }
}
