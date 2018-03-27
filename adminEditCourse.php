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
$message = "";

//$message = $currentCourse->getCourseCode() . " " . $currentCourse->getDescription() . " " . $inInstructor;
$message = utilGetCourseInstructor($con, $currentCourse->getCourseCode());

if(utilGetCourseInstructor($con, $currentCourse->getCourseCode()) != ""){
  if($inInstructor == 1){
    if(utilUnassignInstructor($con, $currentCourse->getCourseCode())){
      $message = "Instructor Unassigned";
    }
    else {
      $mssage = "Error assigning Instructor";
    }
  }
  else{
    if (utilUpdateCourseInstructor($con, $currentCouse->getCourseCode())){
      $message = "Instructor updated";
    }
    else {
      $mssage = "Error assigning Instructor";
    }
  }
}
else{
  if($inInstructor != 1){
    if(utilAddInstructorToCourse($con, $inInstructor, $currentCourse->getCourseCode())){
      $message = "Instructor assigned";
    }
    else {
      $mssage = "Error assigning Instructor";
    }
  }
}

if($currentCourse->getDescription() != $newCourse->getDescription()){
  if($urrentCourse->updateDescription($con)){
    if($message != ""){
      $message += ", and ";
    }
    $message += "Description updated";
  }
  else{
    $message += "Error updating Description";
  }
}

$returnData = array($message);

//returns something like [name, description, status]
echo json_encode($returnData);

?>
