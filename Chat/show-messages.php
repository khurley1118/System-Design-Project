<?php
session_start();
include('../connect.php');
include('../utilClass.php');


$senderId =	$_SESSION['userID'];

if(isset($_POST["recipientId"])) {
	$recipientId = $_POST["recipientId"];
	//
	// define('DB_HOST', 'localhost');
	// define('DB_USER', 'root');
	// define('DB_PASS', '');
	// define('DB_NAME', 'chattest');
	//
	// global $con;
	// 	  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
	// if (!$con)
	//   {
	//   die('Could not connect: ' . mysql_error());
	//   }

	// $sql = "select * from chat WHERE senderId = '" . $senderId . "' AND recipientId = '" . $recipientId . "' order by time desc";
	// $results = mysqli_query($con, $sql);

	$results = utilGetConversation($con, $senderId, $recipientId);

	////Get the first 10 messages ordered by time
	//$result = mysql_query("select * from chat order by time desc limit 0,10");

	$numrows = mysqli_num_rows($results);
	$messages = array();
	$times = array();
	//Loop and get in an array all the rows until there are not more to get
	if($numrows != 0){

	    //while($row = mysqli_fetch_array($results)){
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
	        //$size = $arraySize - 1;
	        //This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
	        //mysqli_query($con, "delete from chat where senderid = '" . $senderId . "' AND recipientId = '" . $recipientId . "' and time < " . $times[9]);

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
