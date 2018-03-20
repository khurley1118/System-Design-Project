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

//get inputs from edit course form
$inDescription = $_POST["getCourseDesc"];
$inInstructor = $_POST["editInstructor"]; //will be used when assigning to course... TODO
$inActiveStatus = $_POST["editActive"]; //note: all this does currently is change active/inactive in the db.

//check if the inputted values are the same as current DB values.
//if they are, no need to change, give message saying no change
//if they're different, go ahead and update.
$success = false;
if (isset($_SESSION['editCourse'])) {
  //proceed
  if (!($_SESSION['editCourse']->getDescription() == $inDescription && $_SESSION['editCourse']->getIsActive() == $inActiveStatus)) { //note: once assigning is worked out, also need to check that instructor is different too
    //inputs are different from existing values, need to update course object and DB
    $_SESSION['editCourse']->setDescription($inDescription);
    $_SESSION['editCourse']->setIsActive($inActiveStatus);
    $success = $_SESSION['editCourse']->UpdateCourse($con);
    if ($success) {
      //course has been updated. display success message.
      $_SESSION['adminEditCourse'] = 1;
    }
    else {
      //error updating course. display error message.
      $_SESSION['adminEditCourse'] = 2;
    }
  }
  else {
    //inputted values were the same as the existing values, no need to update
    $_SESSION['adminEditCourse'] = 3;
  }
}
else {
  //no valid course gotten from get course form
  $_SESSION['adminEditCourse'] = 4;
}


header('Location: AdminPage.php');
?>
