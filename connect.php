<?php
//these are defined as constants
define('DB_HOST', 'localhost');
define('DB_USER', 'web');
define('DB_PASS', 'pa$$w0rd');
define('DB_NAME', 'tuprodb');
	
global $con;
	  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
?>