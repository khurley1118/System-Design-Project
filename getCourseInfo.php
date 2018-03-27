<?php
include('utilClass.php');
include('connect.php');
include('courseClass.php');

$courseID = $_POST['idNum'];

$course = new Course();
$course = GetCourseObject($con, $courseID);
$instructor = utilGetCourseInstructor($con, $courseID);
$courseDesc = $course->getDescription();

$returnData = array($courseDesc, $instructor);

//returns something like [name, description, status]
echo json_encode($returnData);

?>
