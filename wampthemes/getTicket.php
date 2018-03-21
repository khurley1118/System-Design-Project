<?php

//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");
$ticketID = $_POST['tickeTID'];
$result = "";
$result = mysqli_query($con, "CALL SP_getAdminID($_SESSION['$ticketID'])");

if ($result != false && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $currentTicket = new Ticket();
        $currentTicket->setDescription($row['description']);
        $currentTicket->setFirstName($row['firstName']);
        $currentTicket->setLastName($row['lastName']);
        $currentTicket->setStatus($row['status']);
        $_SESSION['currentTicket'] = $currentTicket;

        <script>
          document.getElementById('ticketDisplay').innerHTML = $currentTicket->getDescription();
          document.getElementById('status').innerHTML = $currentTicket->getStatus();
          document.getElementById('subBy').innerHTML = $currentTicket->getFirstName() + " " + $currentTicket->getLastName();
        </script>
    }
    //Loop through second set of dummy data to close the query (required for stored procedures to work)
    while (mysqli_more_results($con)) {
        mysqli_next_result($con);
    }
} else {
    echo "User does not Exist";
}

?>
