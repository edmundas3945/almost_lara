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



        if (is_array($callback)) :
            $instance = new $callback[0];
            $callback[0] = $instance;
        endif;



        return call_user_func($callback, $this->request);

        exit;
    }
    /**
     * Renders the page and applies the layout
     *
     * @param string $view
     * @return string|string[]
     */
    public function renderView(string $view, array $params = [])
    {
        $layout = $this->layoutContent();
        $page = $this->pageContent($view, $params);
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
    protected function pageContent($view, $params)
    {

        // a smart way of creating variables dinamically

        // $name = $params['name'];

        foreach ($params as $key => $value){
            $$key = $value;
        }

        // echo '<pre>';
        // var_dump($params);
        // echo '</pre>';
        // exit;

        
        //start buffering
        ob_start();
        include_once Application::$ROOT_DIR . "/view/$view.php";
        // stop buffering
         return ob_get_clean();
    }
}
