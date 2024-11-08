<?php

require_once "php/config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	//header("location: login.php");
}
else
{
	//echo "WELCOME DAD!";
}

// gets the featured image links from the database

$img_paths = array();
$sql = "SELECT post_img FROM venue_database.posts WHERE feature_img = 1";


if($stmt = $db->query($sql))
{
	while($row = $stmt->fetch_assoc()) 
	{
		array_push($img_paths, $row["post_img"]);
	}	
}
else 
{
	echo "Could Not Retrieve";
}

// Modifies the barebones css file displayed to non-authenticated visitors to reflect admin changes

if(file_exists(SITE_ROOT.'/entertainment-venue/theme/css/style.css')==true){
	$fullpath=SITE_ROOT.'/entertainment-venue/theme/css/style.css';
	//header("Content-type: text/css");
	$index = 0;
	foreach ($img_paths as $path)
	{
		$search=array('{IMG_PATH_' . $index . '}');
		$replace=array($img_paths[$index]);
		$new_css = str_replace($search,$replace,file_get_contents($fullpath));
		file_put_contents($fullpath, $new_css);
		$index += 1;
	}
    //die;
}else{
	die('CSS file does not exist!');
}


/* Retrieves information from the database and renders it in HTML
 * Takes the id and column of that row, columns are: 
 * ['title'="post_title", 'content'="post_content", 'link'="post_link", 'img'="post_img"]
*/

function renderContent($db, $id, $col) {

	$column = "post_" . $col;

	$sql = "SELECT * FROM venue_database.posts WHERE ID = " . $id;

	if($stmt = $db->query($sql))
	{
		while($row = $stmt->fetch_assoc()) 
		{
			if($col == "img")
			{
				echo "<img src=" . $row[$column] . 'title="emblem" alt="emblem" />';
			}
			else
			{
				$tmpstr = $row[$column];
				echo $tmpstr;
			}
			//echo $row[$column] . "<br>";
		}	
	}
	else 
	{
		echo "Could Not Retrieve";
	}

}

$db->close();

?>

<!DOCTYPE html>

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aorta | Arts & Entertainment Venue</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/logo-aorta.png" />


  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  
<?php 
$stylesheet;
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { $stylesheet = "css/style.css"; }
else { $stylesheet = "css/style.css.php"; } ?>
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg p-0">
					<a class="navbar-brand" href="index.php">
						<img src="images/logo-aorta.png" alt="Logo">
					</a>

					<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ion-android-menu"></span>
					</button>

					<div class="collapse navbar-collapse ml-auto" id="navbarsExample09">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item dropdown @@portfolio">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown03">
									<li><a class="dropdown-item @@portfolioFilter" href="events.php">Coming Up</a></li>
									<li><a class="dropdown-item @@portfolioSingle" href="archived-events.php">Archive</a></li>

								</ul>
							</li>
							<li class="nav-item @@service"><a class="nav-link" href="news.php">News</a></li>
							<li class="nav-item dropdown @@pages">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">About Us <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown05">
									<li><a class="dropdown-item @@about" href="about.php">About Us</a></li>
									<li><a class="dropdown-item @@contact" href="contact.php">Contact</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header><!-- header close -->

