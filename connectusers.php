<?php
ini_set('display_errors',1);
// include sessions.inc.php here
require('includes/sessions.inc.php');
require('includes/conn.inc.php');
require('includes/functions.inc.php');
include('includes/password.php');
?>

<!DOCTYPE HTML>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="stylesheet/style.css"> 
	<link rel="stylesheet" href="stylesheet/cms.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="stylesheet/mobilestyle.css">
	


<!--[if lt IE 9]>
<script src="Jscripts/html5shiv.js"> </script>
<![endif]-->

</head>

<body>
<header>    
            <div id="logo">
                <h1>Breakthrough Events</h1>
         
          <?php 
      /////////////////////////// conditional includes here
      if(isset($_SESSION['login'])){
        include('includes/session-logout.inc.php');
      }else{
        include('includes/session-login.inc.php');
      }
      
      ?>

            </div>
            
                <nav>
                    
                <ul class="topMenu">
                 <li class="first"><a href="index.php">Home</a></li>
                 <?php 
                 if (!isset($_SESSION['login'])){
				 echo "<li><a href=\"Sign-Up.php\">Sign-Up</a></li>";
                 }
                 ?>
                 <li><a href="Tickets.php">Tickets</a></li>
                 <li><a href="search.php">Search</a></li>
                 <li><a href="venues.php">Venues</a></li>
                 <li><a href="genre.php">Genres</a></li>
                 <li><a href="dates.php">Dates</a></li>
                 <li><a href="Contact-us.php">Contact Us</a></li>
                  <?php 
                 if($_SESSION['UserID'] == 1 ){
                  echo "<li><a href=\"cms.php\">CMS</a></li>";
                  }
                     ?>
                  
                 
                </ul>
                </nav>
            
            </header>




<?php
	if( ($_POST['Name'] != "") && ($_POST['Email'] != "") && ($_POST['Password'] != "") )
	   {
	
$sName = safeString($_POST['Name']); 
$sEmail = safeString($_POST['Email']); 
$sPassword = password_hash(safeString($_POST['Password']), PASSWORD_BCRYPT);

// build prepare statement
$sql = "INSERT INTO Users (Name, Email, Password ) VALUES (:Name, :Email, :Password )";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Name', $sName, PDO::PARAM_STR);
$stmt->bindParam(':Email', $sEmail, PDO::PARAM_STR);
$stmt->bindParam(':Password', $sPassword, PDO::PARAM_STR);

$stmt->execute();
		  echo" <h1>Thank you for Registering</h1>";
	   }
	else {
		echo "Please provide us with all the necessary details";
	}

?>



<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>
	</footer>

</body>
