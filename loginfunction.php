<?php
//connection
include("connect.php");

//student id as sent from form 
$studentID = $_POST['login'];
$id = "";
//print_r($_POST);
// Query the database with a stored procedure call, passing in the student id, loop through the result set 
$result = mysqli_query($con, "CALL SP_getUsername($studentID)");
if ($result != false){
	while ($uRow = mysqli_fetch_array($result)) {
    	$id += ($uRow['studentId']);
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
if ($id == $studentID) {
    $r2 = mysqli_query($con, "CALL SP_fetchStudentPassword($studentID)");
    if ($r2 != false){
    	while ($dRow = mysqli_fetch_array($r2)) {
        	$dbpw = $dRow['password'];
    	}
    	while (mysqli_more_results($con)) {
        	mysqli_next_result($con);
    	}
    	if ($dbpw == $_POST['password']) {
        	$_SESSION['studentID'] = $studentID;
        	$_SESSION['loggedin'] = true;
        	echo "Logged In";
    } else {
    	//incorrect password error here
    	echo "Incorrect Password";
    	}
	}
}

?>