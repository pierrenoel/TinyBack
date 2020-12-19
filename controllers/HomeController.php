<?php

namespace app\controllers;

use app\core\Validation;
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
        Validation::check([
            $_POST['pseudo'] => 'text',
            $_POST['email'] => 'email',
            $_POST['password'] => 'text'
        ]);

        User::create([
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ]);

        //View::redirect('/');
    }

}
