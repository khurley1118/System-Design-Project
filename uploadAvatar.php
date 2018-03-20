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
        if(strlen($picName) < 255){

               if($_FILES["avatarFile"]["type"] == "image/jpeg" || $_FILES["avatarFile"]["type"] == "image/png" || $_FILES["avatarFile"]["type"] == "image/gif"){
                 $filepath = "avatars/" . $_FILES["avatarFile"]["name"];
                 if($type == "student"){
                     if(utilSetStudentAvatar($con, $id, $filepath)){
                       move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                         $success = "Success";
                     }
                 }
                 else if($type == "faculty"){
                     if(utilSetInstructorAvatar($con, $id, $filepath)){
                       move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                       $success = "Success";
                     }
                 }
               }
               else{
                 $Success = "Unsupported file type";
               }
       }
       else{
         $success = "Name of file is to long, must be less that 255 characters long.";
       }
 }
 else{
   $Success = "File sizes is too large";
 }


 $_SESSION['avatar'] = "isset";
 $_SESSION['avatarMessage'] = $success;
header("location: Home.php");


?>


























?>