<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<?php $db = connect(); ?>

					<form action="post_content.php" method="POST">
						
						<h1 class="animated fadeInUp"><?php renderContent($db, 0, "title"); ?></h1>

						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit0"> edit </button>'; }?>

						<textarea name="textfield[0]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, 0, "title"); ?> </textarea>

						<input type="submit" name="submit[0]" class="save" style="display: none;">
						<input type="hidden" name="rid[0]" value="0">
						<input type="hidden" name="column-type[0]" value="title">
						<input type="hidden" name="index[0]" value="0">

					</form>

					<form action="post_content.php" method="POST">

						<p class="animated fadeInUp"><?php renderContent($db, 0, "content"); ?></p>

						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit1"> edit </button>'; }?>
						<textarea name="textfield[1]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, 0, "content"); ?> </textarea>

						

						<input type="submit" name="submit[1]" class="save" style="display: none;">
						<input type="hidden" name="rid[1]" value="0">
						<input type="hidden" name="column-type[1]" value="content">
						<input type="hidden" name="index[1]" value="1">

					</form>

					<a href="events.php" class="btn btn-main animated fadeInUp" >Events</a>
					
					<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit-img" id="edit2"> edit Image </button>'; }?>
					<form action="upload_img.php" method="POST" enctype="multipart/form-data" style="display: none;">
						<textarea name="textfield[2]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"></textarea>
						<p > Select image to upload: </p>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit-img">
						<input type="hidden" name="rid[2]" value="0">
						<input type="hidden" name="index[2]" value="2">	
						<input type="hidden" name="is_featured_img[0]" value="1">	
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

<!-- Wrapper Start -->
<section class="about section" id=1>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="block">
					<div class="section-title">
						
						<?php $db = connect(); ?>

						<form action="post_content.php" method="POST">

							<h2 class= "editable-text"><?php renderContent($db, 1, "title"); ?></h2> 
							<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit3"> edit </button>'; }?>
							
							<textarea name="textfield[3]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, 1, "title"); ?> </textarea>
							<input type="submit" name="submit[3]" class="save" style="display: none;">
							<input type="hidden" name="rid[3]" value="1">
							<input type="hidden" name="column-type[3]" value="title">
							<input type="hidden" name="index[3]" value="3">

						</form>

						<br>

						<form action="post_content.php" method="POST">
							<p class= "editable-text"><?php renderContent($db, 1, "subtitle"); ?></p> 
							<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit4"> edit </button>'; }?>

							<textarea name="textfield[4]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 1, "subtitle"); ?> </textarea>
							<input type="submit" name="submit[4]" class="save" style="display: none;">
							<input type="hidden" name="rid[4]" value="1">
							<input type="hidden" name="column-type[4]" value="subtitle">
							<input type="hidden" name="index[4]" value="4">

						</form>

					</div>
					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 1, "content"); ?></p> 

						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit5"> edit </button>'; }?>

						<textarea name="textfield[5]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 1, "content"); ?> </textarea>
						<input type="submit" name="submit[5]" class="save" style="display: none;">
						<input type="hidden" name="rid[5]" value="1">
						<input type="hidden" name="column-type[5]" value="content">
						<input type="hidden" name="index[5]" value="5">
					</form>
					<!-- id="textbox" name="textbox" onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';" -->

				</div>
			</div><!-- .col-md-7 close -->
			<div class="col-md-5">
				<div class="block">
					<div class= "editable-img">
						<?php renderContent($db, 1, "img"); ?> <!-- <img src="images/wrapper-img.png" alt="Img"> -->
					</div>

					<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit-img" id="edit6"> edit Image </button>'; }?>

					<form action="upload_img.php" method="POST" enctype="multipart/form-data" style="display: none;">
						
						<p > Select image to upload: </p>
						<textarea name="textfield[6]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"></textarea>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit-img">
						<input type="hidden" name="rid[6]" value="1">
						<input type="hidden" name="index[6]" value="6">	
						<input type="hidden" name="is_featured_img[1]" value="0">	
					</form>
				</div>
			</div><!-- .col-md-5 close -->
		</div>
	</div>
</section>

