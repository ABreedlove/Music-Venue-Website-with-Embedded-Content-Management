<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect them to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// include configuration file
require_once "php/config.php";

$attempt_count = 0;
$error = '';
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username)) {
    $error .= '<p class="error"> Enter a username.</p>';
  }

  if (empty($password)) {
    $error .= '<p class="error"> Enter a password.</p>';
  }

  // Validate credentials
  if(empty($error)){
      // Prepare a select statement
      $sql = "SELECT username, pword FROM adminusers WHERE username = ?";
      
      if($stmt = mysqli_prepare($db, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Set parameters
          $param_username = $username;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Store result
              mysqli_stmt_store_result($stmt);
              
              // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){                    
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($password, $hashed_password)){

													// set session timeout
													$timeout = 30 * 60; // 30 minutes in seconds
													session_set_cookie_params($timeout);

                          // Password is correct, so start a new session
                          session_start();
                          
                          // Store data in session variables
                          $_SESSION["loggedin"] = true;
                          $_SESSION["username"] = $username;
                          //$_SESSION["username"] = $username;                            
                          
                          // Redirect user to welcome page
                          header("location: index.php");
                      } else{
                          // Password is not valid, display a generic error message
                          $login_err = "Invalid username or password.";
                      }
                  }
              } else{
                  // Username doesn't exist, display a generic error message
                  $login_err = "Invalid username or password.";
									// Display alert box  
									$attempt_count = $attempt_count + 1;
									echo '<script>alert("Invalid Username or Password")</script>'; 
              }
          } else{
              echo "Something went wrong. Please try again later.";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }
  }
  
  // Close connection
  mysqli_close($db);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  
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
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <main id="main-holder">
    <img src="./images/admin-pic.png" alt="admin-pic">
    <h1 id="login-header">Admin Login</h1>
    
    <div id="login-error-msg-holder">
      <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
    </div>
    
     <form id="login-form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" class="login-form-field" placeholder="Username" required />
        <input type="password" name="password" class="login-form-field" placeholder="Password" required />
        <input type="submit" id="login-form-submit" class="btn btn-primary" value="Login" />
     </form>
    
  
  </main>
</body>

</html>
