<?php

use app\controllers\HomeController;
use app\controllers\ErrorController;

$url = $_SERVER['REQUEST_URI'];
$split = explode('/',$url);
$id = $split[2];

if(isset($url))
{
    switch ($url)
    {
        case '/':
            $homeController = new HomeController();
            $homeController->index();
            break;
        case '/user/create':
            $homeController = new HomeController();
            $homeController->create();
            break;
        case '/user/'.$id:
            $homeController = new HomeController();
            $homeController->show($id);
            break;
        default:
            http_response_code('404');
            $errorController = new ErrorController();
            $errorController->notfound();
            break;
    }
}

