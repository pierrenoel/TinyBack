<?php

namespace app\core;

class Route
{
    protected string $url;
    protected string $request;
    protected string $controller;
    protected array $routes = [];

    protected string $url_server;
    protected string $method_server;

    protected int $id = 0;

    /*
     * Passing all the data to the put function in order to create a new array
     * @param string $url, string $request, string $controller
     */
    public function route(string $url,string $request, string $controller)
    {
        $this->url = $url;
        $this->request = $request;
        $this->controller = $controller;

        $this->url_server = $_SERVER['REQUEST_URI'];
        $this->method_server = $_SERVER['REQUEST_METHOD'];

        $this->put($this->url, $this->request, $this->controller);

    }

    /*
     * Generate the array routes
     * @param string $url, string $request, string $controller
     */
    protected function put(string $url, string $request, string $controller)
    {
        if($request == 'POST') $this->routes[$url]['POST'] = $controller;
        if($request == 'GET') $this->routes[$url]['GET'] = $controller;
    }

    /*
     * Check if there is an {id} in the url of the routes[]
     */
    protected function check()
    {
        /*
         * Call the function explodeUrl to split the url
         */
        $split = $this->explodeUrl($this->url_server);

        /*
         * Looping to get the url from the array routes
         */
        foreach($this->routes as $url2 => $key)
        {
            /*
             * Check if there is an {id} in the url of the routes[]
             */
            if(preg_match('/\{id\}/',$url2)){
                /*
                 * The id can be in the second or the third position
                 */
                if(isset($split[2])) if(preg_match('/^[0-9]*$/',$split[2]))  $this->id = $split[2];
                if(isset($split[3])) if(preg_match('/^[0-9]*$/',$split[3]))  $this->id = $split[3];

                /*
                 * Get the id of the url from the server
                 * Replace the {id} with the id of the url from the server
                 */
                $newUrl = str_replace('{id}',$this->id,$url2);

                $newController = $this->routes[$url2]['GET'];

                /*
                 * Stock it in the array routes
                 */
                $this->routes[$newUrl]['GET'] = $newController;
            }
        }
    }

    /*
     * The Generate method instantiate the controller and call a method
     * @param string $method
     */
    protected function generate(string $method)
    {

        /*
         * $request returns an array of two indexes (the controller & the method)
         */
        $request = $this->explodeController($this->routes[$this->url_server][$method]);

        /*
         * The result from the array
         */
        $newController = $request[0];
        $newMethod = $request[1];

        /*
         * POST is the result of the request method from the server
         */
        if($method == 'POST')
        {
            $posts = [];

            foreach ($_POST as $key => $value) { $posts[$key] = $value; }

            $this->generateControllerMethod($newController,$newMethod,$posts);

        }
        /*
        * GET is the result of the request method from the server
        */
        if($method == 'GET')
        {
            $this->generateControllerMethod($newController,$newMethod,$this->id);
        }

    }

    public function run()
    {
        /*
         * Call the method check
         * This method checks if there is an id in the url
         */

        $this->check();

        /*
         * Check the request method from the server,
         * depending on the result call the function generate with the right method
         */
        if($this->method_server === 'GET') $this->generate('GET');

        if($this->method_server === 'POST') $this->generate('POST');

        if(!isset($this->routes[$this->url]['GET']))header('Location: /');

    }

        /*
     * Call the method from the controller
     * @param string $controller, $data
     */
    public function generateControllerMethod(string $controller, string $model, $data)
    {
        /*
         * Get the namespace of the controllers
         */
        $className = "app\\controllers\\{$controller}";

        /*
         * Instantiate the new controller
         */
        $generateController = new $className();

        /*
         * Call the right method from the controller, passing some data
         */
        $generateController->$model($data);

    }

    /*
   * Explode the controller from its method
   * @param string $controller
   * @return array
   */
    protected function explodeController(string $controller)
    {
        return explode('@',$controller);
    }

     /*
      * Explode the url
      * @param string $url
      * @return array
      */
    protected function explodeUrl(string $url)
    {
        return explode('/',$url);
    }

    public static function auth($func)
    {
        session_start();
        if($_SESSION['connected']== false) View::redirect('/login');
    }

}

