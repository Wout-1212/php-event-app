<?php

namespace Core;

use PDO;

class Database
{
    private static $instance = null;
    private $pdo;

    /**
     * Connect to the database
     */
    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=2_webdevbasics_examen_p3;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Our good old singleton pattern
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }

}
