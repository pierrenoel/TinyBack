<?php 

namespace app\controllers; 

use app\core\Auth;
use app\core\Validation;
use app\core\View;

class AuthController
{
    public function login()
    {
        View::create('auth/login');
    }

    public function auth($request)
    {
        Validation::check([
           $request['email'] => 'required',
           $request['password'] => 'required'
        ]);

        $res = Auth::login([
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        // To improve!!!
        Auth::startSession();

    }

    public function logout()
    {
        Auth::logout();
        View::redirect("/");
    }
}