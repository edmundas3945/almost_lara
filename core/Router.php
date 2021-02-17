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

    /**
     * Add get route and callback fn to route array
     *
     * @param string $path
     * @param $callback
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    /**
     * executes user function if it is exists in routes array
     *
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) :
            echo "Page does not exist";
            exit;
        endif;

        if (is_string($callback)) :
            return $this->renderView($callback);
        endif;

        echo call_user_func($callback);

        exit;
    }

    public function renderView(string $view)
    {
        include_once __DIR__."/../view/$view.php";
    }
}
