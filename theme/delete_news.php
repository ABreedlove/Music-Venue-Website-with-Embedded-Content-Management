<?php

require_once "php/config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: login.php");
	exit;
}
else
{
	echo "WELCOME DAD!";
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$rid = $_GET["news_id"];

	// delete respective news rows
	/*$sql = "DELETE FROM venue_database.news_singles WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from news singles";
	}
	else 
	{
		echo "Could Not Retrieve";
	}*/

	// DELETING news ROW

	$sql = "DELETE FROM venue_database.news WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from news";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE news_backup AS SELECT * FROM news;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE news_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE news_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM news;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in news";
	}
	else 
	{
		echo "Could Not delete all rows from news";
	}

	$sql = "ALTER TABLE news AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in news";
	}
	else 
	{
		echo "Could Not reset auto increment in news";
	}

	$sql = "ALTER TABLE news CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to news table";
	}
	else 
	{
		echo "Could Not add autoincrement to news table";
	}

	$sql = "INSERT INTO news (news_title, news_content, news_date, news_img, news_link, news_link_text) SELECT news_title, news_content, news_date, news_img, news_link, news_link_text FROM news_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade news table from backup";

		$sql = "DROP TABLE news_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped news table backup";
		}
		else 
		{
			echo "Could Not drop news table backup";
		}
	}
	else 
	{
		echo "Could Not remake news table from backup";
	}


}

header("location: news.php");

?>