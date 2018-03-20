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
$courseCode = $_POST["getCourseCode"];

//get the course from db, at the same time checking if exists
$course = GetCourseObject($con,$courseCode);
if (!is_null($course)) { //course was returned successfully, pass course object forward
  $_SESSION['editGetCourse'] = 1;
  $_SESSION['editCourse'] = $course;
}
else { //no course with that course code exists
  $_SESSION['editGetCourse'] = 2;
}

header('Location: AdminPage.php'); //head back to AdminPage either way
?>
