<?php

namespace app\core;

/**
 * Class Router
 * 
 * This is where we call controllers
 * 
 * @package app\core
 */
class Router
{
    /**
     * This holds all routes
     * 
     * routes[
     * ['get' => [
     * ['/' => function return,],
     * ['/about' => function return,],
     * ],
     * ['post' => [
     * ['/' => function return,],
     * ['/about' => function return,],
     * ],
     * 
     * 
     */
    protected array $routes = [];

    public Request $request;

    public function __construct($request)
    {
        // echo "This is router constructor <br>";
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) :
            echo "Page does not exist";
            exit;
        endif;

        echo call_user_func($callback);

        exit;
    }
}
