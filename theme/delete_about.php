<?php

require_once "php/config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: login.php");
	exit;
}
else
{
	echo "Authorized";
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$rid = $_GET["about_id"];



	// DELETING about ROW

	$sql = "DELETE FROM venue_database.about WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from about";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE about_backup AS SELECT * FROM about;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE about_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE about_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM about;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in about";
	}
	else 
	{
		echo "Could Not delete all rows from about";
	}

	$sql = "ALTER TABLE about AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in about";
	}
	else 
	{
		echo "Could Not reset auto increment in about";
	}

	$sql = "ALTER TABLE about CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to about table";
	}
	else 
	{
		echo "Could Not add autoincrement to about table";
	}

	$sql = "INSERT INTO about (about_title, about_content) SELECT about_title, about_content FROM about_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade about table from backup";

		$sql = "DROP TABLE about_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped about table backup";
		}
		else 
		{
			echo "Could Not drop about table backup";
		}
	}
	else 
	{
		echo "Could Not remake about table from backup";
	}


}

header("location: about.php");

?>