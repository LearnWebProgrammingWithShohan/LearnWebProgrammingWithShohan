<?php

// Local Database credentials.
define('DB_LOCAL_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'learnwebprogrammingwithshohan');

// Production Database credentials.
define('DB_PRODUCTION_SERVER', 'PRODUCTION');
define('DB_PRODUCTION_USERNAME', 'learnwithshohan');
define('DB_PRODUCTION_PASSWORD', 'ta75M*7b');
define('DB_PRODUCTION_NAME', 'learnwebprogrammingwithshohan');

if (DB_SERVER)
{
	$mysqli = new mysqli(DB_LOCAL_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
	if($mysqli === false){
		die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
}
elseif(DB_PRODUCTION_SERVER)
{
	$mysqli = new mysqli(DB_PRODUCTION_SERVER, DB_PRODUCTION_USERNAME, DB_PRODUCTION_PASSWORD, DB_PRODUCTION_NAME);

    // Check connection
	if($mysqli === false){
		die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
}
else
{
	echo 'Others';
}

?>