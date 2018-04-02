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

//get course from dropdown menu on form
$courseCode = $_POST["courseList"];

//getting course from dropdown, so no need to validate. make course object, call delete method
$course = GetCourseObject($con,$courseCode);

//need to delete course from db, delete folders for that course, delete content from db, and remove assigned instructors/students.
//delete course (sets isActive to 0, deletes rows from content tables and location table)
$success = $course->removeCourse($con);

//delete folders for the course
$dirPath = 'Content/' . $course->getDescription();
function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
 	return;
}
removeDirectory($dirPath);

if ($success) {
  $_SESSION['adminRemoveCourse'] = 1;
}
else {
  $_SESSION['adminRemoveCourse'] = 2;
}

header('Location: AdminPage.php');
?>
