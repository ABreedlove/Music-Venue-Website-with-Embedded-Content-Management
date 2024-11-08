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


$global_index = 0;
$global_rid = 1;
$global_imgs = 0;


/* Retrieves information from the database and renders it in HTML
*/

function renderContent($db, $id) {

	$global_index = $GLOBALS["global_index"];
	$global_rid = $GLOBALS["global_rid"];
	$global_imgs = $GLOBALS["global_imgs"];

	//$column = "event_" . $col;

	$sql = "SELECT * FROM venue_database.about WHERE ID = " . $id;

	$title;
	$content;

	if($stmt = $db->query($sql))
	{
		while($row = $stmt->fetch_assoc()) 
		{
			$title = $row["about_title"];
			$content = $row["about_content"];
		}	
	}
	else 
	{
		echo "Could Not Retrieve";
	}
	
	$edit_style_attribute = "";
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { $edit_style_attribute = "display: none;"; }

	echo '<div class="post">
					
					<form action="post_about.php" method="POST">
						<h4 class="post-title">'.$title.'</h4>
						<button type="button" class="edit" id="edit'.($global_index).'" style="'.$edit_style_attribute.'"> edit </button>

						<textarea name="textfield['.($global_index).']" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + '."'ch'".';">'.$title.'</textarea>
						<input type="submit" name="submit['.($global_index).']" class="save" style="display: none;"> 
						<input type="hidden" name="rid['.($global_index).']" value="'.$global_rid.'"> 
						<input type="hidden" name="column-type['.($global_index).']" value="title">
						<input type="hidden" name="index['.($global_index).']" value="'.($global_index).'"> 
					</form>

					<div class="post-content">
						<form action="post_about.php" method="POST">
							<p>'.$content.'</p>
							<button type="button" class="edit" id="edit'.($global_index+1).'" style="'.$edit_style_attribute.'"> edit </button>

							<textarea name="textfield['.($global_index+1).']" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + '."'ch'".';">'.$content.'</textarea> 
							<input type="submit" name="submit['.($global_index+1).']" class="save" style="display: none;"> 
							<input type="hidden" name="rid['.($global_index+1).']" value="'.$global_rid.'"> 
							<input type="hidden" name="column-type['.($global_index+1).']" value="content"> 
							<input type="hidden" name="index['.($global_index+1).']" value="'.($global_index+1).'"> 
						</form>

					</div>
					<br>

					<form action="delete_about.php?about_id='.$global_rid.'" method="POST" onsubmit="return confirm('."'Do you really want to delete the news item?'".');"> 

						<button type="submit" class="delete-about" style="'.$edit_style_attribute.'"> Delete </button> 
					</form>
					
				</div>';

	$GLOBALS["global_index"] = $global_index + 3;
	$GLOBALS["global_rid"] = $global_rid + 1;
	$GLOBALS["global_imgs"] = $global_imgs + 1;


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
							<li class="nav-item @@home">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item dropdown active">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown03">
									<li><a class="dropdown-item active" href="events.php">Coming Up</a></li>
									<li><a class="dropdown-item activeSingle" href="archived-events.php">Archive</a></li>

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

<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>FAQ</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="mb-4">Frequently Asked Questions</h2>
				<address>
					Aorta <br>
					107 S Franklin St, Kirksville, MO 63501 <br>
					USA
				</address>
			</div>
			<div class="col-lg-8 mt-5 mt-lg-0">
				<div class="pl-0 pl-lg-4">

					<?php $db = connect(); ?>
										

					<?php 
						
						$numRows = 0;
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
						
						if($numRows > 0)
						{
							for ($i = 1; $i <= $numRows; $i++) {
								renderContent($db, $i);
							}
						}

					?> 

					<form action="new_about.php" method="POST">
					<?php
					if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { }
					else { echo '<button type="submit" class="add-about" name="add-about-button"> <img src="images/add-button.png" border="0"> </button>'; } ?>
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