<?php

	class Database{

		public static function dbconnect(){

			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "php_oop_todoapp";
			// $conn = mysqli_connect($host, $user, $pass, $db);
				// if ($conn->connect_error) {
		  //   		die("Connection failed: " . $conn->connect_error);
				// }
				if($host){
					$conn = mysqli_connect($host, $user, $pass, $db);
				}
				else if($_SERVER['REMOTE_ADDR']){
					$conn = mysqli_connect($user, $pass);
				}
				else{
					echo "I dont know the rest" ;
				}

				// else{
				// 	echo "Connected";
				// }
				return $conn;    	
		}


	}
	
	$obj = new Database();
	$obj->dbconnect();


?>