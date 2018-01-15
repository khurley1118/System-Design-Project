<?php 
	include(connect.php);
	$username = $_POST("un");
	$existingusername = "db get username here";
	$dbpasswd = "stored procedure to get password here";
	$passwordtrue = password_verify($_POST("pw"), $dbpasswd);
	if ($passwordtrue && $username == $existingusername){
		header('location:userhome.php');
	}
	//test
?>