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

	// DELETING EVENTS ROW

	$sql = "DELETE FROM venue_database.archived_events WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from archived events";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE archived_events_backup AS SELECT * FROM archived_events;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE archived_events_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE archived_events_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM archived_events;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in archived events";
	}
	else 
	{
		echo "Could Not delete all rows from archived events";
	}

	$sql = "ALTER TABLE archived_events AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in archivedevents";
	}
	else 
	{
		echo "Could Not reset auto increment in archived events";
	}

	$sql = "ALTER TABLE archived_events CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to archivedevents table";
	}
	else 
	{
		echo "Could Not add autoincrement to archivedevents table";
	}

	$sql = "INSERT INTO archived_events (event_title, event_link, event_img, event_subtitle) SELECT event_title, event_link, event_img, event_subtitle FROM archived_events_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade archivedevents table from backup";

		$sql = "DROP TABLE archived_events_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped archived events table backup";
		}
		else 
		{
			echo "Could Not drop archived events table backup";
		}
	}
	else 
	{
		echo "Could Not remake archivedevents table from backup";
	}


// DELETING EVENT_SINGLES ROW
	
	$sql = "DELETE FROM venue_database.archived_event_singles WHERE ID = ".$rid.";";

	if($stmt = $db->query($sql))
	{
		echo "deleted from arch event singles";
	}
	else 
	{
		echo "Could Not Retrieve";
	}

	// the following commands reorder the table ids after deletion of a row

	$sql = "CREATE TABLE archived_event_singles_backup AS SELECT * FROM archived_event_singles;";

	if($stmt = $db->query($sql))
	{
		echo "created backup table";
	}
	else 
	{
		echo "Could Not create backup table";
	}

	$sql = "ALTER TABLE archived_event_singles_backup ADD PRIMARY KEY (ID);";

	if($stmt = $db->query($sql))
	{
		echo "added primary key to backup table";
	}
	else 
	{
		echo "Could Not add primary key to backup table";
	}

	$sql = "ALTER TABLE archived_event_singles_backup CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to backup table";
	}
	else 
	{
		echo "Could Not add autoincrement to backup table";
	}

	$sql = "DELETE FROM archived_event_singles;";

	if($stmt = $db->query($sql))
	{
		echo "deleted all rows in archived event singles";
	}
	else 
	{
		echo "Could Not delete all rows from archived event singles";
	}

	$sql = "ALTER TABLE archived_event_singles AUTO_INCREMENT = 0;";

	if($stmt = $db->query($sql))
	{
		echo "reset auto increment in archived event singles";
	}
	else 
	{
		echo "Could Not reset auto increment in archivedeventsingles";
	}

	$sql = "ALTER TABLE archived_event_singles CHANGE ID ID INT(11)AUTO_INCREMENT;";

	if($stmt = $db->query($sql))
	{
		echo "added autoincrement to archevent singles table";
	}
	else 
	{
		echo "Could Not add autoincrement to archevent singles table";
	}

	$sql = "INSERT INTO archived_event_singles (event_title, event_content, event_img, event_artists, event_date, event_location) SELECT event_title, event_content, event_img, event_artists, event_date, event_location FROM archived_event_singles_backup ORDER BY ID ASC;";

	if($stmt = $db->query($sql))
	{
		echo "remade archived event singles table from backup";

		$sql = "DROP TABLE archived_event_singles_backup;";

		if($stmt = $db->query($sql))
		{
			echo "dropped archived event singles table backup";
		}
		else 
		{
			echo "Could Not drop archived event singles table backup";
		}
	}
	else 
	{
		echo "Could Not remake archived event singles table from backup";
	}

	// update the event_ids on links from events page to event-singles pages
	$numRows = 0;
	$sql = "SELECT * FROM venue_database.archived_events";


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
			$sql = 'UPDATE venue_database.archived_events SET event_link = "archived-event-single.php?event_id=' .$i. '" WHERE ID = '. $i .';';

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

header("location: archived-events.php");

?>