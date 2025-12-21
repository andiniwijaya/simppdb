<?php

require_once __DIR__ . '/Config.php';

class Database {

    public $conn;

    public function __construct() {

        $host = Config::env('DB_HOST');
        $user = Config::env('DB_USER');
        $pass = Config::env('DB_PASS');
        $name = Config::env('DB_NAME');

        $this->conn = new mysqli($host, $user, $pass, $name);

        if($this->conn->connect_error){
            die("Database Failed!");
        }
    }
}
