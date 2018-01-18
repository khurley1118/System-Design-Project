<?php
////Connect to MySQL
//mysql_connect('host','database','password');
////Select database
//mysql_select_db('database') or die(2);

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

$sql = "select * from chat order by time desc limit 0,10";
$results = mysqli_query($con, $sql);

////Get the first 10 messages ordered by time
//$result = mysql_query("select * from chat order by time desc limit 0,10");

$numrows = mysqli_num_rows($results);
$messages = array();
//Loop and get in an array all the rows until there are not more to get
if($numrows != 0){
    while($row = mysqli_fetch_array($results)){
       //Put the messages in divs and then in an array
       $messages[] = "<div class='message'><div class='messagehead'>" . $row['name'] . " - " . date('g:i A M, d Y',$row['time']) . "</div><div class='messagecontent'>" . $row['message'] . "</div></div>";
       //The last posts date
       $old = $row['time'];

       
    }
    //Display the messages in an ascending order, so the newest message will be at the bottom
    
    $arraySize = count($messages);
    if($arraySize < 10){
        $size = $arraySize - 1;
        //This is the more important line, this deletes each message older then the 10th message ordered by time, so the table will never have to store more than 10 messages.
        //mysqli_query($con, "delete from chat where time < " . $messages[$size]);
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