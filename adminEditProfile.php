<?php
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
include('courseClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

//get first name and last name from edit profile form
$inFirstName = $_POST["inFirstName"];
$inLastName = $_POST["inLastName"];

//check if the inputted values are the same as current DB values.
//if they are, no need to change, give message saying no change
//if they're different, go ahead and update.
$success = false;
if (isset($_SESSION['editUser'])) {
  //proceed
  if (!($_SESSION['editUser']->getFirstName() == $inFirstName && $_SESSION['editUser']->getLastName() == $inLastName)) {
    //inputted names are different from existing names, need to update user object and DB
    $_SESSION['editUser']->setFirstName($inFirstName);
    $_SESSION['editUser']->setLastName($inLastName);
    $success = $_SESSION['editUser']->UpdateNames($con);
    if ($success) {
      //user has been updated. display success message.
      $_SESSION['adminUpdateUser'] = 1;
    }
    else {
      //error updating user. display error message.
      $_SESSION['adminUpdateUser'] = 2;
    }
  }
  else {
    //inputted names were the same as the existing names, no need to update
    $_SESSION['adminUpdateUser'] = 3;
  }
}
else {
  //no valid user gotten from get user form
  $_SESSION['adminUpdateUser'] = 4;
}


header('Location: AdminPage.php');
?>
