<?php
include('utilClass.php');
include('connect.php');

//get inputs from edit course form
$userId = $_POST['corId'];
$userType- = $_POST['corDesc'];
$message = "";
$isValid = false;

$allIds = utilGetAllStudentIDs($con);

foreach ($studentIDnums as $stuID){
  if ($userId == $stuID){
    $isValid == true;
  }
}

if(isValid){

}


echo json_encode($message);

?>
