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
$currentCourse = GetCourseObject($con, $_POST['corId']);
$newCourse = new Course();
$newCourse->setCourseCode($_POST['corId']);
$newCourse->setDescription($_POST['corDesc']);
$inInstructor = $_POST["idNum"];
$message = "success";


if(utilGetCourseInstructor($con, $currentCourse->getCourseCode()) != null){
  if($inInstructor == 1){
    utilUnassignInstructor($con, $currentCourse->getCourseCode());

  }
  else{
    utilUpdateCourseInstructor($con, $currentCouse->getCourseCode());
  }

}
else{
  if($inInstructor != 1){
    utilAddInstructorToCourse($con, $inInstructor, $currentCourse->getCourseCode());
  }
}

$returnData = array($message);

//returns something like [name, description, status]
echo json_encode($returnData);

?>
