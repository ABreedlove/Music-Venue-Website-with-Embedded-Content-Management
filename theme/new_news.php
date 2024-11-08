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
	// get count of current news
	$numRows = 1;
	$sql = "SELECT * FROM venue_database.news";

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

	//$sql = 'INSERT INTO venue_database.news (ID, news_title, news_content, news_date, news_img, news_link, news_link_text) VALUES ('.($numRows).', "[Title here]", "[Content here...]", "00/00/0000", "images/question-mark.png", "link goes here", "[Link text here]";';
	$sql = "INSERT INTO `news` (`ID`, `news_title`, `news_content`, `news_date`, `news_img`, `news_link`, `news_link_text`) VALUES ('".$numRows."', 'Title here', 'Content here...', '00/00/0000', 'images/question-mark.png', 'link goes here', 'Link text here');";

	// post new news to both tables
	if($stmt = $db->query($sql))
	{

	}
	else 
	{
		echo "Could Not POST";
		echo $sql;
	}

} 

header("location: news.php");

?>