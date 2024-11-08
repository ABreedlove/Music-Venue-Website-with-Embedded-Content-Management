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
	// get count of current events
	$numRows = 1;
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

	$sql = 'INSERT INTO venue_database.archived_events (ID, event_title, event_link, event_img, event_subtitle) VALUES ('.($numRows).', "[Title here]", '.'"archived-event-single.php?event_id='.($numRows).'",'. '"images/question-mark.png"'.', "[subtitle here]")';

	// post new event to both tables
	if($stmt = $db->query($sql))
	{

	}
	else 
	{
		echo "Could Not POST";
		echo $sql;
	}

	$sql = 'INSERT INTO venue_database.archived_event_singles (ID, event_title, event_content, event_img, event_artists, event_date, event_location) VALUES ('.($numRows).', "[Title goes here]", "Description of event goes here ...." , "images/question-mark.png", "[Artists go here]", "[Date goes here]", "[Location goes here]")';

	// post new event to both tables
	if($stmt = $db->query($sql))
	{

	}
	else 
	{
		echo "Could Not POST";
		echo $sql;
	}

} 

header("location: archived-events.php");

?>