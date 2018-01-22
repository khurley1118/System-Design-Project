<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chattest');
	
global $con;
	  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
if (!$con)
  {
    echo 8;
  die('Could not connect: ' . mysqli_error());
  }
  
$senderID = 1234567;
$recipientID = 7654321;
  
$message = $_GET['message'];
$name = $_GET['name'];
  
if(strlen($message) < 1){
   echo 3;
}
//Check if message is too long
else if(strlen($message) > 255){
   echo 4;
}
//Check if name is empty
else if(strlen($name) < 1){
   echo 5;
}
//Check if name is too long
else if(strlen($name) > 29){
   echo 6;
}
////Check if the name is used by somebody else
//else if(mysqli_num_rows(mysqli_query($con, "select * from chat where name = '" . $name . "' and ip != '" . @$REMOTE_ADDR . "'")) != 0){
//   echo 7;
//}
//If everything is fine
else{
   //This array contains the characters what will be removed from the message and name, because else somebody could send redirection script or links
   $search = array("<",">",">","<");
   //Insert a new row in the chat table
   mysqli_query($con, "insert into chat values ('" . time() . "', '" . str_replace($search,"",$message) .  
           "', '" . $senderID . "', '" . $recipientID . "')") or die(8);
}
?>