<?php
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
include('courseClass.php');
include('AdminClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

//get account info from form, ensure conf password matches
$userId = $_POST["ID"];
$newUserPW = $_POST["newPassword"];
$newUserConfPW = $_POST["newConfPassword"];
$userType = $_POST["userType"];

if (is_numeric($userId)) {
  //user ID is valid, proceed
  //check pw/conf pw match first
  if ($newUserPW == $newUserConfPW) {
    //check that user ID exists for the user type selected, create appropriate type user object and set attributes if so
    $success = false;
    if ($userType == "1") {
      $studentCheck = GetStudent($con,$userId);
      if (isset($studentCheck)) {
        $newUser = new Student();
        $newUser->setUserID($userId);
        //hash password
        $hashedPassword = password_hash($newUserPW, PASSWORD_DEFAULT);
        $newUser->setPassword($hashedPassword);

        //call change PW function
        $success = $newUser->ChangePassword($con,$hashedPassword);
        if ($success) {
          //password has been changed. display success message.
          $_SESSION['adminResetPassword'] = 1;
        }
        else {
          //error changing password. display error message.
          $_SESSION['adminResetPassword'] = 3;
        }
      }
      else {
        //the inputted ID doesn't exist in the db for that user type
        $_SESSION['adminResetPassword'] = 4;
      }
    }
    else if ($userType == "2") {
      $instructorCheck = GetInstructor($con,$userId);
      if (isset($instructorCheck)) {
        $newUser = new Instructor();
        $newUser->setUserID($userId);
        //hash password
        $hashedPassword = password_hash($newUserPW, PASSWORD_DEFAULT);
        $newUser->setPassword($hashedPassword);

        //call change PW function
        $success = $newUser->ChangePassword($con,$hashedPassword);
        if ($success) {
          //password has been changed. display success message.
          $_SESSION['adminResetPassword'] = 1;
        }
        else {
          //error changing password. display error message.
          $_SESSION['adminResetPassword'] = 3;
        }
      }
      else {
        //the inputted ID doesn't exist in the db for that user type
        $_SESSION['adminResetPassword'] = 4;
      }
    }
    else if ($userType == "3") {
      $adminCheck = GetAdmin($con,$userId);
      if (isset($adminCheck)) {
        $newUser = new Admin();
        $newUser->setUserID($userId);
        //hash password
        $hashedPassword = password_hash($newUserPW, PASSWORD_DEFAULT);
        $newUser->setPassword($hashedPassword);

        //call change PW function
        $success = $newUser->ChangePassword($con,$hashedPassword);
        if ($success) {
          //password has been changed. display success message.
          $_SESSION['adminResetPassword'] = 1;
        }
        else {
          //error changing password. display error message.
          $_SESSION['adminResetPassword'] = 3;
        }
      }
      else {
        //the inputted ID doesn't exist in the db for that user type
        $_SESSION['adminResetPassword'] = 4;
      }
    }
  }
  else {
    //display pw mismatch flag
    $_SESSION['adminResetPassword'] = 2;
  }

  unset($newUser); //destruct object
}
else {
  //user ID wasn't valid
  $_SESSION['adminResetPassword'] = 5;
}

header('Location: AdminPage.php'); //head back to AdminPage either way
?>
