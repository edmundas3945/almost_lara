<?php 

namespace app\core;


class Request
{
    /**
     * Get user form url
     * 
     * [REQUEST_URI] => /todo?id=15
     * extract /todo
     *
     * @return false/mixed/string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $questionPosition = strpos($path, '?');

        if ($questionPosition !== false) :
            $path = (substr($path, 0, $questionPosition));
        endif;

        return $path;

    }
    /**
     * will return http method get or post.
     *
     * @return string
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}