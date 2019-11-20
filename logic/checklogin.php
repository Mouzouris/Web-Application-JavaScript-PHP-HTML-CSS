<?php
ini_set("display_errors",1);
// check login and create SESSION and count attempts
include('../includes/conn.inc.php');
include('../includes/sessions.inc.php');
include('../includes/functions.inc.php');
include('../includes/password.php');
if(isset($_POST['username']) && ($_POST['password'])){
	$sUsername = safestring($_POST['username']);
	$sPassword = safestring($_POST['password']);
	
	$stmt = $pdo->prepare("Select * FROM Users WHERE Name = :username");
	$stmt->bindParam(':username', $sUsername, PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->fetchObject();
	
	if ($row != null) {
		if (password_verify($_POST['password'], $row->Password)) 
		$_SESSION['Name'] = $row->Name;
		$_SESSION['UserID'] = $row->UserID;
		$_SESSION['login'] = 1;
	}
	}
	
else{
	if(!isset($_SESSION['count'])){
		$_SESSION['count'] = 1;
	}else{
		// 2nd or more fail
		$_SESSION['count']++;	
	}
}
print_r($_SESSION);
header('Location: '. $_SERVER['HTTP_REFERER']);
exit;
?>