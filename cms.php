<?php
ini_set('display_errors', 1);
// add your include
        
      
require('includes/sessions.inc.php');
include('includes/conn.inc.php');
include('includes/functions.inc.php');
if(!isset($_SESSION['UserID']) || $_SESSION['UserID'] != 1){
	header('location:index.php');
}
$sql= "SELECT * FROM events";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>


          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>CMS</title>
<link rel="stylesheet" href="stylesheet/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="stylesheet/style.css"> 
	<link rel="stylesheet" href="stylesheet/cms.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:700px)" href="stylesheet/mobilestyle.css">
	<script type="text/javascript" src="jscripts/jquery-3.2.1.js"></script>
	
	


<!--[if lt IE 9]>
<script src="Jscripts/html5shiv.js"> </script>
<![endif]-->
<script type="text/javascript">
	$(document).ready(function(){

$('#welcomeBanner img').on('click', function(){
  $('#welcomeBanner').fadeOut('fast');
  
});

	})
	</script>
</head>

<body>
	<div id="welcomeBanner"> <p>Nice to have you back Admin<img src="images/close.png" width="45" height="45" alt="Close Button" /></p> </div>
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
                 <li><a href="cms.php">CMS</a></li>
                  
                 
                  
                 
                </ul>
                </nav>
            
	</header>
               <div class="maintitlecms">
                    <h1>Content Management Systems</h1>  
	</div>   
            <div class="eventsoutput">
            
            <div class="cmstitle">
            <a href="insert.php" class="btn btn-success">Add New Event</a>
            <a href="editmyindex.php" class="btn btn-success">Edit Index</a>
            <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" >
    <input type="submit" name="buttonsubmit" value="Upload Image" name="upload">
</form>
			</div>
             
              <table class="table-striped">
              		<thead>
                        <tr>
                            <th class="titles">Event</th>
                            <th class="titles">Edit</th>
                            <th class="titles">Delete</th>
                            <th class="titles">View</th>
                        </tr>
                    </thead>
					<?php 
					while($row = $stmt->fetchObject()){
						// amend with links to the relevant pages
								echo "<tr class=\"cmsrow\">";
								echo "<td class=\"cmsnamecol\">{$row->Name}</td>";	
						echo "<td class=\"cmsedit\"><a href=\"edit.php?EventsID={$row->EventsID}\">Edit</a></td>";
						
						echo "<td class=\"cmsdelete\"><a href=\"delete.php?EventsID={$row->EventsID}\">Delete</a></td>";
						
						echo "<td class=\"cmsdetails\"><a href=\"details.php?EventsID={$row->EventsID}\">View</a></td>";
						echo "</tr>";
						}
                    ?>
            </table>
            </div>
    </div>
</div>
<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>

	</footer>
</body>
</html>