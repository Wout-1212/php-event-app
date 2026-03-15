<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $users = User::all();

        view('home', [
            'users'=> $users
        ]);
    }

}
