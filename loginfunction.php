<?php
//connection
include("connect.php");
//student id as sent from form
$userID = $_POST['login'];
$id = "";
$result = "";

$idTypeToAssign = "";
// Query the database with a stored procedure call, passing in the student id, loop through the result set
$loginType = $_POST['type'];
if ($loginType == "admin"){
	$result = mysqli_query($con, "ADMIN STORED PROCEDURE HERE");
	$idTypeToAssign = "adminId";
}
else if ($loginType == "faculty") {
	$result = mysqli_query($con, "CALL SP_GetFaculty($userID)");
	$idTypeToAssign = "instructorId";
}
else {
	//else case is it's a student.
	$result = mysqli_query($con, "CALL SP_getUsername($userID)");
	$idTypeToAssign = "studentId";
}

if ($result != false && mysqli_num_rows($result) > 0){
	while ($uRow = mysqli_fetch_array($result)) {
    	$id = $uRow[$idTypeToAssign];
    	//print_r($id);
	}
	//Loop through second set of dummy data to close the query (required for stored procedures to work)
	while (mysqli_more_results($con)) {
    	mysqli_next_result($con);
	}
}
else {
	echo "User does not Exist";
}
//if there is a user with that name check, continue and get their password
if ($id == $userID) {
	$r2 = "";
	//decide which password query to run and run it, exit condition and test result of query
	//if query not false loop through and verify password
	if ($loginType == "admin"){
    	$r2 = mysqli_query($con, "CALL SP_fetchAdminPW($userID)");
	} else if ($loginType == "faculty"){
		$r2 = mysqli_query($con, "CALL SP_fetchInstructorPW($userID)");
	} else {
		$r2 = mysqli_query($con, "CALL SP_fetchStudentPassword($userID)");
	}
    if ($r2 != false){
    	while ($dRow = mysqli_fetch_array($r2)) {
    		//WHEN HASHING IS IMPLEMENTED WILL NEED TO BE MODIFIED
        	$dbpw = $dRow['password'];
    	}
    	while (mysqli_more_results($con)) {
        	mysqli_next_result($con);
    	}
    	//if passwords match log the user in and assign session variables.
    	if ($dbpw == $_POST['password']) {
        	$_SESSION['studentID'] = $userID;
        	$_SESSION['loggedin'] = true;
        	echo json_encode('Logged In');
    } else {
    	//incorrect password error here
    	echo "Incorrect Password";
    	}
	}
}

?>
