<?php
ini_set('display_errors', 1);
// add your include
include('includes/conn.inc.php');
include('includes/functions.inc.php');
include('includes/sessions.inc.php');

$sql= "SELECT * FROM events  WHERE Genre LIKE '%' GROUP by Genre ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetchObject();
?>
<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Genre</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="stylesheet/style.css"> 
	<link rel="stylesheet" href="stylesheet/cms.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="stylesheet/mobilestyle.css">
	<script type="text/javascript" src="jscripts/jquery-3.2.1.js"></script>
	<script src="stylesheet/bootstrap-3.3.7-dist/js/bootstrap.js"> </script>

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
  
     echo"<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\" >";
  //indicators
  echo"<ol class=\"carousel-indicators\">";
    echo "<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>";
    echo "<li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>";
    echo "<li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>";
	echo "<li data-target=\"#myCarousel\" data-slide-to=\"3\"></li>";
	echo "<li data-target=\"#myCarousel\" data-slide-to=\"4\"></li>";
	echo "<li data-target=\"#myCarousel\" data-slide-to=\"5\"></li>";
	echo "<li data-target=\"#myCarousel\" data-slide-to=\"6\"></li>";
	echo "<li data-target=\"#myCarousel\" data-slide-to=\"7\"></li>";
  echo "</ol>";
  // Wrapper for slides 
  echo "<div class=\"carousel-inner\" role=\"listbox\" style= \"align-self: : center\">";
    echo "<div class=\"item active\">";
	   
      echo "<center><img class=\"center-block\" src=\"eventpics/event-15.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\"";
	   echo"</center> ";
	   
    echo "</div>";
	// Carousel items 

    echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-14.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	   echo"</center> ";
    echo "</div>";

    echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-13.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	   echo"</center> ";
    echo "</div>";
	   
    echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-12.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	   echo"</center> ";
    echo "</div>";
	   
    echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-11.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	   echo"</center> ";
    echo "</div>";
	   
    echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-10.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	   echo"</center> ";
    echo "</div>";
	   
		echo "<div class=\"item\">";
     echo "<center><img class=\"center-block\" src=\"eventpics/event-9.jpg\" alt=\"Event Picture\"style=\"width:650px; height:450px; padding-bottom:50px;\" ";
	 echo"</center> ";
    echo "</div>";
	   
    // Carousel nav 
  echo "<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"> ";
	   
    echo "<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\">";
	echo"</span> ";
	   
    echo "<span class=\"sr-only\">Previous</span>";
  echo"</a>";
	   
 echo "<a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\"> ";
	   
    echo "<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\">";
	echo"</span> ";
	   
    echo "<span class=\"sr-only\">Next</span>";
echo"</a>";
  echo "</div>";//
echo "</div>";
	   
    						echo "<center>";
							while($row = $stmt->fetchObject()) {
						    echo "<div class=\"outcomes\">";
						   
						   
						   echo "<div class=\"Datesoccuring\">";
						   echo "The Genre: ";
						   echo " $row->Genre"; 
						   echo "</div>";

						   echo "<div class=\"buttonview\">";
						   echo "<a href=\"search.php?Search=".urlencode($row->Genre)."\" class=\"viewinginfo\">View All Events With This Genre</a>";
								echo "</div>";
						   echo "</div>";
						   echo "</div>";
								
   							
							}
							echo "</center>";
   
    ?>
    
</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>