<?php


namespace app\controllers;
use app\core\View;

class ErrorController
{
    public function notfound()
    {
        View::create('error-404');
    }
}