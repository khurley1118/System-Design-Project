<?php

//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");

$id = $_POST['ticket'];
$ticket2 = new Ticket();
$ticket = $ticket2->getTicket($con, $id);
$fName = $ticket->getFirstName();
$lName = $ticket->getLastName();
$fullName = $fName . " " . $lName;
$desc = $ticket->getDescription();
$status = $ticket->getStatus();
$ticketInfo = array($fullName, $desc, $status);

//returns something like [name, description, status]
echo json_encode($ticketInfo);
?>
