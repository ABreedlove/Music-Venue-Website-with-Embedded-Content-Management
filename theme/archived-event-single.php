<?php

require_once "php/config.php";

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	//header("location: login.php");
}
else
{

}



// Get the id of the event to load to this page
$event_id = $_GET['event_id'];


/* Retrieves information from the database and renders it in HTML
 * Takes the id and column of that row, columns are: 
 * ['title'="event_title", 'content'="event_content", 'subtitle'="event_subtitle", 'img'="event_img"]
*/

function renderContent($db, $id, $col) {

	$column = "event_" . $col;

	$sql = "SELECT * FROM venue_database.archived_event_singles WHERE ID = " . $GLOBALS['event_id'];

	if($stmt = $db->query($sql))
	{
		while($row = $stmt->fetch_assoc()) 
		{
			$tmpstr = $row[$column];
			echo $tmpstr;
		}	
	}
	else 
	{
		echo "Could Not Retrieve";
		echo $sql;
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
  <title>Aorta | Arts & Entertainment </title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />


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
									<li><a class="dropdown-item activeFilter" href="events.php">Coming Up</a></li>
									<li><a class="dropdown-item active" href="archived-events.php">Archive</a></li>

								</ul>
							</li>
							<li class="nav-item @@service"><a class="nav-link" href="blog-grid.html">News</a></li>
							
							<li class="nav-item dropdown @@pages">
								<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">About Us <span class="ion-ios-arrow-down"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown05">
									<li><a class="dropdown-item @@about" href="about.html">About Us</a></li>
									<li><a class="dropdown-item @@contact" href="contact.html">Contact</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header><!-- header close -->

<section class="portfolio-single-page section-sm">
	<?php $db = connect(); ?>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-8 col-lg-7">
        <div class="portfolio-single-slider">
          <div><img class="img-fluid" src=<?php renderContent($db, $GLOBALS["event_id"], "img"); ?>></div>

        </div>
				<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
							else { echo '<button type="button" class="edit-img" id="edit0"> edit Image </button>'; }?>
					<form action="upload_archived_event_singles_img.php" method="POST" enctype="multipart/form-data" style="display: none;">
						<textarea name="textfield[0]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"></textarea>
						<p > Select image to upload: </p>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit-img">
						<input type="hidden" name="rid[0]" value=<?php echo $GLOBALS["event_id"] ?>>
						<input type="hidden" name="column-type[0]" value="img">
						<input type="hidden" name="index[0]" value="0">	
					</form>
      </div>
      <div class="col-xl-4 col-lg-5 mt-5 mt-lg-0">
        <div class="project-details">
          <h4>Event Details</h4>
          <ul>
						<form action="post_archived_event_singles.php?event_id=<?php $GLOBALS['event_id']?>" method="POST">
            <li><span> Artists</span><br><strong><?php renderContent($db, $GLOBALS["event_id"], "artists"); ?></strong>
							<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
								else { echo '<button type="button" class="edit" id="edit1"> edit </button>'; }?>

							<textarea name="textfield[1]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, $GLOBALS["event_id"], "artists"); ?> </textarea>

							<input type="submit" name="submit[0]" class="save" style="display: none;">
							<input type="hidden" name="rid[1]" value=<?php echo $GLOBALS["event_id"] ?>>
							<input type="hidden" name="column-type[1]" value="artists">
							<input type="hidden" name="index[1]" value="1">
						</li>
						</form>
						
						<form action="post_archived_event_singles.php?event_id=<?php $GLOBALS['event_id']?>" method="POST">
            <li><span> Date:</span><br><strong><?php renderContent($db, $GLOBALS["event_id"], "date"); ?></strong>
							<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
								else { echo '<button type="button" class="edit" id="edit2"> edit </button>'; }?>

							<textarea name="textfield[2]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, $GLOBALS["event_id"], "date"); ?> </textarea>

							<input type="submit" name="submit[1]" class="save" style="display: none;">
							<input type="hidden" name="rid[2]" value=<?php echo $GLOBALS["event_id"] ?>>
							<input type="hidden" name="column-type[2]" value="date">
							<input type="hidden" name="index[2]" value="2">
						</li>
						</form>

						<form action="post_archived_event_singles.php?event_id=<?php $GLOBALS['event_id']?>" method="POST">
						<li><span> Location</span><br><strong> <?php renderContent($db, $GLOBALS["event_id"], "location"); ?> </strong>
							<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
								else { echo '<button type="button" class="edit" id="edit3"> edit </button>'; }?>

							<textarea name="textfield[3]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, $GLOBALS["event_id"], "location"); ?> </textarea>

							<input type="submit" name="submit[2]" class="save" style="display: none;">
							<input type="hidden" name="rid[3]" value=<?php echo $GLOBALS["event_id"] ?>>
							<input type="hidden" name="column-type[3]" value="location">
							<input type="hidden" name="index[3]" value="3">

						</li>
						</form>

          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="project-content mt-50">
					<form action="post_archived_event_singles.php?event_id=<?php $GLOBALS['event_id']?>" method="POST">
						<h2 class="mb-3"><?php renderContent($db, $GLOBALS["event_id"], "title"); ?></h2>

						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
								else { echo '<button type="button" class="edit" id="edit4"> edit </button>'; }?>

							<textarea name="textfield[4]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, $GLOBALS["event_id"], "title"); ?> </textarea>

							<input type="submit" name="submit[3]" class="save" style="display: none;">
							<input type="hidden" name="rid[4]" value=<?php echo $GLOBALS["event_id"] ?>>
							<input type="hidden" name="column-type[4]" value="title">
							<input type="hidden" name="index[4]" value="4">
					</form>

					<form action="post_archived_event_singles.php?event_id=<?php $GLOBALS['event_id']?>" method="POST">
						<p><?php renderContent($db, $GLOBALS["event_id"], "content"); ?></p>

						<?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {}
								else { echo '<button type="button" class="edit" id="edit5"> edit </button>'; }?>

							<textarea name="textfield[5]" id="text-area-input" style="display: none;" onkeypress="this.style.width = (this.value.length) + 'ch';"> <?php renderContent($db, $GLOBALS["event_id"], "content"); ?> </textarea>

							<input type="submit" name="submit[4]" class="save" style="display: none;">
							<input type="hidden" name="rid[5]" value=<?php echo $GLOBALS["event_id"] ?>>
							<input type="hidden" name="column-type[5]" value="content">
							<input type="hidden" name="index[5]" value="5">

					</form>
	
          <div class="my-4">
            
          </div>
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
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Contact us</a></li>
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