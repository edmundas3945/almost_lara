<?php

namespace app\controller;

use app\core\Application;

class SiteController
{
    /**
     * This is where we handle post contact form     
     * 
     * @return string
     */
    public static function handleContact()
    {
        return "handling form contact from Site controller";
    }
    /**
     * This serves the contact view
     *
     * @return string
     */
    public static function contact()
    {
        //lets render view
        // return "This should be a form";
        return Application::$app->router->renderView('contact');
    }
}
