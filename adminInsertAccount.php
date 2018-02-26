<?php
//note: still need insert Admin
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
include('courseClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

//get account info from form, ensure conf password matches
$newUserId = $_POST["newID"];
$newUserPW = $_POST["newPassword"];
$newUserConfPW = $_POST["newConfPassword"];
$newUserFName = $_POST["newFirstName"];
$newUserLName = $_POST["newLastName"];
$newUserType = $_POST["newUserType"];
$newUserAddedBy = $id; //session ID for logged in admin

//check pw/conf pw match first
if ($newUserPW == $newUserConfPW) {
  //create appropriate type user object and set attributes
  if ($newUserType == "1") {
    $newUser = new Student();
    $newUser->setStudentID($newUserId);
    $newUser->setPassword($newUserPW);
    $newUser->setFirstName($newUserFName);
    $newUser->setLastName($newUserLName);
    $newUser->setAddedBy($newUserAddedBy);

    //call insert function
    $success = $newUser->insertStudent($con);
  }
  else if ($newUserType == "2") {
    $newUser = new Instructor();
    $newUser->setInstructorId($newUserId);
    $newUser->setPassword($newUserPW);
    $newUser->setFirstName($newUserFName);
    $newUser->setLastName($newUserLName);
    $newUser->setAddedBy($newUserAddedBy);

    //call insert function
    $success = $newUser->insertInstructor($con);
  }

  if ($success) {
    //account has been inserted. display success message.
    $_SESSION['insertAccount'] = 1;
  }
  else {
    //error inserting account. display error message.
    $_SESSION['insertAccount'] = 3;
  }
}
else {
  //display pw mismatch flag...set admiralsnackbar, redirect back to AdminPage.php
  $_SESSION['insertAccount'] = 2;
}

unset($newUser); //destruct object
header('Location: AdminPage.php'); //head back to AdminPage either way
?>
