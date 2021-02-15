<?php 

namespace app\core;

/**
 * Get user page from url
 * 
 * [REQUEST_URI] => /AlmostLara/todos?id=15
 * extract /todos
 * 
 * Class Request
 * 
 * @package app\core
 */

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/AlmostLara';
        $questionPosition = strpos($path, '?');
        echo "<pre>";
        print_r($questionPosition);
        echo "</pre>";
    }
}