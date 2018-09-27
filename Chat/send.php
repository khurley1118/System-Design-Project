<?php
session_start();
include('../connect.php');
$senderID =	$_SESSION['userID'];

if(isset($_POST["recipientId"]) && isset($_POST["message"])) {
	$recipientID = $_POST["recipientId"];
	$message = $_POST['message'];
		
		
		//check if message is too short
		if(strlen($message) < 2){
		   echo 3;
		}
		//Check if message is too long
		else if(strlen($message) > 255){
		   echo 4;
		}
		//If everything is fine
		else{
		   //This array contains the characters what will be removed from the message and name, because else somebody could send redirection script or links
		   $search = array("<",">",">","<");
		   //Insert a new row in the chat table
		   mysqli_query($con, "insert into chat values ('" . time() . "', '" . str_replace($search,"",$message) .
		           "', '" . $senderID . "', '" . $recipientID . "')") or die(5);
			 echo 7;
		}
}
else{
	//POST is not set
	echo 6;
}
?>
