<?php

namespace app\controllers;

use app\core\Error;
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
        View::create('users/show','user',$user);

    }

    public function create()
    {
        View::create('users/create');
    }

    public function store($request)
    {
       Validation::check([
           $request['pseudo'] => 'required',
           $request['email'] => 'required',
           $request['password'] => 'required'
       ]);

       User::create([
           'pseudo' => $request['pseudo'],
           'email' => $request['email'],
           'password' => $request['password']
       ]);

       View::redirect('/');
    }

    public function edit($id)
    {
        $user = User::find($id);
        View::create('users/edit','user',$user);
    }

    public function update($id,$request)
    {
        $user = User::find($id);

        Validation::check([
            $request['pseudo'] => 'required',
            $request['email'] => 'required',
            $request['password'] => 'required'
        ]);

        User::update([
            'pseudo' => $request['pseudo'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);
    }
}
