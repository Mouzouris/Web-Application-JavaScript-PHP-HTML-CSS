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
$sINDEXID = safeInt($_GET['EventsID']);
$sql= "SELECT * FROM events LIMIT 10 ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':EventsID', $sINDEXID, PDO::PARAM_INT); 
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>CMS-Index-edit</title>
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





<body>
<?php
 while($row = $stmt->fetchObject()) {
echo "<div class=\"editcms\">";
         
              
		
      echo"<div class=\"page-header\">";
        echo "<h1>Edit Index</h1>";
      "</div>";
    
    "<div class=\"fields\">";
            
            echo "<form name=\"form\" method=\"post\" action=\"cms/process/editindex.php\">";
            "<div class=\"EditFields\">";
            		
                 echo "<input name=\"EventsID\" type=\"hidden\"
				value=\" $row->EventsID \">";
                  
                  
                    echo "<label for=\"Name\">Events Name</label>";
                    echo "<input type=\"text\" name=\"Name\" id=\"Name\"  class=\"form-control\" value=\"$row->Name\">";
                  
           "</div> ";
	 
	  echo "<div class=\"EditFields\">";      
                  
                    echo "<label for=\"Image\">Image</label>";
                    echo "<input type=\"text\" name=\"Image\" id=\"Image\"  class=\"form-control\" value=\"$row->Image\">";
                  
          echo "</div>";
           
           	  echo "<div class=\"EditFields\">";      
                  
                    echo"<label for=\"EventsDate\">Events Date</label>";
	
                    echo "<input type=\"text\" name=\"EventsDate\" id=\"EventsDate\"  class=\"form-control\" value=\"$row->EventsDate\">";
                  
          echo "</div>"; 
          	   echo "<div class=\"EditFields\">";      
                  
                    echo "<label for=\"Location\">Events Location</label>";
                    echo "<input type=\"text\" name=\"Location\" id=\"Location\"  class=\"form-control\" value=\"$row->Location\">";
                  
          echo "</div>";
           echo "<div class=\"EditFields\">";      
                  
                    echo "<label for=\"Genre\">Events Genre</label>";
                    echo "<input type=\"text\" name=\"Genre\" id=\"Genre\"  class=\"form-control\" value=\"$row->Genre\">";
                  
          echo "</div>";
     
         	echo "</div>";
                       
                  echo "<p>";
                    echo "<input type=\"submit\" name=\"searchsubmit\" id=\"button\" value=\"Update\" class=\"sendButton\">";
                  echo "</p>";
         
echo "</form>";
            
    echo "</div>";
echo "</div>";
}
						?>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>