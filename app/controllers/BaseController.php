<?php

namespace App\Controllers;


use Core\Auth as Auth;

class BaseController
{
    public function __construct()
    {
        Auth::check();
    }

}
