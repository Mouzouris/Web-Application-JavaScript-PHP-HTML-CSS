<?php
ini_set('display_errors',1);
// includes
require('includes/sessions.inc.php');
require('includes/conn.inc.php');
require('includes/functions.inc.php');
$sql = "SELECT * FROM events";
$stmt = $pdo->query($sql);
$amTickets = $pdo->prepare ("SELECT SUM(Purchased) numTickets FROM Purchases WHERE EventID = :EventID GROUP BY EventID");
$max_row = $amTickets->fetch(PDO::FETCH_ASSOC);
$ticketsno = $max_row;


?>

<!doctype html>
<html> 

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Tickets</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="Stylesheet/style.css">
 <link rel="stylesheet" href="stylesheet/cms.css">
  <link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="Stylesheet/mobilestyle.css"> 
  <script type="text/javascript" src="jscripts/jquery-3.2.1.js"></script>

<!--[if lt IE 9]>
<script src="Jscripts/html5shiv.js"> </script>
<![endif]-->

<script type="text/javascript">
	$(document).ready(function(){

	})
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
                 <li><a href="contact-us.php">Contact Us</a></li>
                 <?php 
                 if($_SESSION['UserID'] == 1 ){
                  echo "<li><a href=\"cms.php\">CMS</a></li>";
                  }
                     ?>
                 
                  
                 
                </ul>
                </nav>
            
	</header>
	
		<?php
   while($row = $stmt->fetchObject()){
    
    						
						   echo "<div class=\"sidebartickets\">";
						   
	   
						   echo "<div id=\"titletkts\">";
						   
						   echo "<h2>$row->Name</h2>";
						   
						   echo "</div>";
	   						 echo "<img src=\"eventpics/{$row->Image}\" alt=\"{$row->Name}\">";
	   
						   echo "<ul class=\"sideBarinfo\">";
	   
						   echo "<li>";
						   echo "<h3> $row->EventsDate</h3>"; 
	   						echo "<h3> $row->Location</a></h3>";
	   						
						   echo "<h3> $row->Genre </h3>";
						    echo "<h3> $row->Info </h3>";

	
     echo "</form>";

	   					   echo	"</li>";
						   	  
            				echo "</ul>";
	   						echo "<div class=\"buytickets\">";
	   
	   						echo "<label>Buy Tickets</label>";
	   
    echo "<div class=\"buy\"> <a href=\"buy.php?EventsID={$row->EventsID}\">Purchase</a></div>";
	   						echo "<p> £$row->Price </p>";
	   						
	   						echo "</div>";	
	  						
        					echo "</div>"; 
	   
	   
							echo "</div>";	
				   		
   }
    ?>
    
	
	<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
	
	
			 <script src="jscripts/jquery-3.2.1.js"></script>


	
	
</body>
</html>
