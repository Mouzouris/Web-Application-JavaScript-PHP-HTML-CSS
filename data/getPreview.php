<?php
//ini_set('display_errors', 1);
header('Content-Type: application/json');
require('../includes/conn.inc.php');
require('../includes/functions.inc.php');
$sEventsID = safeInt($_GET['EventsID']);
$stmt = $pdo->prepare("SELECT Info, Price FROM events WHERE EventsID = :EventsID");
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchObject();
// add return array and JSON here 
$returnAr = array("Info" => $row->Info);
//$returnAr = array("filmPrice" => $row->filmPrice,"Name"=> "Martin");
echo json_encode($returnAr);
//print_r($returnAr);
?>
