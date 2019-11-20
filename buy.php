<?php
ini_set('display_errors',1);
// includes
require('includes/sessions.inc.php');
require('includes/conn.inc.php');
require('includes/functions.inc.php');

$sEventsID = safeInt($_GET['EventsID']);
$stmt = $pdo->prepare("SELECT * FROM events WHERE EventsID = :EventsID");
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchObject();


$amTickets = $pdo->prepare("SELECT SUM(Purchased) numTickets FROM Purchases WHERE EventID = :EventID GROUP BY EventID");
$amTickets->bindParam(":EventID", $sEventsID, PDO::PARAM_INT);
$amTickets->execute();
$sold = 0;
if ($amTickets->rowCount()) {
	$sold = $amTickets->fetchObject()->numTickets;
}

$freeTickets = ($row->Capacity - $sold);

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
  <link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="Stylesheet/mobilestyle.css"> 
  <script type="text/javascript" src="jscripts/jquery-3.2.1.js"></script>

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
	
		<?php
		echo "<center>";
						   echo "<div class=\"buyticketsin\">";
						   
	   
						   echo "<div id=\"titletkts\">";
						   
						   echo "<h2>$row->Name</h2>";
						   
						   echo "</div>";
	   						 echo "<img src=\"eventpics/{$row->Image}\" alt=\"{$row->Name}\">";
	   
						   
	   
						   
						   echo "<h3> $row->EventsDate</h3>"; 
	   						echo "<h3> $row->Location</a></h3>";
	   						echo "<p> £$row->Price </p>";
						  
						    
	   
	   						echo "<p>Tickets Sold: <span class=\"TicketsSold\">{$sold}</span> </p>";
	   echo "<p>Tickets Left: <span class=\"TicketsLeft\">{$freeTickets}</span></p>";
	   						if(isset($_SESSION['UserID'])) {
	   echo "<label>Buy Tickets</label>";
    echo "<form><input type=\"hidden\" name=\"EventsID\" value=\"{$row->EventsID}\"/><p>";
  	    
		echo "<label>0<input type=\"radio\" name=\"TicketsBuy\" value=\"0\"></label>";
  	    echo "<label>1<input type=\"radio\" name=\"TicketsBuy\" value=\"1\"></label>";
  	    echo "<label>2<input type=\"radio\" name=\"TicketsBuy\" value=\"2\"></label>";
  	    echo "<label>3<input type=\"radio\" name=\"TicketsBuy\" value=\"3\"></label>";
  	    echo "<label>4<input type=\"radio\" name=\"TicketsBuy\" value=\"4\"></label>";
        echo "<label>5<input type=\"radio\" name=\"TicketsBuy\" value=\"5\"></label>";
    echo "</p>";
     echo "</form>";

	   					   echo	"</li>";
						   	  }if(!isset($_SESSION['UserID'])) {
							echo "Please Login to Purchase Tickets";
							}
            				echo "</ul>";
							
        					echo "</div>";  
	   
							echo "</div>";	
				   		echo "</center>"
   
    ?>
    
	
	<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
	
	
			 <script src="jscripts/jquery-3.2.1.js"></script>

<script>
	$('input[name=TicketsBuy]').on('change', function(){ 
		
		var sendVals = $('form').serialize();
		
		$.post("data/updateTickets.php", sendVals, function(myData){ 
			
			 
			$('.TicketsLeft').text(myData.TicketsRem);
			$('.TicketsSold').text(myData.Sold);
			
		}, "json");
	});
	
</script>
	
	
</body>
</html>
