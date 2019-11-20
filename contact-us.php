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
<title>Contact-Us</title>
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
                  echo "<li><a href=\" cms.php\">CMS</a></li>";
                  }
                     ?>
                  
                 
                </ul>
                </nav>
            
            </header>

<div id="container">

<section>
<form method="post" action="formpostprocess.php">
  <fieldset id='Contact-us'>
        <legend>Personal Details</legend>
        <p>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" />   
        </p>   
        <p>

            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" />   
        </p>    
        <p>
            <label for="Email">Email</label>
            <input type="email" name="email" id="Email" />   
        </p>  
        <p>
            <label for="Tel">Contact Telephone</label>
            <input type="tel" name="telephone" id="Tel" />   
        </p>  
       
        <p>
        <span class="label">Gender</span>

          <label class="inline" for="Male">Male</label>
            <input name="gender" type="radio" class="inline" id="Male" value="male" />
          <label class="inline" for="Female">Female</label>
            <input name="gender" type="radio" class="inline" id="Female" value="female" />
        </p>
    </fieldset>
     <fieldset id='Contact-us'>
        <legend>Feedback</legend>

        <p>
            <label for="comments">Leave us your comments</label>
            <textarea name="comments" id="comments"></textarea>
        </p>
     </fieldset>
     <fieldset id='Contact-us'>
        <legend>Marketing</legend>

        <p>
            <label for="mailingList">Join mailing list</label>
            <input type="checkbox" name="list" id="mailingList" value="1" />
        </p>
        <p>
            <label for="marketing">How did you hear about us?</label>
            <select name="marketing" id="marketing">
              <option value="Web">Web</option>
              <option value="Friend">Friend</option>
              <option value="Other">Other</option>
            </select>
        </p>
    </fieldset>
    <p class="sendmail">
        <input type="submit" value="Send" class="sendButton" />
    </p>

</form>
</section>

<footer>
        <p>&copy; Copyright Demetris Mouzouris 2017</p>
    </footer>

</div>
		
</body>
</html>