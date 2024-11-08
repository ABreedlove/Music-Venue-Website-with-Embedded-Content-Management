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
	// get count of current about
	$numRows = 1;
	$sql = "SELECT * FROM venue_database.about";

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

	//$sql = 'INSERT INTO venue_database.about (ID, about_title, about_content, about_date, about_img, about_link, about_link_text) VALUES ('.($numRows).', "[Title here]", "[Content here...]", "00/00/0000", "images/question-mark.png", "link goes here", "[Link text here]";';
	$sql = "INSERT INTO `about` (`ID`, `about_title`, `about_content`) VALUES ('".$numRows."', 'Title here', 'Content here...');";

	// post new about to both tables
	if($stmt = $db->query($sql))
	{

	}
	else 
	{
		echo "Could Not POST";
		echo $sql;
	}

} 

header("location: about.php");

?>