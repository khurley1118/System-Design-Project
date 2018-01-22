<?php
$senderID = 1234567;
$recipientID = 7654321;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chattest');
	
global $con;
	  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sql = "select * from chat WHERE senderId = '" . $senderID . "' order by time desc";
$results = mysqli_query($con, $sql);

////Get the first 10 messages ordered by time
//$result = mysql_query("select * from chat order by time desc limit 0,10");

$numrows = mysqli_num_rows($results);
$messages = array();
$times = array();
//Loop and get in an array all the rows until there are not more to get
if($numrows != 0){
    while($row = mysqli_fetch_array($results)){
       //Put the messages in divs and then in an array
       $messages[] = "<div class='message'><div class='messagehead'>" . $row['senderId'] . " - " . date('g:i A M, d Y',$row['time']) . "</div><div class='messagecontent'>" . $row['message'] . "</div></div>";
       //The last posts date
       //$old = $row['time'];
       $times[] = $row['time'];
       
    }
    //Display the messages in an ascending order, so the newest message will be at the bottom
    $arraySize = count($messages);
    
    if($arraySize >= 10){
        $size = $arraySize - 1;
        //This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
        mysqli_query($con, "delete from chat where senderid = '" . $senderID . "' and recipientId = '" . $recipientID . "' and time < " . $times[9]);
      
    }
    else{
        $size = 9;
    }
    
    for($i=$size;$i>=0;$i--){
       echo $messages[$i];
    }
}
else{
    echo "No messages found";
}

?>