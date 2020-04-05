<?php 

function login_user($username, $password)
{
	global $mysqli;

	$username = trim($username);
	$password = trim($password);

	$query = "SELECT * FROM users WHERE username='{$username}' ";
	$select_user_query = mysqli_query($mysqli, $query);
	if (!$select_user_query) {
		die("Query Failed " . mysqli_error($mysqli));
	}

	while ($row = mysqli_fetch_array($select_user_query)) {
		$db_user_id = $row['id'];
		$db_username = $row['username'];
		$db_user_password = $row['password'];
		$db_user_role = $row['user_role'];
	}


	if ($username === $db_username) {

		
		if (password_verify($password, $db_user_password)) {	

			// Sending data with session
			$_SESSION["loggedin"] = true;
			$_SESSION["id"] = $db_user_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['user_role'] = $db_user_role;
			
			if ($db_user_role === 'Admin') {
				header("location: admin_dashboard.php");
			} elseif ($db_user_role === 'User') {				
				header("location: user_dashboard.php");
			} else {
				session_destroy();
				header("location: login.php");
			}
		}else {
			header("location: login.php");
		}
		
	} else {
		header("location: login.php");
	}
}

?>