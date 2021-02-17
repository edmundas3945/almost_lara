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
        echo "<pre>";
        print_r($this->request->getPath());
        echo "</pre>";
        exit;
    }

    
}