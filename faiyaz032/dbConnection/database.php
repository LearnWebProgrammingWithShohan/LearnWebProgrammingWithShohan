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
$conn = new Database;
$connect = $conn->connect();

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database Connected successfully";
?>