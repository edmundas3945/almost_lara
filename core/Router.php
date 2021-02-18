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
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        // echo "This is router constructor <br>";
        $this->request = $request;
        $this->response = $response;
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
     * This creates post path and handling in route array.
     *
     * @param $path
     * @param $callback
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
        // '<pre>';
        // var_dump($this->routes);
        // '</pre>';
        // exit;

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
            //404

            $this->response->setResponseCode(404);
            return $this->renderView('_404');
            exit;
        endif;

        if (is_string($callback)) :
            return $this->renderView($callback);
        endif;

        echo call_user_func($callback);

        exit;
    }
    /**
     * Renders the page and applies the layout
     *
     * @param string $view
     * @return string|string[]
     */
    public function renderView(string $view)
    {
        $layout = $this->layoutContent();
        $page = $this->pageContent($view);
        // echo $layout;
        // take layout and replace the {{content}} with the $page content
        return str_replace('{{content}}', $page, $layout);
    }
    /**
     * Returns the layout HTML content
     *
     * @return string
     */
    protected function layoutContent()
    {
        //start buffering
        ob_start();
        include_once Application::$ROOT_DIR."/view/layout/main.php";
        //stop and return buffering
        return ob_get_clean();
    }
    /**
     * Returns only the given page HTML content
     *
     * @param $view
     * @return false|string
     */
    public function pageContent($view)
    {
        //start buffering
        ob_start();
        include_once Application::$ROOT_DIR . "/view/$view.php";
        // stop buffering
         return ob_get_clean();
    }
}
