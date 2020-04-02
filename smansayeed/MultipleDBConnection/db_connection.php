

<?php 

class Connection{

	function __construct($db_name,$server_name,$user_name,$password){

		$servername = $server_name;
		$username = $user_name;
		$password = $password;

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    echo "$db_name Connected successfully<br>";
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();
			    }

	}

	
}

$conn1 = new Connection('lwpws_task3-1','localhost','root','');

$conn2 = new Connection('lwpws_task3-2','localhost','root','');



 ?>