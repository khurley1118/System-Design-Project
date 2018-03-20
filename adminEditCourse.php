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
$courseCode = $_POST["courseCode"];
$courseDescription = $_POST["courseDescription"];

//make sure you can't insert a course if a course with that course code already exists
if (is_null(utilCourseName($con,$courseCode))) {
  //create course object and set attributes
  $course = new Course();
  $course->setCourseCode($courseCode);
  $course->setDescription($courseDescription);

  //call insert function
  $success = $course->insertCourse($con);
  if ($success) {
    //insert was successful, create course folder, destruct object, redirect to AdminPage
    $_SESSION['insertCourse'] = 1;
    //note: below uses description as folder name, as description is really more of a title
    if (!file_exists('Content/' . $course->getDescription())) { //should this have an else condition?
    mkdir('Content/' . $courseDescription, 0777, true);
    }
    unset($course);
  }
  else {
    //insert was not sucessful, display error message
    $_SESSION['insertCourse'] = 2;
    unset($course);
  }
}
else {
  //course with that code already exists.
  $_SESSION['insertCourse'] = 3;
}

header('Location: AdminPage.php');
?>
