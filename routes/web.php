<?php

use app\core\Route;

$route = new Route();

$route->route('/','GET','HomeController@index');

$route->route('/dashboard','GET','DashboardController@index');
$route->route('/user/show/{id}','GET','HomeController@show');

$route->route('/messages','GET','MessageController@index');
$route->route('/message/show/{id}','GET','MessageController@show');

$route->route('/user/create','GET','HomeController@create');
$route->route('/user/create','POST','HomeController@store',);
$route->route('/user/edit/{id}','GET','HomeController@edit',);


$route->route('/login','GET','AuthController@login');
$route->route('/login','POST','AuthController@auth');
$route->route('/logout','GET','AuthController@logout');


$route->run();

