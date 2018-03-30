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
$inInstructor = $_POST["instId"];
$message = "";

//if there is an instructor assigned
if(utilGetCourseInstructor($con, $currentCourse->getCourseCode()) != ""){
      //if option one is seleted, unassign the current instructor
      if($inInstructor == 1){
            //get the current instructor assigned to the course
            $x = utilGetCourseInstructor($con, $currentCourse->getCourseCode());
            if(utilUnassignInstructor($con, $x, $currentCourse->getCourseCode())){
              $message = "Instructor Unassigned";
            }
            else {
              $message = "Error unassigning Instructor";
            }
      }
      else{//else there is an instructor assigned, so update the assignned instructor
            if (utilUpdateCourseInstructor($con, $inInstructor, $currentCourse->getCourseCode())){
              $message = "Instructor updated";
            }
            else {
              $message = "Error updating Instructor";
            }
      }
}
else{//there is no instructor assigned
      if($inInstructor != 1){//if an instrctor is selected
            if(utilAddInstructorToCourse($con, $inInstructor, $currentCourse->getCourseCode())){
              $message = "Instructor assigned";
            }
            else {
              $message = "Error assigning Instructor";
            }
      }
}

//if the desctiption is changed then update it
if($currentCourse->getDescription() != $newCourse->getDescription()){
  if($newCourse->updateDescription($con)){
    //if message already has a value, then append to it
    if($message != ""){
      $message = $message . ", and description updated";
    }
    else {
      $message = "Description updated";
    }
  }
  else{
    //if message already has a value, then append to it
    if($message != ""){
      $message = $message . ", but error updating description";
    }
    else {
      $message = "Error updating description";
    }
  }
}

echo json_encode($message);

?>
