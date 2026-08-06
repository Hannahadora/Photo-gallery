<?php

require_once("config.php");

class Database {
    public $connection;

    public function __construct() {
        $this->open_db_connection();
    }

    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_errno) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function get_connection() {
        return $this->connection;
    }

    public function query($query) {
        $result = $this->connection->query($query);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result) {
        if (!$result) {
            die("Database query failed." . $this->connection->error);
        }
    }

    public function escape_string($string) {
        return $this->connection->real_escape_string($string);
    }

    public function the_insert_id() {
        return $this->connection->insert_id;
    }
}

$database = new Database();