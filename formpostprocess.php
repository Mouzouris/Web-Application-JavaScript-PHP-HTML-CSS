<?php
ini_set('display_errors',1);
// include sessions.inc.php here
require('includes/sessions.inc.php');
require('includes/conn.inc.php');
require('includes/functions.inc.php');
?>

<!DOCTYPE HTML>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Thank you</title>
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
	if( ($_POST['firstname'] != "") && ($_POST['comments'] != ""))
	   {
	$sFName = safeString($_POST['firstname']); 
$sLName = safeString($_POST['surname']); 
$sEmail = safeString($_POST['email']);
$sTelephone = safeInt($_POST['telephone']);
$sGender = safeString($_POST['gender']);
$sComments = safeString($_POST['comments']);
$sMaillist = safeInt($_POST['list']);
$sHearabout = safeString($_POST['marketing']);
// build prepare statement
$sql = "INSERT INTO ContactUS (FName, LName, Email, Telephone, Gender, Comments, Maillist, Hearabout) VALUES (:firstname, :surname, :email, :telephone, :gender, :comments, :list, :marketing)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':firstname', $sFName, PDO::PARAM_STR);
$stmt->bindParam(':surname', $sLName, PDO::PARAM_STR);
$stmt->bindParam(':email', $sEmail, PDO::PARAM_STR);
$stmt->bindParam(':telephone', $sTelephone, PDO::PARAM_INT);
$stmt->bindParam(':gender', $sGender, PDO::PARAM_STR);
$stmt->bindParam(':comments', $sComments, PDO::PARAM_STR);
$stmt->bindParam(':list', $sMaillist, PDO::PARAM_INT);
$stmt->bindParam(':marketing', $sHearabout, PDO::PARAM_STR);
$stmt->execute();

	
	
	
	
	
// output here
		   {
echo " <h1>Thank you for posting the following information</h1> ";
echo "<p>Firstname: {$_POST['firstname']}</p>";
echo "<p>Lastname: {$_POST['surname']}</p>";
echo "<p>Email: {$_POST['email']}</p>";
echo "<p>Telephone: {$_POST['telephone']}</p>";

if(isset($_POST['gender'])){
echo "<p>Gender: {$_POST['gender']}</p>";

}
echo "<p>Comments: {$_POST['comments']}</p>";

if(isset($_POST['list'])){
echo "<p>{$_POST['list']} - subscribed </p>";
}
echo "<p>Hear-About: {$_POST['marketing']}</p>";
	   }
	}
	
		echo "Post atleast the name and comments ";
	
		
?>
</p>

<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>
	</footer>

</body>
</html>