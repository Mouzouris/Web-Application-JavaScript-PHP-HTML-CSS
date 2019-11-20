<?php
ini_set('display_errors', 1);
// add your include
include('includes/conn.inc.php');
include('includes/functions.inc.php');
include('includes/sessions.inc.php');
$sEventsID = safeInt($_GET['EventsID']);
$sql= "SELECT * FROM events WHERE EventsID LIKE :EventsID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT); 
$stmt->execute();
$row = $stmt->fetchObject();
?>
<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>CMS-View</title>
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
   if(isset($_GET['EventsID'])){
    
    						
						     echo "<div class=\"outcomes\">";
						   
						   echo "<div class=\"searchtitles\">";
						   echo "$row->Name"," - $row->Location";
						   
						   echo "</div>";
						   echo "<div class=\"Datesoccuring\">";
						   echo "The Genre: ";
						   echo " $row->Genre"; 
						   echo "</div>";
						   
						   //create pretty date
						   $ts = strtotime ($row->EventsDate);
						   $prettyDate = date("D d M Y H\:i\:s ", $ts);
						   echo "<div class=\"Datesoccuring\">";
						   echo "<p>Date Happening: $prettyDate</p>";
						   echo "</div>";
						   
						   echo "<div class=\"timeuntil\">";
						   $CurrentDate = new DateTime();
						   if ($ts <  strtotime('now') )  {
									echo "This Event is in The Past";
								}else{
									
						   $EventDate = new DateTime($prettyDate);
						   $theDifference = $EventDate->diff($CurrentDate);
						   echo "TIME LEFT UNTIL EVENT: "; echo $theDifference->format("%a days, %h hours, %i minutes, %s seconds");
						   }
						   echo "</div>";
						   
						   echo "<div class=\"eventpics\">";
						   echo "<img src=\"eventpics/{$row->Image}\" alt=\"{$row->Name}\">"; 
						   echo "</div>";
						   
						   echo "<div class=\"eventdetails\">";
						   echo "<p> $row->Info </p>";
					  	   echo "</div>";
	   
						   echo "<div id=\"listTweets\">";
								            
            
          
								  echo  "<a class=\"twitter-timeline\"  href=\"https://twitter.com/search?q=Party\" data-widget-id=\"857718968706117632\"></a>";
								echo"<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\"://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>";            
            
          

								echo "</div>";            
						   
						   echo "</div>";
						   
					   		
   }
    ?>
    
</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>