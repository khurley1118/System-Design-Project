<script src="js/Admin.js"></script>
<?php
session_start();
include('connect.php');
include('utilClass.php');


$type = $_SESSION['userType'];
$id = $_SESSION['userID'];
$success = "false";

//get form variables
$course = $_POST["mainDir"]; //title of course
$subDir = $_POST["subDir"]; //title of subfolder it's going into
$description = $_POST["fileTA"]; //description of the file

//get file info
$fileName = $_FILES["contentFile"]["name"];
$fileType =  $_FILES["contentFile"]["type"];
$fileTempName = $_FILES["contentFile"]["tmp_name"];
$filesize = $_FILES["contentFile"]["size"];
$filesizeMB = $filesize / 1024 / 1024;

//check that file is an accepted type and within the size limit
$allowedExts = array("mp3","mp4","avi","wma","fodt","txt","doc","docx","apt","rtf","docxml","text","wpd","docx","wps","readme","pdf","application/vnd.openxmlformats-officedocument.wordprocessingml.document");
$extension = pathinfo($fileName, PATHINFO_EXTENSION);

if ((($fileType == "video/mp4") //video
|| ($fileType == "video/avi")
|| ($fileType == "audio/mp3") //audio
|| ($fileType == "audio/wma")
|| ($fileType == "text/fodt") //text
|| ($fileType == "text/plain")
|| ($fileType == "text/doc")
|| ($fileType == "text/docx")
|| ($fileType == "text/apt")
|| ($fileType == "text/rtf")
|| ($fileType == "text/docxml")
|| ($fileType == "text/text")
|| ($fileType == "text/wpd")
|| ($fileType == "text/docx")
|| ($fileType == "text/wps")
|| ($fileType == "text/readme")
|| ($fileType == "text/pdf")
|| ($fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))

&& ($filesize < 500000000) //500 mb limit for now
&& in_array($extension, $allowedExts))

  {
    if ($_FILES["contentFile"]["error"] > 0) {
      echo "Return Code: " . $_FILES["contentFile"]["error"] . "<br />";
    }
    else { //no errors, proceed
      echo "Upload: " . $_FILES["contentFile"]["name"] . "<br />";
      echo "Type: " . $_FILES["contentFile"]["type"] . "<br />";
      echo "Size: " . ($_FILES["contentFile"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " . $_FILES["contentFile"]["tmp_name"] . "<br />";
      echo "mainDir: " . $course . "<br/>";
      echo "subDir: " . $subDir . "<br/>";
      echo "fileTA: " . $description . "<br/><br/>";

      if (file_exists("Content/" . $course . "/" . $asubDir . "/" . $fileName)) {
        echo $fileName . " already exists.";
      }
      else {
        move_uploaded_file($fileTempName,
        "Content/" . $course . "/" . $subDir . "/" . $fileName);
        echo "Stored in: " . "Content/" . $course . "/" . $subDir . "/" . $fileName;
      }
    }
  }
  else {
    echo "Invalid file";
  }

//below is Kyle's
//will return the file type if it's an accepted file type or false if it's not.
// function FileTypeChecker($fileType) {
//   if ($fileType == "image/jpeg") {
//     return "jpeg";
//   }
//   else if ($fileType == "image/png") {
//     return "png";
//   }
//   else if ($fileType == "image/gif") {
//     return "gif";
//   }
//   else if ($fileType == "") {
//
//   }
// }

//  if($filesize < 25000000){
//         if(strlen($fileName) < 255){
//
//                if($_FILES["avatarFile"]["type"] == "image/jpeg" || $_FILES["avatarFile"]["type"] == "image/png" || $_FILES["avatarFile"]["type"] == "image/gif"){
//                  $filepath = "avatars/" . $_FILES["avatarFile"]["name"];
//                  if($type == "student"){
//                      if(utilSetStudentAvatar($con, $id, $filepath)){
//                        move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
//                          $success = "Successfully Updated Avatar!";
//                      }
//                  }
//                  else if($type == "faculty"){
//                      if(utilSetInstructorAvatar($con, $id, $filepath)){
//                        move_uploaded_file($_FILES["avatarFile"]["tmp_name"], "avatars/" . $_FILES["avatarFile"]["name"]);
//                        $success = "Successfully Updated Avatar!";
//                      }
//                  }
//                }
//                else{
//                  $Success = "Unsupported file type";
//                }
//        }
//        else{
//          $success = "Name of file is to long, must be less that 255 characters long.";
//        }
//  }
//  else{
//    $Success = "File sizes is too large";
//  }
// //Cull unused from DB
// $studentAvs = DLgetStudentAvatars($con); //get all student paths
// $instructorAvs = DLgetinstructorAvatars($con); //get all instructor paths
// $fileList = [];
// $unusedAvatars = [];
// foreach (array_filter(glob('avatars/*'), 'is_file') as $file)
// {
//     //each file in avatar directory into an array
//     array_push($fileList, $file);
// }
// foreach($fileList as $file){
//   //if a file in the directory is not present in the student or instructor array, push to unused array
//   if (!in_array($file, $studentAvs) && !in_array($file, $instructorAvs)){
//     $file = substr($file, strpos($file, "/") + 1);
//     array_push($unusedAvatars, $file);
//   }
// }
// foreach($unusedAvatars as $u){
//   //delete any unused avatar
//   unlink('avatars/' . $u);
// }
// // end Cull
//  $_SESSION['avatar'] = "isset";
//  $_SESSION['avatarMessage'] = $success;
// header("location: Home.php");
?>
