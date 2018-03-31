<?php
//connection
require("ContentClass.php");
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");

//$path = $_POST['givenPath'];

$path = "'Content\\Test Course 2\\Test Topic'";

$content = new Content();
$t = $content->getText($con, $path);
foreach($t as $a){
  echo $a;
}

// $text[] = $content->getText($con, $path);
// $video[] = $content->getVideo($con, $path);
// $audio[] = $content->getAudio($con, $path);

// foreach($text as $t){
//   foreach($t as $obj){
//     $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
//     $path = str_replace("'", "", $path);
//     $obj->setFilePath($path . "\\" . $obj->getFileName());
//     echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
//   }
// }
// foreach($audio as $a){
//   foreach($a as $obj){
//     $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
//     $path = str_replace("'", "", $path);
//     $obj->setFilePath($path . "\\" . $obj->getFileName());
//     echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
//   }
// }
// foreach($video as $v){
//   foreach($v as $obj){
//     $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
//     $path = str_replace("'", "", $path);
//     $obj->setFilePath($path . "\\" );
//     echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
//   }
// }
// $ContentArray = [];
// array_push($ContentArray, $text, $audio, $video);
// echo json_encode($ContentArray);
?>
