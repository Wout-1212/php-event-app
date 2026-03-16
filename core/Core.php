<?php

namespace Core;

use Core\Session;

class Core
{
    public static function Init(): void
    {
        Session::start();

        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
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
