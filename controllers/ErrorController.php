<?php


namespace app\controllers;
use app\core\View;

class ErrorController
{
    public function index()
    {
        View::create('error-404');
    }
}