<?php

use app\core\Route;

$route = new Route();

$route->route('/','GET','HomeController@index');
$route->route('/users','GET','HomeController@index');
$route->route('/user/create','GET','HomeController@create');
$route->route('/user/create','POST','HomeController@store');
$route->route('/user/show/{id}','GET','HomeController@show');

$route->route('/messages','GET','MessageController@index');

$route->run();

