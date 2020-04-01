<?php
class Database{

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
        $connection = new mysqli($this->hostName, $this->username, $this->password, $this->dbName);
        return $connection;
    }

    public function disconnect()
    {
            mysqli_close($this->connect()) OR die('There was a problem disconnecting from the database.');
    }
}
$database = new Database('localhost', 'root', '', 'db_connection'); //Here you have to pass your own credentials
$connect_db = $database->connect();


if (!$connect_db)
{
    die("Connection failed: " . mysqli_connect_error());

}elseif($connect_db){
    echo "Database Connected successfully";
}

?>