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

$ticket = new Ticket();
$ticket->resolveTicket($con, $id);

?>
