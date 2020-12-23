<?php

use app\core\Route;

$route = new Route();



$route->route('/','GET','HomeController@index');
$route->route('/user/show/{id}','GET','HomeController@show');
$route->route('/user/create','GET','HomeController@create');
$route->route('/user/create','POST','HomeController@store');


$route->route('/messages','GET','MessageController@index');
$route->route('/message/show/{id}','GET','MessageController@show');

$route->run();

