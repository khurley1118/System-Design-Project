
<?php
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

//check student or faculty user type first
			if ($userType == "student") {
				//get existing pw
				$existingPW = utilStudentGetPassword($con,$id);

				//get inputted pw
				$inputtedOldPW = $_POST["oldPW"];

				//check match
				if ($existingPW == $inputtedOldPW) {
					//user entered correct password, proceed with changePassForm
					//get user's inputted new pw and confirm pw
					$newPW = $_POST["newPW"];
					$confirmNewPW = $_POST["confPW"];
					//make sure new pass and confirm new pass match
					if ($newPW == $confirmNewPW) {
						//passwords match, able to update new password
						$success = $user->ChangePassword($con,$newPW);
						if ($success == 1) {
							$_SESSION['passwordChng'] = 1;
							$user->setPassword($newPW);
						}
						else {
							$_SESSION['passwordChng'] = 4;
						}

						header('Location: index.php');
					}
					else {
						//user's confirm pw doesn't match, display error message
						$_SESSION['passwordChng'] = 2;
						header('Location: index.php');
					}
				}
				else {
					//user did not enter correct pw, display error message
					$_SESSION['passwordChng'] = 3;
					header('Location: index.php');
				}
			}
			else if ($userType == "faculty") {
				//get existing pw
				$existingPW = utilInstructorGetPassword($con,$id);

				//get inputted pw
				$inputtedOldPW = $_POST["oldPW"];

				//check match
				if ($existingPW == $inputtedOldPW) {
					//user entered correct password, proceed with changePassForm
					//get user's inputted new pw and confirm pw
					$newPW = $_POST["newPW"];
					$confirmNewPW = $_POST["confirmPW"];
					//make sure new pass and confirm new pass match
					if ($newPW == $confirmNewPW) {
						//passwords match, able to update new password
						$success = $user->ChangePassword($con,$newPW);
						if ($success == 1) {
							$_SESSION['passwordChng'] = 1;
							$user->setPassword($newPW);
						}
						else {
							$_SESSION['passwordChng'] = 4;
						}

						header('Location: index.php');
					}
					else {
						//user's confirm pw doesn't match, display error message
						$_SESSION['passwordChng'] = 2;
						header('Location: index.php');
					}
				}
				else {
					//user did not enter correct pw, display error message
					$_SESSION['passwordChng'] = 3;
					header('Location: index.php');
				}
			}
?>
