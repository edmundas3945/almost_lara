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

    public function __construct()
    {
        echo "This is router constructor <br>";
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
        // exit;
    }

    
}