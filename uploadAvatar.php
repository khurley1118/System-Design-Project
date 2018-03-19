<script src="js/Admin.js"></script>
<?php
session_start();
include('connect.php');
include('utilClass.php');


$type = $_SESSION['userType'];
$id = $_SESSION['userID'];
$success = "false";

//need to make img type validation and reformat the success message
 $picName = $_FILES["avatarFile"]["name"];
 $picType =  $_FILES["avatarFile"]["type"];
 $picTempName = $_FILES["avatarFile"]["tmp_name"];
 $filesize = $_FILES["avatarFile"]["size"];
 $filesizeMB = $filesize / 1024 / 1024;

 if($filesize < 25000000){

         if($_FILES["avatarFile"]["type"] == "image/jpeg" || $_FILES["avatarFile"]["type"] == "image/png" || $_FILES["avatarFile"]["type"] == "image/gif"){
           $filepath = "avatars/" . $_FILES["avatarFile"]["name"];
           if($type == "student"){
               if(utilSetStudentAvatar($con, $id, $filepath)){
                 move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                   $success = "true";
               }
           }
           else if($type == "faculty"){
               if(utilSetInstructorAvatar($con, $id, $filepath)){
                 move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                 $success = "true";
               }
           }
         }
         else{
           $Success = "Unsupported file type";
         }
 }
 else{
   $Success = "File sizes is too large";
 }
 echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = '" . $Success . "';" .
                      "document.getElementById('avatarFile').value = \"\";</script>";

 $_SESSION['avatar'] = "isset";
header("location: Home.php");


?>


























?>
