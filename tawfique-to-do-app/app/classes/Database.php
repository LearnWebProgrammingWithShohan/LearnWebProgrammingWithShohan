<?php

	class Database{

		public static function dbconnect(){

			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "php_oop_todoapp";
			$conn = mysqli_connect($host, $user, $pass, $db);
				if ($conn->connect_error) {
		    		die("Connection failed: " . $conn->connect_error);
				}
				// else{
				// 	echo "Connected";
				// }
				return $conn;    	
		}


	}
	
	// $obj = new Database();
	// $obj->dbconnect();


	

?>