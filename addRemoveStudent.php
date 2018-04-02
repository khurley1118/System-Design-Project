<?php
include('utilClass.php');
include('connect.php');

//get inputs from edit course form
$idNum = $_POST['id'];
$option = $_POST['malone'];
$CourseId = $_POST['corId'];
$message = "";
$isValid = false;

if($idNum != ""){
  if($CourseId != "1"){
        $allIds = utilGetAllStudentIDs($con);

        foreach ($allIds as $stuID){
          if ($idNum == $stuID['studentId']){
            $isValid = true;
          }
        }

        if($isValid){
          if($option == "add"){
            if(utilAddStudentToCourse($con, $idNum, $CourseId)){
              $message = "Student Added";
            }
            else{
              $message = "Unable to add student";
            }
          }
          else{
            if(utilRemoveStudentFromCourse($con, $idNum, $CourseId)){
              $message = "Student Removed from course";
            }
            else{
              $message = "Unable to remove student from course";
            }
          }
        }
        else{
          $message = "Student ID not found";
        }
    }
    else{
      $message = "Please Select a course";
  }
}
else{
  $message = "Please enter a student ID";
}


echo json_encode($message);

?>
