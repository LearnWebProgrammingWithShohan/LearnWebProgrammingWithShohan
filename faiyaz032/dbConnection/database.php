<?php
class Database{

    private $hostName;
    private $username;
    private $password;
    private $dbName;

    public function connect()
    {
        $hostName = $this->hostName = "localhost";
        $username = $this->username = "root";
        $password = $this->password = "";
        $dbName =   $this->password = "db_connection";

        $conn = new mysqli($hostName,$username,$password, $dbName);
        return $conn;
    }
}