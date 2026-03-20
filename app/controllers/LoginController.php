<?php

namespace App\controllers;

use App\models\User;
use Core\Auth;
use Core\Session;

class LoginController
{
    public function showLoginForm()
    {
        view('login');
    }

    public function authenticate() // verificatie met custom javascript, tijdelijk
    {
        $email = get('email');
        $password = get('password');

        $user = User::where('email', $email)->get();

        if ($user && password_verify($password, $user->password)) {
            Session::set('user', $user->id);
            redirect('/admin');
        }

        Session::set('error', 'Invalid credentials');
        redirect('/login');
    }

    public function Logout()
    {
        Session::destroy();
        redirect('/');
    }
}