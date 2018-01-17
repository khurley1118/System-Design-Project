<?php 
	include(connect.php);
	$studentID = $_POST("studentID");
	$result = mysqli_query($con, "CALL SP_getUsername($studentID)")
	//if there is a user with that name check, continue and get their password
	if ($result > 0){
		 $pwArray = mysqli_fetch_array($con, "CALL SP_fetchStudentPassword($studentID)")
		 while ($dRow = mysqli_fetch_array($pwArray)) {
             $pw = ($pwArray["password"]);
         }
         $passwordtrue = password_verify($_POST("pw"), $dbpasswd);
         if ($passwordtrue){
         	$_SESSION['studentID'] = $studentID;
         	$_SESSION['loggedin'] = $true;
			header('location:userhome.php');
		}
		else {
			//incorrect password error here
		}
	else {
		//code for no user found error 
	}		
	$username = $_POST("un");
	$existingusername = "db get username here";
	$dbpasswd = "stored procedure to get password here";
	$passwordtrue = password_verify($_POST("pw"), $dbpasswd);
	if ($passwordtrue && $username == $existingusername){
		header('location:userhome.php');
	}
?>