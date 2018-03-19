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

//get form info
$userID = $_POST["getUserID"];
$userType = $_POST["userType"];

if (is_numeric($userID)) {
  //ID valid
  if ($userType == "1") {
    $editUser = GetStudent($con,$userID);
    if (isset($editUser)) {
      //student exists, pass student object forward...
      $_SESSION['editGetUser'] = 1;
      $_SESSION['editUser'] = $editUser;
      $_SESSION['editUserType'] = $userType;
    }
    else {
      //student user doesn't exist with that id
      $_SESSION['editGetUser'] = 2;
    }
  }
  else if ($userType == "2") {
    $editUser = GetInstructor($con,$userID);
    if (isset($editUser)) {
      //instructor exists, pass instructor object forward...
      $_SESSION['editGetUser'] = 1;
      $_SESSION['editUser'] = $editUser;
      $_SESSION['editUserType'] = $userType;
    }
    else {
      //instructor user doesn't exist with that id
      $_SESSION['editGetUser'] = 2;
    }
  }
  else if ($userType == "3") {
    $editUser = GetAdmin($con,$userID);
    if (isset($editUser)) {
      //admin exists, pass admin object forward...
      $_SESSION['editGetUser'] = 1;
      $_SESSION['editUser'] = $editUser;
      $_SESSION['editUserType'] = $userType;
    }
    else {
      //admin user doesn't exist with that id
      $_SESSION['editGetUser'] = 2;
    }
  }
  unset($editUser); //destruct object
}
else {
  //ID not valid
  $_SESSION['editGetUser'] = 3;
}

header('Location: AdminPage.php'); //head back to AdminPage either way
?>
