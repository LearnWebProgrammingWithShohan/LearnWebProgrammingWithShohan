<?php

namespace Connection;
use PDO;
use PDOException;
use mysqli;

//mySql Connection
class Mysql_Connection{

    private $hostName = '';
    private $username ='';
    private $password ='';
    private $dbName = '';

    public function __construct($hostName,$username,$password,$dbName)
    {
        $this->hostName = $hostName;
        $this->username = $username;
        $this->password = $password;
        $this->dbName =   $dbName;
    }

    public function connect()
    {
        $connect = new mysqli($this->hostName, $this->username, $this->password, $this->dbName);
        return $connect;
    }

    public function disconnect()
    {
            mysqli_close($this->connect()) OR die('There was a problem disconnecting from the database.');
    }
}


//PDO Connection
class PDO_Connection{

    private $hostName = '';
    private $username ='';
    private $password ='';
    private $dbName = '';

    public function __construct($hostName,$username,$password,$dbName)
    {
        $this->hostName = $hostName;
        $this->username = $username;
        $this->password = $password;
        $this->dbName =   $dbName;
    }

    public function connect()
    {
        try{

            $dsn = "mysql:host".$this->hostName.";dbName=".$this->dbName;
            $pdo = new PDO($dsn,$this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }catch(PDOException $e){
            echo "Connection Failed".$e->getMessage();
        }
    }

}