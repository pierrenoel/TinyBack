<?php

namespace app\controllers;

use app\core\View;
use app\models\User;

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

    public function store()
    {

    }


}
