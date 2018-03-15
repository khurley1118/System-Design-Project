<?php
session_start();
include('connect.php');

$type = $_SESSION['userType'];
$id = $_POST['id'];
$path = $_POST['path'];

if($type == "student"){
  if(utilSetStudentAvatar($con, $id, $path){
      echo
  }
}
else if($type == "faculty"){
  if(utilSetInstructorAvatar($con, $id, $path);
}
else {
  //something is wrong
}

$ticketInfo = array($fullName, $desc, $status);
echo json_encode($ticketInfo);


























?>
