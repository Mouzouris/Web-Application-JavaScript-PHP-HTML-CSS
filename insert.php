<?php
ini_set('display_errors', 1);
// add your includes for connections and functions
include('includes/conn.inc.php');
include('includes/functions.inc.php');
require('includes/sessions.inc.php');
if(!isset($_SESSION['UserID']) || $_SESSION['UserID'] != 1){
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>CMS-Insert</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="stylesheet/style.css"> 
	<link rel="stylesheet" href="stylesheet/cms.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="stylesheet/mobilestyle.css">
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





<body>
<div class="editcms">
         
              
		
      <div class="page-header">
        <h1>Insert Event </h1>
      </div>
    
    <div class="fields">
    
            
            <form name="form" method="post" action="cms/process/insertrecord.php">
            <div class="EditFields">
            		
                 <input name="EventsID" type="hidden"
				value="<?php echo $row->EventsID; ?>">
                  
                  
                    <label for="Name">Events Name</label>
                    <input type="text" name="Name" id="Name"  class="form-control" >
                  
           </div> 
           
           	  <div class="EditFields">      
                  
                    <label for="EventsDate">Events Date</label>
                    <input type="datetime" name="EventsDate" id="EventsDate"  class="form-control" >
                  
          </div> 
          	  <div class="EditFields">      
                  
                    <label for="Location">Events Location</label>
                    <input type="text" name="Location" id="Location"  class="form-control" >
                  
          </div> 
          
          	  <div class="EditFields">      
                  
                    <label for="Genre">Events Genre</label>
                  
                    <input type="text" name="Genre" id="Genre"  class="form-control" value="<?php echo $row->Genre; ?>">
                 
                  
          </div> 
          
          <div class="EditFields">           
                  
                  
                  
                     <label for="AmofTickets">Events Tickets Left</label>
                    <input types="text" name="AmofTickets" id="AmofTickets" class="form-control"  >
					  
                	</label>
                	
				</div>
                	<div class="EditFields">           
                  
                     <label for="Capacity ">Club Capacity</label>
                    <input type="text" name="Capacity" id="Capacity" class="form-control"  >
					  
                	</label>
	</div>
            
          <div class="EditFields">          

                 
                    <label for="Price">Events Price</label>
                    <input type="text" name="Price" id="Price" class="form-control" >
                  
           </div>
           
           <div class="EditFields">      
                  
                    <label for="Image">Events Image</label>
                    <input type="text" name="Image" id="Image"  class="form-control" >
                  
          </div>
          <div class="EditFields">  
                  
                    <label for="Info">Events Description</label>
                    <textarea name="Info" id="Info" class="form-control"  rows="5"></textarea>
                  
          </div> 
           
           
                  
         	</div> 
                       
                  <p>
                    <input type="submit" name="searchubmit" id="button" value="Update" class="sendButton">
                  </p>
         
</form>
            
    </div>
</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>