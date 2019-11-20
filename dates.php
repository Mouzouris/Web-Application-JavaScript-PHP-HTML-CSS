<?php
ini_set('display_errors', 1);
// add your include
include('includes/conn.inc.php');
include('includes/functions.inc.php');
include('includes/sessions.inc.php');

$sql= "SELECT * FROM events ";
$stmt = $pdo->query($sql);
?>
<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Dates</title>
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
                 ?>                 <li><a href="Tickets.php">Tickets</a></li>
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
  
    
    						
							while($row = $stmt->fetchObject()) {
						    echo "<div class=\"outcomes\">";
						   
						   $ts = strtotime ($row->EventsDate);
						   $prettyDate = date("D d M Y H\:i\:s ", $ts);
								echo "<div class=\"grid\">";
					echo "<div class=\"EventName\">{$row->Name}</div>";
	echo "<div class=\"preview\"><a href=\"#\" data-id=\"{$row->EventsID}\" class=\"getPreview\">Preview</a> </div>"; 
	echo "<div class=\"fullDetails\"></div>";
	echo "</div>";
								
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

						   
						   echo "<div class=\"buttonview\">";
						   echo "<a href=\"details.php?EventsID={$row->EventsID}\" class=\"viewinginfo\">See What IS Happening On THIS Date</a>";
								echo "</div>";
								
								
								            
          
		
							echo "</div>";
						   echo "</div>";
   
							}
   
    ?>
    
</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
	<script src="jscripts/jquery-3.2.1.js"></script>
	<script src="jscripts/listing.js"></script>
</body>
</html>