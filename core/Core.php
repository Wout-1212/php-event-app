<?php

namespace Core;

use Core\Session;

class Core
{
    public static function Init(): void
    {
        Session::start();
    }

    public static function header()
    {
        ob_start();
    }

    public static function footer()
    {
        $content = ob_get_clean();
        require_once "../app/views/layout/default.php";
    }

}
