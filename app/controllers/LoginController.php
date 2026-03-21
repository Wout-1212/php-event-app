<?php

namespace App\Controllers;

use App\models\User;
use Core\Auth;
use Core\Session;

class LoginController
{
    public function showLoginForm()
    {
        view('login');
    }

    public function authenticate()
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

    public function logout()
    {
        Session::destroy();
        redirect('/');
    }
}