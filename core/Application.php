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

    public array $errors;

    public function __construct()
    {
        $this->router = new Router();
        // $this->errors =;
    }

    public function run()
    {
        $this->router->resolve();
    }
}
