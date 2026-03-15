<?php

namespace App\Models;

class User extends BaseModel
{
    /**
     * If you use a static function you need to to
     * $instance = new static();
     * $instance->db->query(...);
     *
     * If you are using a non-static function you can use
     * $this->db->query(...); (db is connected in the BaseModel)
     */
    public static function all()
    {
        $instance = new static();

        $stmt = $instance->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }
}
