<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
   include('connect.php');
   include('Header.php');
   include('Footer.php');
   //include('StudentClass.php');
   //include('InstructorClass.php');
   //include('utilClass.php');
   //if user id is not set then user is not logged in and is redirected to index.
   if (!isset($_SESSION['userID']) || $_SESSION['userID'] == ""){
   	header("location: index.php");
   }
   // set local variables for use from session variables.
   $id = $_SESSION['userID'];
   $userType = $_SESSION['userType'];
   $user = $_SESSION['CurrentUser'];
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Change Password</title>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/scripts.js"></script>
      <link rel="stylesheet" type="text/css" href="css/defaultHome.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/pageStylings.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  
	  <?php
		if (isset($_POST["changePassSubmit"])) {
			//check student or faculty user type first
			if ($userType == "student") {
				//get existing pw
				$existingPW = utilStudentGetPassword($con,$id);
				
				//get inputted pw
				$inputtedOldPW = $_POST["oldPass"];
				echo ($existingPW);
				
				//check match
				if ($existingPW == $inputtedOldPW) {
					//user entered correct password, proceed with changePassForm
					//get user's inputted new pw and confirm pw
					$newPW = $_POST["newPass"];
					$confirmNewPW = $_POST["confirmPass"];
					//make sure new pass and confirm new pass match
					if ($newPW == $confirmNewPW) { 
						//passwords match, able to update new password
						echo $id;
						echo $newPW;
						$success = DLstudentPasswordChange($con, $id, $newPW);
						echo $success;
					}
					else {
						//user's confirm pw doesn't match, display error message
					}
				}
				else {
					//user did not enter correct pw, display error message
					
				}
			}
			else if ($userType == "faculty") {
				//get existing pw
				$existingPW = utilInstructorGetPassword($con,$id);
				
				//get inputted pw
				$inputtedOldPW = $_POST["oldPass"];
				
				//check match
				if ($existingPW == $inputtedOldPW) {
					//user entered correct password, proceed with changePassForm
					//get user's inputted new pw and confirm pw
					$newPW = $_POST["newPass"];
					$confirmNewPW = $_POST["confirmPass"];
					//make sure new pass and confirm new pass match
					if ($newPW == $confirmNewPW) { 
						//passwords match, able to update new password
						DLinstructorPasswordChange($con, $id, $newPW);
					}
					else {
						//user's confirm pw doesn't match, display error message
					}
				}
				else {
					//user did not enter correct pw, display error message
					
				}
			}
		}
	  ?>
   </head>
<form action="" method="post" id="changePassForm">
<input type="text" id="oldPass" name="oldPass" placeholder="Enter current password" size="60" required><span id="oldPassError"> </span><br><BR>
<input type="password" id="newPass" name="newPass" size="60" placeholder="Enter new password" required> <span id="newPassError"> </span><br><BR>
<input type="password" id="confirmPass" name="confirmPass" size="60" placeholder="Confirm new password" required> <span id="confirmPassError"> </span><br><BR>
<input id="changePassSubmit" name="changePassSubmit"  alt="Submit Form"  type="submit" value="Change Password"/><br><br>
</form>
<form id = "cancelForm"action="Home.php" method="post">
	<input id="cancelButton" name="cancelButton"  alt="Cancel"  type="submit" value="Cancel"/>
</form>