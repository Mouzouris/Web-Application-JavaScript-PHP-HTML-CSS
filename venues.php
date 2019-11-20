<?php
ini_set('display_errors', 1);
// add your include
include('includes/conn.inc.php');
include('includes/functions.inc.php');
include('includes/sessions.inc.php');

$sql= "SELECT * FROM events  WHERE Location LIKE '%' GROUP by Location ";
$stmt = $pdo->prepare($sql);
//$stmt->bindParam(':Location', $sLocation, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetchObject();

?>
<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Venues</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="stylesheet/style.css"> 
	<link rel="stylesheet" href="stylesheet/cms.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="stylesheet/mobilestyle.css">
	<script type="text/javascript" src="jscripts/jquery-3.2.1.js"></script>
	
	


<!--[if lt IE 9]>
<script src="Jscripts/html5shiv.js"> </script>
<![endif]-->

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZlDy_2D13TuDVOG7T2IaQ83-f5hYFprY&callback=initMap"
      type="text/javascript">
    </script>
    <script>
		var locations = [
      ['O2 Academy, 37-43 Arundel Gate, Sheffield S1 2PN', 53.381495, -1.465663, 1],
      ['Tank, 55 Arundel St, Sheffield S1', 53.380625, -1.465727, 2],
      ['Soyo, 117 Rockingham St, Sheffield S1 4EB', 53.380663, -1.475598, 3],
      ['Paris, 24 Carver St, Sheffield S1 4FS, 23-32 Carver St, Sheffield S1 4FS', 53.380254, -1.474053, 4],
      ['Plug, 14-16 Matilda St, Sheffield S1 4QD', 53.376542, -1.471542, 5],
	  ['The Viper Rooms, 35 Carver St, Sheffield S1 4FS', 53.380343, -1.473602, 6],
	  ['Crystal Bar, 23-32 Carver St, Sheffield S1 4FS', 53.380586, -1.473666, 7]
    ];
	function initMap(){
    
	var myOptions = {
          center: new google.maps.LatLng(53.3788313,-1.4685859),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
		var infowindow = new google.maps.InfoWindow();
		var map = new google.maps.Map(document.getElementById("myMap"), myOptions);

		var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
		  //strokeColor: "black",
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
			
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
			
        }
      })(marker, i));
    }}

	</script>
         

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
            <h2>
            	Location of the clubs!
            </h2>
            <div id="myMap">
            
	 	
	 </div>
  <?php
  
    
    						
							while($row = $stmt->fetchObject()) {
						    echo "<div class=\"venueoutcomes\">";
						   
						   echo "<div class=\"searchtitles\">";
						   echo "<h2> $row->Location</h2>";
						   						   
						   echo "<div class=\"venueventpics\">";
						   echo "<img src=\"eventpics/{$row->Image}\" alt=\"{$row->Name}\">"; 
						   echo "</div>";

						   echo "<div class=\"buttonview\">";
						   echo "<a href=\"search.php?Search=".urlencode($row->Location)."\" class=\"viewinginfo\">View All Events HERE</a>";
								echo"<div id=\"listTweets\">";
									echo"</div>";
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