<?php

namespace app\controller;

use app\core\Application;

class SiteController
{
    /**
     * This handles home page get request
     *
     * @return string|string[]
     */
    public static function home()
    {
        $params = [
            'name' => 'AlmostLara',
            'subTitle' => 'This  is a nice way to l(earn) php',

        ];
        return Application::$app->router->renderView('home', $params);
    }
    /**
     * This handles about page get request
     *
     * @return string|string[]
     */
    public static function about()
    {
        $params = [
            'name' => 'About AlmostLara',
            'subTitle' => 'This  is a bout',
            'version' => 'This  is 1.0.0',

        ];
        return Application::$app->router->renderView('about', $params);
    }

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
