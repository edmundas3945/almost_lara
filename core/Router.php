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

    public function getPath($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        // echo "<pre>";
        // print_r($_SERVER);
        // echo "</pre>";
        // exit;
    }

    
}