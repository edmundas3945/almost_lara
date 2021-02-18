<?php 

namespace app\core;

/**
 * Undocumented class
 * @package app\core
 */
class Response
{
    /**
     * Sets http response code
     *
     * @param integer $code
     * @return void
     */
    public function setResponseCode(int $code)
    {
        http_response_code($code);
    }
}