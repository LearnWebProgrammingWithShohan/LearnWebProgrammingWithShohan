<?php

	class Database{

		public static function dbconnect(){

				// Local DB Config
				$local_server = 'localhost';
			 	$db_username = 'root';
			 	$db_password = '';
 				$db_name = 'php_oop_todoapp';

				// Remote DB Config
				$remote_server = $_SERVER['REMOTE_ADDR'];
			 	$remote_db_username = 'learnwithshohan';
			 	$remote_db_password = 'ta75M*7b';
 				$remote_db_name = 'learnwithshohandb';
			

				if($local_server){
					$conn = mysqli_connect($local_server, $db_username, $db_password, $db_name);
				}
				else if($remote_server){
					$conn = mysqli_connect($remote_server, $remote_db_username, $remote_db_password, $remote_db_name);
				}
				else{
					echo "DB Connected Failed" ;
				}

				return $conn;    	
		}


	}
	

?>