<?php
class Database{

    private $hostName;
    private $username;
    private $password;
    private $dbName;

    // this connect method should be able to have some parameters
    // not directly in mysqli method
    
    public function connect()
    {
        $hostName = $this->hostName = "localhost";
        $username = $this->username = "root";
        $password = $this->password = "";
        $dbName =   $this->password = "db_connection";

        $conn = new mysqli($hostName,$username,$password, $dbName);
        
        // avoid naming this short, try connection instead of conn
        
        return $conn;
    }
}

// connect from another file

$conn = new Database;
$connect = $conn->connect();

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database Connected successfully";
?>
