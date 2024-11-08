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
	$rid = $_GET["event_id"];

	// delete respective event rows
	/*$sql = "DELETE FROM venue_database.event_singles WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from event singles";
	}
	else 
	{
		echo "Could Not Retrieve";
	}*/

	// DELETING EVENTS ROW

	$sql = "DELETE FROM venue_database.events WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from events";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE events_backup AS SELECT * FROM events;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE events_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE events_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM events;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in events";
	}
	else 
	{
		echo "Could Not delete all rows from events";
	}

	$sql = "ALTER TABLE events AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in events";
	}
	else 
	{
		echo "Could Not reset auto increment in events";
	}

	$sql = "ALTER TABLE events CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to events table";
	}
	else 
	{
		echo "Could Not add autoincrement to events table";
	}

	$sql = "INSERT INTO events (event_title, event_link, event_img, event_subtitle) SELECT event_title, event_link, event_img, event_subtitle FROM events_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade events table from backup";

		$sql = "DROP TABLE events_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped events table backup";
		}
		else 
		{
			echo "Could Not drop events table backup";
		}
	}
	else 
	{
		echo "Could Not remake events table from backup";
	}


// DELETING EVENT_SINGLES ROW
	
	$sql = "DELETE FROM venue_database.event_singles WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from event singles";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE event_singles_backup AS SELECT * FROM event_singles;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE event_singles_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE event_singles_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM event_singles;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in event singles";
	}
	else 
	{
		echo "Could Not delete all rows from event singles";
	}

	$sql = "ALTER TABLE event_singles AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in events";
	}
	else 
	{
		echo "Could Not reset auto increment in events";
	}

	$sql = "ALTER TABLE event_singles CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to event singles table";
	}
	else 
	{
		echo "Could Not add autoincrement to event singles table";
	}

	$sql = "INSERT INTO event_singles (event_title, event_content, event_img, event_artists, event_date, event_location) SELECT event_title, event_content, event_img, event_artists, event_date, event_location FROM event_singles_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade event singles table from backup";

		$sql = "DROP TABLE event_singles_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped event singles table backup";
		}
		else 
		{
			echo "Could Not drop event singles table backup";
		}
	}
	else 
	{
		echo "Could Not remake event singles table from backup";
	}

	// update the event_ids on links from events page to event-singles pages
	$numRows = 0;
	$sql = "SELECT * FROM venue_database.events";


	if($stmt = $db->query($sql))
	{
		while($row = $stmt->fetch_assoc()) 
		{
			$numRows += 1;
		}
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	if($numRows > 0)
	{
		for ($i = 1; $i <= $numRows; $i++) {
			$sql = 'UPDATE venue_database.events SET event_link = "event-single.php?event_id=' .$i. '" WHERE ID = '. $i .';';

			if($stmt = $db->query($sql))
			{
				echo "updated link rid: " . $i;
			}
			else 
			{
				echo "Could Not update link rid at: " . $i;
			}
		}
	}

}

header("location: events.php");

?>