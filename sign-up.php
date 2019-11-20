<?php
ini_set('display_errors',1);
// include sessions.inc.php here
require('includes/sessions.inc.php');

?>
<!DOCTYPE html>
<html>
          <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1">
<title>Register</title>
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
<div id="container">

<section>
<form method="post" action="connectusers.php">
  <fieldset id='Contact-us'>
        <legend>Register</legend>
        <p>
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" />   
        </p> 
         <p>
            <label for="Email">Email</label>
            <input type="Email" name="Email" id="Email" />   
        </p>   
        <p>

            <label for="Password">Password</label>
            <input type="Password" name="Password" id="Password" />   
        </p> 
	</fieldset>
         
        <p class="sendmail">
        <input type="submit" value="Submit" class="sendButton" />
	</p> 
        
        



	<footer>
		<p>&copy; Copyright Demetris Mouzouris 2017</p>
	</footer>

</body>
</html>