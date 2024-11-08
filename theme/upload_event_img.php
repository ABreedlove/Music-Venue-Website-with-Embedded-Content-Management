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

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit-img"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
/*if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}*/

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$index1 = 0;
	$t;
	
	echo sizeOf($_POST['rid']);

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

	$featured = 0;
	foreach($_POST['is_featured_img'] as $featured)
	{
		if($index == '')
		{
			$index1++;
		}
		else
		{
			$featured = implode($_POST['is_featured_img']);
		}
	}
	
	if ($featured == 1)
	{
		$file_name_quotes = "'" . '"../images/' . basename( $_FILES["fileToUpload"]["name"]) . '"' . "'";
	}
	else 
	{
		$file_name_quotes = "'" . '"images/' . basename( $_FILES["fileToUpload"]["name"]) . '"' . "'";
	}

	$sql = "UPDATE venue_database.events SET event_img = " . $file_name_quotes . " WHERE ID = " . $rid[$i];

	echo $sql;

	if($stmt = $db->query($sql))
	{
		echo $stmt;
	}
	else
	{
		echo "Didn't work";
	}

	// gets the featured image links from the database
	$img_paths = array();
	$sql = "SELECT event_img FROM venue_database.events WHERE feature_img = 1";


	if($stmt = $db->query($sql))
	{
		while($row = $stmt->fetch_assoc()) 
		{
			echo $row["event_img"];
			array_push($img_paths, $row["event_img"]);
		}	
	}
	else 
	{
		echo "Could Not Retrieve";
	}
		// replaces all image links in the stylesheet with placeholders to be updated with new values from the database
	if(file_exists(SITE_ROOT.'/entertainment-venue/theme/css/style.css')==true){
		$fullpath=SITE_ROOT.'/entertainment-venue/theme/css/style.css';
		//header("Content-type: text/css");
		$regex = '/url\("..[^;]*/';
		$index = 0;

		foreach ($img_paths as $path)
		{
			//$search=array('{IMG_PATH_' . $index . '}');
			$replace= "url({IMG_PATH_" . $index . "})";
			$new_css = preg_replace($regex,$replace,file_get_contents($fullpath), 1);
			file_put_contents($fullpath, $new_css);
			$index += 1;
		}
			//die;
	}else{
		die('CSS file does not exist!');
	}

} 

header("location: events.php");
?>