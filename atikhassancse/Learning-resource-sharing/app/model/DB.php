<?php
namespace App\model;
use mysqli;

class DB
{
    protected static $instance = null;
    private $host = null;
    private $username  = null;
    private $password  = null;
    private $database = null;


    public function __construct()
    {
        $this->host = HOST;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = DATABASE;
        $this->connect();
    }

    private function connect()
    {
        $connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if($connection->connect_errno){
            echo "Database Connection failed".$connection->connect_error;
            exit();
        }
        self::$instance = $connection;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)){
            self::$instance = new DB();
        }
        return self::$instance;
    }

}