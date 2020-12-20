<?php

use app\controllers\HomeController;
use app\controllers\ErrorController;

$url = $_SERVER['REQUEST_URI'];
$split = explode('/',$url);

if(isset($split[2])) if(preg_match('/^[0-9]*$/',$split[2]))  $id = $split[2];
if(isset($split[3])) if(preg_match('/^[0-9]*$/',$split[3]))  $id = $split[3];

if(isset($url))
{
    switch ($url)
    {
        case '/':
            $homeController = new HomeController();
            $homeController->index();
            break;
        case '/user/'.$id:
            $homeController = new HomeController();
            $homeController->show($id);
            break;
        case '/user/create':
            $homeController = new HomeController();
            if($_SERVER['REQUEST_METHOD'] === 'GET')  $homeController->create();
            if($_SERVER['REQUEST_METHOD'] === 'POST') $homeController->store();
            break;
        default:
            http_response_code('404');
            $errorController = new ErrorController();
            $errorController->notfound();
            break;
    }
}

