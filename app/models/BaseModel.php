<?php

namespace App\Models;

use PDO;
use Core\Database;

class BaseModel
{
    protected $db;
    protected string $query;
    protected array $params = [];
    protected string $tableName = '';
    protected array $attributes = [];


    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Set the value of the specified attribute
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * Get the value of the specified attribute
     */
    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Save the model to the database
     */
    public function save()
    {
        /**
         * Check if there is any data to save
         */
        if (empty($this->attributes)) {
            throw new \Exception("No data to save.");
        }

        /**
         * Check if the ID is set, if so, update the record, otherwise, insert a new record
         */
        if (!empty($this->attributes['id'])) {
            $setClauses = [];

            /**
             * Loop through the attributes and create the SET clause
             */
            foreach ($this->attributes as $key => $value) {
                if ($key !== 'id') {
                    $setClauses[] = "$key = :$key";
                }
            }

            $setString = implode(", ", $setClauses);
            $this->query = "UPDATE {$this->tableName} SET $setString WHERE id = :id";
        } else {
            /**
             * Insert a new record
             */
            $columns = implode(", ", array_keys($this->attributes));
            $placeholders = ":" . implode(", :", array_keys($this->attributes));
            $this->query = "INSERT INTO {$this->tableName} ($columns) VALUES ($placeholders)"; // values zetten via placeholders en implode
        }

        $stmt = $this->db->prepare($this->query);

        /**
         * Bind the values to the statement
         */
        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        /**
         * Execute the statement
         */
        $success = $stmt->execute();

        /**
         * If it's a new record, set the ID attribute, this can be requested by using $model->id
         */
        if ($success && empty($this->attributes['id'])) {
            $this->attributes['id'] = $this->db->lastInsertId();
        }

        /**
         * Return the success status
         */
        return $success;
    }

    public static function all(bool $withTrashed = false)
    {
        /**
         * Create an instance of the model
         */
        $instance = new static();

        /**
         * Depending on the value of $withTrashed, get all records or only the non-deleted records
         */
        if ($withTrashed) {
            $stmt = $instance->db->query("SELECT * FROM {$instance->tableName}");
        } else {
            $stmt = $instance->db->query("SELECT * FROM {$instance->tableName} WHERE deleted_at IS NULL");
        }

        /**
         * Fetch the results as an object of the current class
         */
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    /**
     * Build the where clause of the query
     */
    public static function where($column, $value)
    {
        /**
         * Create an instance of the model
         */
        $instance = new static();
        $instance->query = "SELECT * FROM {$instance->tableName} WHERE {$column} = :value";
        $instance->params = [':value' => $value];

        return $instance;
    }

    /**
     * Retrieve the records based on the query that was built
     */
    public function get()
    {
        $stmt = $this->db->prepare($this->query);

        foreach ($this->params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        return $stmt->fetchObject(static::class);
    }

    /**
     * Retrieve the first record based on the query that was built
     */
    public function first()
    {
        $stmt = $this->db->prepare($this->query);

        foreach ($this->params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        return $stmt->fetchObject(static::class);
    }

}