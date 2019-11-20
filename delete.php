<?php
ini_set('display_errors', 1);
// add your includes for connections and functions
include('includes/conn.inc.php');
include('includes/functions.inc.php');
require('includes/sessions.inc.php');
if(!isset($_SESSION['UserID']) || $_SESSION['UserID'] != 1){
	header('location:index.php');
}
// make sure the path is correct
$sEventsID = safeInt($_GET['EventsID']);
$sql= "SELECT * FROM events WHERE EventsID LIKE :EventsID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT); 
$stmt->execute();
$row = $stmt->fetchObject();
?>
<!DOCTYPE html>
<html lang="en">
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>CMS-Delete</title>
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
                 <li><a href="contact-us.php">Contact Us</a></li>
                 <?php 
                 if($_SESSION['UserID'] == 1 ){
                  echo "<li><a href=\"cms.php\">CMS</a></li>";
                  }
                     ?>
                 
                  
                 
                </ul>
                </nav>
            
	</header>
     <div class="wholedelete">
      <div class="page-header">
        <h1>Delete <?php echo $row->Name; ?></h1>
      </div>
    
    <div class="row">
            <div class="EditFields">
            	<p>
                Are you sure you wish to delete <?php echo $row->Name; ?> ?
                </p>
          		<form name="form" method="post" action="cms/process/deleterecord.php" class="form-inline">
                	<!-- Add the EventsID as a hidden field -->
                	<input name="EventsID" type="hidden" value="<?php echo $row->EventsID; ?>">
                	
                	<input type="submit" value="YES" class="YESButton">
                    <a href="cms.php"class="NOButton">No</a>
                    
                </form>
            </div>
	</div>
</div>
	</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>