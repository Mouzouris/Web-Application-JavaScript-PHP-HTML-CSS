<?php
ini_set('display_errors', 1);
// add your includes for connections and functions
include('../../includes/conn.inc.php');
include('../../includes/functions.inc.php');
// make sure the path is correct
// sanitize user variables
$sEventsName = safeString($_POST['Name']);
$sEventsDate = safeString($_POST['EventsDate']);
$sEventsLocation = safeString($_POST['Location']);
$sEventsGenre = safeString($_POST['Genre']);
$sAmofTickets = safeInt($_POST['AmofTickets']);
$sCapacity = safeInt($_POST['Capacity']);
$sEventsPrice = safeFloat($_POST['Price']);
$sEventsImage = safeString($_POST['Image']);
$sEventsInfo = safeString($_POST['Info']);

$sEventsID = safeInt($_POST['EventsID']);
// build prepare statement
// prepare SQL
$sql = "DELETE FROM events WHERE EventsID = :EventsID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT);
$stmt->execute();
// redirect browser
header("Location: ../../cms.php");
// make sure no other code executed
exit;
?>
