<script src="js/Admin.js"></script>
<?php
session_start();
include('connect.php');
include('utilClass.php');


$type = $_SESSION['userType'];
$id = $_SESSION['userID'];
$success = "false"; //holds response message


 $picName = $_FILES["avatarFile"]["name"];
 $filesize = $_FILES["avatarFile"]["size"];


 if($filesize < 25000000){ //file size must be < 25Mb
        if(strlen($picName) < 255){ //name of file must be < 255

                //checks if file is a picture
               if($_FILES["avatarFile"]["type"] == "image/jpeg" || $_FILES["avatarFile"]["type"] == "image/png" || $_FILES["avatarFile"]["type"] == "image/gif"){
                 $filepath = "avatars\\\\" . $_FILES["avatarFile"]["name"];///create the correct filepath

                 //upload the picture to the corrent table in the database
                 if($type == "student"){
                    //try to insert the pic into the db, if successful, upload the pic
                     if(utilSetStudentAvatar($con, $id, $filepath)){
                       move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                         $success = "Successfully Updated Avatar!";
                     }
                 }
                 else if($type == "faculty"){
                   //try to insert the pic into the db, if successful, upload the pic
                     if(utilSetInstructorAvatar($con, $id, $filepath)){
                       move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
                       $success = "Successfully Updated Avatar!";
                     }
                 }
               }
               else{
                 $success = "Unsupported file type";
               }
       }
       else{
         $success = "Name of file is to long, must be less that 255 characters long.";
       }
 }
 else{
   $success = "File sizes is too large";
 }
//Cull unused from DB
$studentAvs = DLgetStudentAvatars($con); //get all student paths
$instructorAvs = DLgetinstructorAvatars($con); //get all instructor paths
$fileList = [];
$unusedAvatars = [];
foreach (array_filter(glob('avatars/*'), 'is_file') as $file)
{
    //each file in avatar directory into an array
    array_push($fileList, $file);
}
foreach($fileList as $file){
  //if a file in the directory is not present in the student or instructor array, push to unused array
  if (!in_array($file, $studentAvs) && !in_array($file, $instructorAvs)){
    $file = substr($file, strpos($file, "/") + 1);
    array_push($unusedAvatars, $file);
  }
}
foreach($unusedAvatars as $u){
  //delete any unused avatar
  unlink('avatars/' . $u);
}
// end Cull
 $_SESSION['avatar'] = "isset";
 $_SESSION['avatarMessage'] = $success;
header("location: Home.php");
?>


























?>
