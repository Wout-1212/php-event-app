<?php

namespace Core;

use Core\Session;

class Auth
{
    /**
     * Check if the user is logged in
     */
    public static function check() // checkt (alleen pagina's achter login) of er een user in de session zit, zo niet, redirect naar login
    {
        $currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $protectedPages = ['/admin', '/add', '/update'];
        if (in_array($currentRoute, $protectedPages) && empty(Session::get('user'))) {
            redirect('/');
        }
    }
}
