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

//get course code and description admin posted from AdminPage form
$newUserId = $_POST["noFormYet"];
$newUserPW = $_POST["noFormYet"];
$newUserAddedBy = $_POST["noFormYet"];
$newUserFName = $_POST["noFormYet"];
$newUserLName = $_POST["noFormYet"];
$newUserType = $_POST["noFormYet"];

//create course object and set attributes
if ($newUserType == "student") {
  $newUser = new Student();
  $newUser->setStudentID($newUserId);
  $newUser->setPassword($newUserPW);
  $newUser->setFirstName($newUserFName);
  $newUser->setLastName($newUserLName);
  //added by field in db, so remember to get admin's id for that
  //$newUser->setCourses($courses); //probably won't have courses assigned in the beginning

  //call insert function
  $success = $newUser->insertStudent($con);
}
else if ($newUserType == "faculty") {
  $newUser = new Instructor();
  $newUser->setInstructorId($newUserId);
  $newUser->setPassword($newUserPW);
  $newUser->setFirstName($newUserFName);
  $newUser->setLastName($newUserLName);
  //$newUser->setCourses($courses); //probably won't have courses assigned in the beginning

  //call insert function
  $success = $newUser->insertInstructor($con);
}

if ($success) {
  //insert was successful, destruct object, redirect to AdminPage
  $_SESSION['insertCourse'] = 1;
  unset($newUser);
}
else {
  //insert was not sucessful, display error message
  $_SESSION['insertCourse'] = 2;
  unset($newUser);
}
header('Location: AdminPage.php');
?>
