<script src="js/Admin.js"></script>
<?php
session_start();
include('connect.php');
include('utilClass.php');
include('courseClass.php');
include('ContentClass.php');

$type = $_SESSION['userType'];
$id = $_SESSION['userID'];
$success = "false";

//to begin, need to check if post variables are set, they won't bet set if file is larger than
//the server's allowed max size
if (isset($_FILES["contentFile"])) { //proceed
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
  $allowedExts = array("mp3","mp4","avi","wma","fodt","txt","doc","docx","rtf","text","wpd","docx","pdf");
  $extension = pathinfo($fileName, PATHINFO_EXTENSION);

  $fileValid = false;
  $insertSuccess = false;
  if ($filesize < 500000000 && in_array($extension, $allowedExts)) { //file is less than max of 500mb and is an allowed file extension
    //get course object for insert to content tables
    $courseObject = GetCourseObjectWName($con,$course);

    //below is for testing, useful to try different file types
    // echo "Upload: " . $_FILES["contentFile"]["name"] . "<br/>";
    // echo "Type: " . $_FILES["contentFile"]["type"] . "<br/>";
    // echo "Size: " . ($_FILES["contentFile"]["size"] / 1024) . " Kb<br/>";
    // echo "Temp file: " . $_FILES["contentFile"]["tmp_name"] . "<br/>";
    // echo "mainDir: " . $course . "<br/>";
    // echo "subDir: " . $subDir . "<br/>";
    // echo "fileTA: " . $description . "<br/><br/>";

    if ($subDir == "News") { //news folder, if it's a text file need to replace existing news file
      if ($fileType == "text/plain" || $fileType == "text/doc" || $fileType == "text/docx"
      || $fileType == "text/rtf" || $fileType == "text/text" || $fileType == "text/wpd"
      || $fileType == "application/pdf" || $fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
        //it's a text file, replace existing news file with this
        move_uploaded_file($fileTempName,
        "Content/" . $course . "/" . $subDir . "/news.txt");
        //stored successfully
        $_SESSION['uploadContent'] = 'Success!';
      }
      else {
        //it's not a text file, give error message
        $_SESSION['uploadContent'] = 'Sorry, news must be a text file.';
      }
    }
    else {
      //not News, proceed like normal
      if ($fileType == "video/mp4" || $fileType == "video/avi") { //video
        $fileValid = true;
        //create video object
        $video = new Content();
        $video->setDescription($description);
        $video->setUploadDate(date('Y-m-d H:i:s')); //now
        $video->setFileName($fileName);
        $video->setFilePath("Content/" . $course . "/" . $subDir); //looks like path doesn't need file name as we currently have it
        //insert video object
        $insertSuccess = $video->insertContent($con,"video",$courseObject->getCourseCode());
      }
      else if ($fileType == "audio/mpeg" || $fileType == "audio/wma" || $fileType == "audio/mp3") { //audio
        $fileValid = true;
        //create audio object
        $audio = new Content();
        $audio->setDescription($description);
        $audio->setUploadDate(date('Y-m-d H:i:s')); //now
        $audio->setFileName($fileName);
        $audio->setFilePath("Content/" . $course . "/" . $subDir); //looks like path doesn't need file name as we currently have it
        //insert audio object
        $insertSuccess = $audio->insertContent($con,"audio",$courseObject->getCourseCode());
      }
      else if ($fileType == "text/plain" || $fileType == "text/doc" || $fileType == "text/docx"
      || $fileType == "text/rtf" || $fileType == "text/text" || $fileType == "text/wpd"
      || $fileType == "application/pdf" || $fileType == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") { //text
        $fileValid = true;
        //create text object
        $text = new Content();
        $text->setDescription($description);
        $text->setUploadDate(date('Y-m-d H:i:s')); //now
        $text->setFileName($fileName);
        $text->setFilePath("Content/" . $course . "/" . $subDir); //looks like path doesn't need file name as we currently have it
        //insert text object
        $insertSuccess = $text->insertContent($con,"text",$courseObject->getCourseCode());
      }

      //check if file was valid, if so put file in folder
      if ($fileValid && $insertSuccess) { //file was valid, so proceed, put file in appropriate folder
        if (file_exists("Content/" . $course . "/" . $subDir . "/" . $fileName)) {
          //file already exists
          $_SESSION['uploadContent'] = 'A file with that name already exists.';
        }
        else {
          move_uploaded_file($fileTempName,
          "Content/" . $course . "/" . $subDir . "/" . $fileName);
          //stored successfully
          $_SESSION['uploadContent'] = 'Success!';
        }
      }
      else {
        //error inserting file
        $_SESSION['uploadContent'] = 'Error, insert not successful.';
      }
    }
  }
  else {
    //invalid file
    $_SESSION['uploadContent'] = 'Error, file type was invalid.';
  }
}
else { //error, file too large
  $_SESSION['uploadContent'] = 'Error, file was too large.';
}

header("location: Home.php");
?>
