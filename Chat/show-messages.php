<?php
session_start();
include('../connect.php');
include('../utilClass.php');


$senderId =	$_SESSION['userID'];

if(isset($_POST["recipientId"])) {
	$recipientId = $_POST["recipientId"];
	
	$results = utilGetConversation($con, $senderId, $recipientId);

	////Get the first 10 messages ordered by time

	$numrows = mysqli_num_rows($results);
	$messages = array();
	$times = array();
	//Loop and get in an array all the rows until there are not more to get
	if($numrows != 0){

		foreach($results as $row) {
				//Put the messages in divs and then in an array
				if($row['recipientId'] == $senderId) {
					$messages[] = "<div class='bubble'>" . $row['message'] . "</div>";
				}
				else{
					$messages[] = "<div class='bubble bubble-alt white'>" . $row['message'] . "</div>";
				}
				$times[] = $row['time'];

	    }
	    //Display the messages in an ascending order, so the newest message will be at the bottom
	    $arraySize = count($messages);

			$deleteSuccess = true;

	    if($arraySize > 9){
	        //This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
			$deleteSuccess = utilDeleteOldMessages($con, $senderId, $recipientId, $times[9]);
	    }
			if($deleteSuccess){
		    for($i=$arraySize - 1;$i>=0;$i--){
		       echo $messages[$i];
		    }
			}
			else{
				echo "Please contact admin, there is an issue with message logging";
			}
	}
	else{
	    echo "No messages found";
	}
}
else{
	echo "Unable to retrive messages at this time.";
}

?>
