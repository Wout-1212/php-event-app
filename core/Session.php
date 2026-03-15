<?php

namespace Core;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function set(string $key, mixed $value = null)
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function destroy()
    {
        session_destroy();
    }

}
