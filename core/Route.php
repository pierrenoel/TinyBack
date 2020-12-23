<?php

namespace app\core;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Route
{
    protected string $url;
    protected string $request;
    protected string $controller;
    protected array $routes = [];

    protected int $id = 0;

    public function route(string $url,string $request, string $controller)
    {

        $this->url = $url;
        $this->request = $request;
        $this->controller = $controller;

        $this->put($this->url, $this->request, $this->controller);
    }

    protected function put(string $url, string $request, string $controller)
    {
        if($request == 'POST') $this->routes[$url]['POST'] = $controller;
        if($request == 'GET') $this->routes[$url]['GET'] = $controller;

    }

    protected function explode(string $controller)
    {
        return explode('@',$controller);
    }

    protected function generate(string $method)
    {

        $url = $_SERVER['REQUEST_URI'];

        $request = $this->explode($this->routes[$url][$method]);

        $newController = $request[0];
        $newMethod = $request[1];

        $className = "app\\controllers\\{$newController}";
        $controller = new $className();

        if($this->id !== 'null')$controller->$newMethod($this->id);
        else $controller->$newMethod();
    }

    protected function check()
    {
        $url = $_SERVER['REQUEST_URI'];

        $split = explode('/',$url);

        foreach($this->routes as $url2 => $key)
        {
            if(preg_match('/\{id\}/',$url2)){
                if(isset($split[2])) if(preg_match('/^[0-9]*$/',$split[2]))  $this->id = $split[2];
                if(isset($split[3])) if(preg_match('/^[0-9]*$/',$split[3]))  $this->id = $split[3];

                $newUrl = str_replace('{id}',$this->id,$url2);
                $this->routes[$newUrl]['GET'] = $this->controller;
            }
        }
    }


    public function run()
    {

        $request_url = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        $this->check();

        if(!isset($this->routes[$url]['GET']))
        {
            header('location:/');
        }

        if($request_url === 'GET')
        {
          $this->generate('GET');
        }

        if($request_url === 'POST')
        {
            $this->generate('POST');
        }

    }

}

