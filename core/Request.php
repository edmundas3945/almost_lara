<?php 

namespace app\core;

/**
 * Get user page from url
 * 
 * [REQUEST_URI] => /todo?id=15
 * extract /todo
 * 
 * Class Request
 * 
 * @package app\core
 */

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

        // echo "<pre>";
        // print_r($questionPosition);
        // echo "</pre>";
    }
}