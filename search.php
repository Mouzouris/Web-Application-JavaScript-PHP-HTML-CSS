<?php
ini_set('display_errors',1);
// include sessions.inc.php here
require('includes/sessions.inc.php');
require('includes/conn.inc.php');

if(isset($_GET['Search']) && $_GET['Search'] != "") {

$searchPhrase = "%" . $_GET['Search'] . "%";
$sql= "SELECT * FROM events WHERE Name LIKE :Search OR Genre LIKE :Search OR Location LIKE :Search OR EventsDate LIKE :Search";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Search', $searchPhrase, PDO::PARAM_STR);
$stmt->execute();
$totalnoEvents = $stmt->rowCount();
}


?>

<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Search</title>
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

         <div class ="wholesearch">
      
      <div class="search-header">
        <h1>SEARCH FOR EVENTS </h1>
      </div>
    
        
            <form id="formsearch" name="formsearch" method="get" >
             
             		<p><label for="Search">Events Search:</label> 
                    <input name="Search" type="text" id="EventSearch" >
                    <input type="submit" name="searchsubmit" class="sendButton">
                 	</p>
            
            </form>
        
    
    <div class="thesearch">
            
					<?php 
				
					if(isset($_GET['Search']) ||
					($_GET['Genre']) ||	($_GET['Location']) ||
					($_GET['EventsDate'] ))
					{
						
					if($totalnoEvents == 0) {
					echo "<p> Sorry, no Events were found matching that criteria!</p>";
					}else{
					   // search results
						echo "<div class=\"howmany\">";
							
					   echo "<p>We Found $totalnoEvents match(es)</p>";
					   echo "</div>";
						
						   
						
					   while($row = $stmt->fetchObject()){
						   echo "<div class=\"outcomes\">";
						   
						   echo "<div class=\"searchtitles\">";
						   echo "<h2>$row->Name</h2>","<h2> - $row->Location</h2>";
						   
						   echo "</div>";
						   echo "<div class=\"Datesoccuring\">";
						   echo "The Genre: ";
						   echo  $row->Genre; 
						   echo "</div>";
						   
						    echo "<div class=\"Datesoccuring\">";
						   echo "The Price: ";
						   echo "£$row->Price"; 
						   echo "</div>";
						   
						   //create pretty date
						   $ts = strtotime ($row->EventsDate);
						   $prettyDate = date("D d M Y H\:i\:s ", $ts);
						   echo "<div class=\"Datesoccuring\">";
						   echo "Date Happening: $prettyDate";
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
						   
						   
						   echo "</div>";
						   
					   		}
					
						}
					
					}
		
                    ?>
            </div>
   
</div>
            
	</div>           
            

	<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>
	</footer>

</body>
</html>