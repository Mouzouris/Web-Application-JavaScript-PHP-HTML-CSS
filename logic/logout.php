<?php
// log out logic
include('../includes/sessions.inc.php');
setcookie(session_name(), '', time()-3600, '/~b5026874', 'homepages.shu.ac.uk', 1, 1);
$_SESSION = array();
session_destroy();
header("location:../index.php");
exit();
?>