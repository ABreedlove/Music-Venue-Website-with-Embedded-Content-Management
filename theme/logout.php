<?php

require_once "php/config.php";

// gets the featured image links from the database
$img_paths = array();
$sql = "SELECT post_img FROM venue_database.posts WHERE feature_img = 1";


if($stmt = $db->query($sql))
{
	while($row = $stmt->fetch_assoc()) 
	{
		echo $row["post_img"];
		array_push($img_paths, $row["post_img"]);
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

// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to main page
header("location: index.php");
exit;
?>