<section class="feature bg-2">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6">
				<?php $db = connect(); ?>
				
				<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 2, "title"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit7"> edit </button>'; }?>
						<textarea name="textfield[7]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 2, "title"); ?> </textarea>
						<input type="submit" name="submit[7]" class="save" style="display: none;">
						<input type="hidden" name="rid[7]" value="2">
						<input type="hidden" name="column-type[7]" value="title">
						<input type="hidden" name="index[7]" value="7">
				</form>

				<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 2, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit8"> edit </button>'; }?>
						<textarea name="textfield[8]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 2, "content"); ?> </textarea>
						<input type="submit" name="submit[8]" class="save" style="display: none;">
						<input type="hidden" name="rid[8]" value="2">
						<input type="hidden" name="column-type[8]" value="content">
						<input type="hidden" name="index[8]" value="8">
				</form>
				
				
				<?php renderContent($db, 2, "link"); ?>
				
				<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit-img" id="edit9"> edit Image </button>'; }?>

				<form action="upload_img.php" method="POST" enctype="multipart/form-data" style="display: none;">
						<textarea name="textfield[9]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"></textarea>
						<p > Select image to upload: </p>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit-img">
						<input type="hidden" name="rid[9]" value="2">
						<input type="hidden" name="index[9]" value="9">	
						<input type="hidden" name="is_featured_img[2]" value="1">	
					</form>
				

				<!--<a href="portfolio.php" class="btn btn-view-works">View Works</a>-->
      </div>
    </div>
  </div>
</section>

<!-- Service Start -->
<section class="service">
  <div class="container">
    <?php $db = connect(); ?>
		<div class="row">
      <div class="col-12 text-center">
        <div class="section-title">

					<form action="post_content.php" method="POST">
						<h2 class= "editable-text"><?php renderContent($db, 3, "title"); ?></h2>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit10"> edit </button>'; }?>
						<textarea name="textfield[10]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 3, "title"); ?> </textarea>
						<input type="submit" name="submit[10]" class="save" style="display: none;">
						<input type="hidden" name="rid[10]" value="3">
						<input type="hidden" name="column-type[10]" value="title">
						<input type="hidden" name="index[10]" value="10">
					</form>

					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 3, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit11"> edit </button>'; }?>
						<textarea name="textfield[11]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 3, "content"); ?> </textarea>
						<input type="submit" name="submit[11]" class="save" style="display: none;">
						<input type="hidden" name="rid[11]" value="3">
						<input type="hidden" name="column-type[11]" value="content">
						<input type="hidden" name="index[11]" value="11">
				</form>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="service-item">
          <i class="ion-music-note"></i>

					<form action="post_content.php" method="POST">
						<h4 class= "editable-text"><?php renderContent($db, 4, "title"); ?></h4>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit12"> edit </button>'; }?>
						<textarea name="textfield[12]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 4, "title"); ?> </textarea>
						<input type="submit" name="submit[12]" class="save" style="display: none;">
						<input type="hidden" name="rid[12]" value="4">
						<input type="hidden" name="column-type[12]" value="title">
						<input type="hidden" name="index[12]" value="12">
					</form>
					
					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 4, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit13"> edit </button>'; }?>
						<textarea name="textfield[13]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 4, "content"); ?> </textarea>
						<input type="submit" name="submit[13]" class="save" style="display: none;">
						<input type="hidden" name="rid[13]" value="4">
						<input type="hidden" name="column-type[13]" value="content">
						<input type="hidden" name="index[13]" value="13">
					</form>
          
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="service-item">
          <i class="ion-videocamera"></i>

					<form action="post_content.php" method="POST">
						<h4 class= "editable-text"><?php renderContent($db, 5, "title"); ?></h4>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit14"> edit </button>'; }?>
						<textarea name="textfield[14]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 5, "title"); ?> </textarea>
						<input type="submit" name="submit[14]" class="save" style="display: none;">
						<input type="hidden" name="rid[14]" value="5">
						<input type="hidden" name="column-type[14]" value="title">
						<input type="hidden" name="index[14]" value="14">
					</form>

					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 5, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit15"> edit </button>'; }?>
						<textarea name="textfield[15]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 5, "content"); ?> </textarea>
						<input type="submit" name="submit[15]" class="save" style="display: none;">
						<input type="hidden" name="rid[15]" value="5">
						<input type="hidden" name="column-type[15]" value="content">
						<input type="hidden" name="index[15]" value="15">
					</form>

        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="service-item">
          <i class="ion-paintbrush"></i>

					<form action="post_content.php" method="POST">
						<h4 class= "editable-text"><?php renderContent($db, 6, "title"); ?></h4>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit16"> edit </button>'; }?>
						<textarea name="textfield[16]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 6, "title"); ?> </textarea>
						<input type="submit" name="submit[16]" class="save" style="display: none;">
						<input type="hidden" name="rid[16]" value="6">
						<input type="hidden" name="column-type[16]" value="title">
						<input type="hidden" name="index[16]" value="16">
					</form>

					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 6, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit17"> edit </button>'; }?>
						<textarea name="textfield[17]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 6, "content"); ?> </textarea>
						<input type="submit" name="submit[17]" class="save" style="display: none;">
						<input type="hidden" name="rid[17]" value="6">
						<input type="hidden" name="column-type[17]" value="content">
						<input type="hidden" name="index[17]" value="17">
					</form>
          
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="service-item">
          <i class="ion-heart"></i>

					<form action="post_content.php" method="POST">
						<h4 class= "editable-text"><?php renderContent($db, 7, "title"); ?></h4>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit18"> edit </button>'; }?>
						<textarea name="textfield[18]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 7, "title"); ?> </textarea>
						<input type="submit" name="submit[18]" class="save" style="display: none;">
						<input type="hidden" name="rid[18]" value="7">
						<input type="hidden" name="column-type[18]" value="title">
						<input type="hidden" name="index[18]" value="18">
					</form>

					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 7, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit19"> edit </button>'; }?>
						<textarea name="textfield[19]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 7, "content"); ?> </textarea>
						<input type="submit" name="submit[19]" class="save" style="display: none;">
						<input type="hidden" name="rid[19]" value="7">
						<input type="hidden" name="column-type[19]" value="content">
						<input type="hidden" name="index[19]" value="19">
					</form>
          
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Call to action Start -->

