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
	$index1 = 0;
	$t;

	print_r($_POST);
	
	echo sizeOf($_POST['textfield']);
	echo sizeOf($_POST['rid']);
	echo sizeOf($_POST['column-type']);

	$i = 0;

	foreach($_POST['index'] as $index)
	{
		echo $index;
		if($index == '')
		{
			$index1++;
		}
		else
		{
			$i = implode($_POST['index']);
		}
	}

	echo "INDEX IS: " . $i . ";";

	foreach($_POST['textfield'] as $textfield)
	{
		echo $textfield;

		if($textfield == '')
		{
			$index1++;
		}
		else
		{

			$t = $_POST['textfield'];
		}
	}

	foreach($_POST['rid'] as $rid)
	{
		echo $rid;
		if($rid == '')
		{
			$index1++;
		}
		else
		{
			$rid = $_POST['rid'];
		}
	}

	foreach($_POST['column-type'] as $column_type)
	{
		echo $column_type;
		if($column_type == '')
		{
			$index1++;
		}
		else
		{
			$column_type = $_POST['column-type'];
		}
	}

	
	$sql = "UPDATE venue_database.news SET " . "news_" . $column_type[$i] . ' = "' .$t[$i] . '" WHERE ID = ' . $rid[$i];

	echo $sql;

	if($stmt = $db->query($sql))
	{
		echo $stmt;
	}
	else
	{
		echo "Didn't work";
	}

} 

header("location: news.php");

?>