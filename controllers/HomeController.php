<?php

namespace app\controllers;

use app\models\User;
use app\core\View;

class HomeController
{
    public function index()
    {
        $users = User::all();
        view::create('welcome','users',$users);
    }

    public function show($id)
    {
        $user = User::find($id);
        View::create('show','user',$user);
    }

    public function create()
    {
        View::create('create');
    }

}