<section class="call-to-action bg-1 section-sm overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">

					<form action="post_content.php" method="POST">
						<h2 class= "editable-text"><?php renderContent($db, 8, "title"); ?></h2>
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit20"> edit </button>'; }?>
						<textarea name="textfield[20]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 8, "title"); ?> </textarea>
						<input type="submit" name="submit[20]" class="save" style="display: none;">
						<input type="hidden" name="rid[20]" value="8">
						<input type="hidden" name="column-type[20]" value="title">
						<input type="hidden" name="index[20]" value="20">
					</form>

					<form action="post_content.php" method="POST">
						<p class= "editable-text"><?php renderContent($db, 8, "content"); ?></p> 
						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit" id="edit21"> edit </button>'; }?>
						<textarea name="textfield[21]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"><?php renderContent($db, 8, "content"); ?> </textarea>
						<input type="submit" name="submit[21]" class="save" style="display: none;">
						<input type="hidden" name="rid[21]" value="8">
						<input type="hidden" name="column-type[21]" value="content">
						<input type="hidden" name="index[21]" value="21">
					</form>

					<a class="btn btn-main btn-solid-border" href="contact.php">Contact Us</a>

				<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit-img" id="edit22"> edit Image </button>'; }?>
				<form action="upload_img.php" method="POST" enctype="multipart/form-data" style="display: none;">
						<textarea name="textfield[22]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"></textarea>
						<p > Select image to upload: </p>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit-img">
						<input type="hidden" name="rid[22]" value="8">
						<input type="hidden" name="index[22]" value="22">	
						<input type="hidden" name="is_featured_img[3]" value="1">	
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-manu">
					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Contact us</a></li>
						<?php 
						if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
							//header("location: login.php");
							echo '<li><a href="login.php">Admin Login</a></li>';
							//exit;
						} else {
							echo '<li><a href="logout.php">Log Out</a></li>';
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
	<span class="icon ion-ios-arrow-up"></span>
</div>

    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- filter -->
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/SyoTimer/jquery.syotimer.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="plugins/google-map/map.js"></script>

    <script src="js/script.js"></script>

    </body>

    </html>
   
