<?php

class Database {

    public $connection;

    function __construct() {
        $this->openDbConnection();
    }

    //Opens Database Connection
    public function openDbConnection() {

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database Connection Failed!" . $this->connection->connect_error);
        }

    }

    //SQL Query method
    public function query($sql) {

        $result = $this->connection->query($sql);
        $this->confirmQuery($result);

        return $result;

    }

    //Checks if query is done or not
    private function confirmQuery($result) {

        if (!$result) {
            die("Query Failed!" . $this->connection->error);
        }

    }

    //Escape String
    public function escapeString($string) {

        $escapedString = $this->connection->escape_string($string);

        return $escapedString;

    }

    //Insert ID
    public function insertId() {
        return $this->connection->insert_id;
    }

} //End of class Database

$database = new Database();