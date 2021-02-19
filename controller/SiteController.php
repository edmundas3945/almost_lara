<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;

class SiteController extends Controller
{
    /**
     * This handles home page get request
     *
     * @return string|string[]
     */
    public function home()
    {
        $params = [
            'name' => 'AlmostLara',
            'subTitle' => 'This  is a nice way to l(earn) php',

        ];
        return $this->render('home', $params);
    }
    /**
     * This handles about page get request
     *
     * @return string|string[]
     */
    public function about()
    {
        $params = [
            'name' => 'About AlmostLara',
            'subTitle' => 'This  is a bout',
            'version' => 'This  is 1.0.0',

        ];
        return $this->render('about', $params);
    }

    /**
     * This is where we handle post contact form     
     * 
     * @return string
     */
    public function handleContact()
    {
        // return "handling form contact from Site controller";
        //we use get body METHod to see user input
        $body = Application::$app->request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
    }

    /**
     * This serves the contact view
     *
     * @return string
     */
    public function contact()
    {
        //lets render view
        // return "This should be a form";
        return $this->render('contact');
    }
}
