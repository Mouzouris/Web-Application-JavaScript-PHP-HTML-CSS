<?php
ini_set('display_errors', 1);
header('Content-Type: application/json');
require('../includes/conn.inc.php');
require('../includes/functions.inc.php');
require('../includes/sessions.inc.php');
$sEventsID = safeInt($_POST['EventsID']);
$sTickets = safeInt($_POST['TicketsBuy']);
$amTickets = $pdo->prepare ("SELECT SUM(Purchased) numTickets FROM Purchases WHERE EventID = :EventID GROUP BY EventID");
$amTickets->bindParam(":EventID", $sEventsID, PDO::PARAM_INT);
$amTickets->execute();
$sold = 0;
if ($amTickets->rowCount()) {
	$sold = $amTickets->fetchObject()->numTickets;
}

$stmt = $pdo->prepare("SELECT * FROM events WHERE EventsID = :EventsID");
$stmt->bindParam(':EventsID', $sEventsID, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetchObject();
$totalTickets = $row->Capacity;
$freeTickets = ($totalTickets - $sold);

$json = json_encode(array('TicketsRem' => $freeTickets, 'Sold' => $sold));
if($freeTickets >= $sTickets){
	
	$stmt = $pdo->prepare("INSERT INTO Purchases (Purchased, EventID, User) VALUES (:Purch, :EventID, :User)");
	$stmt->bindParam(':EventID', $sEventsID, PDO::PARAM_INT);
	$stmt->bindParam(':Purch', $sTickets, PDO::PARAM_INT);
	$stmt->bindParam(':User', $_SESSION['UserID'], PDO::PARAM_INT);
	$stmt->execute();
	$json = json_encode(array('TicketsRem' => ($freeTickets - $sTickets), 'Sold' => ($sold + $sTickets)));
	
	
	
} else {
	$message = "Sorry No more Tickets";
echo "<script type='text/javascript'>alert('$message');</script>";
	
}
echo $json;

?>
