<?php
include 'database.php';
use Connection\Mysql_Connection;
use Connection\PDO_Connection;

$mysql = new Mysql_Connection('localhost', 'root', '', 'db_connection'); //Here you have to pass your own credentials
$connect_db = $mysql->connect();

if (!$mysql)
{
    die("Connection failed: " . mysqli_connect_error());

}elseif($connect_db){
    echo "Database Connected successfully in Mysql";
}


//PDO class is created on database.php if anyone want to use PDO connection then he can simply create an object and start using;