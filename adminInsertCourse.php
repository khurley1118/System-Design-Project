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
$courseDescription = $_POST["Description"];

//create course object and set attributes
$course = new Course();
$course->setCourseCode($courseCode);
$course->setDescription($courseDescription);

//call insert function
$success = $course->insertCourse($con);
if ($success) {
  //insert was successful, destruct object, redirect to AdminPage
  $_SESSION['insertCourse'] = 1;
  unset($course);
}
else {
  //insert was not sucessful, display error message
  $_SESSION['insertCourse'] = 2;
  unset($course);
}
header('Location: AdminPage.php');
?>
