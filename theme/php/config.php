<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'venue_database');
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);


function connect() 
{
	/* connect to mysql database */
	$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

	// check db connection
	if($db == false)
	{
		die("CONNECTION ERROR." . mysqli_connect_error());
	}
	else {
		return $db;
	}
}

$db = connect();

?>