<?php

namespace Core;

use Core\Session;

class Auth
{
    /**
     * Check if the user is logged in
     */
    public static function check() // checkt of er een user in de session zit, zo niet, redirect naar login
    {
        if (empty(Session::get('user'))) {
            redirect('/login');
        }
    }

}