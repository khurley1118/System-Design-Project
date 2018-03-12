<?php
echo "<script>alert('Hello');</script>";

//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");

$subBy = $_SESSION['userID'];
$desc = $_POST['desc'];
$fNm = $_SESSION['firstName'];
$lNm = $_SESSION['lastName'];

$ticket = new Ticket();
$ticket->insertTicket($con, $desc, $fNm, $lNm, $subBy);

?>
