<?php
ini_set('display_errors', 1);
// add your includes for connections and functions
include('../../includes/conn.inc.php');
include('../../includes/functions.inc.php');
// make sure the path is correct
// sanitize user variables
$sINDEXName = safeString($_POST['Name']);
$sINDEXImage = safeString($_POST['Image']);
$sINDEXDate = safeString($_POST['EventsDate']);
$sINDEXLocation = safeString($_POST['Location']);
$sINDEXGenre = safeString($_POST['Genre']);

$sINDEXID = safeInt($_POST['EventsID']);
// build prepare statement
// prepare SQL
$sql = "UPDATE events SET 
Name = :Name,
Image = :Image,
EventsDate = :EventsDate,
Location = :Location,
Genre = :Genre
WHERE EventsID = :EventsID";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':Name', $sINDEXName, PDO::PARAM_STR);
$stmt->bindParam(':Image', $sINDEXImage, PDO::PARAM_STR);
$stmt->bindParam(':EventsDate', $sINDEXDate, PDO::PARAM_STR);
$stmt->bindParam(':Location', $sINDEXLocation, PDO::PARAM_STR);
$stmt->bindParam(':Genre', $sINDEXGenre, PDO::PARAM_STR);
$stmt->bindParam(':EventsID', $sINDEXID, PDO::PARAM_INT);
$stmt->execute();
// redirect browser
header("Location: ../../cms.php");
// make sure no other code executed
exit;
?>
