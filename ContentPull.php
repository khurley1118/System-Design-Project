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

$path = $_POST['givenPath'];

//$path = "'Content\\\Test Course 1\\\Test Topic'";

$content = new Content();
$text[] = $content->getText($con, $path);
$video[] = $content->getVideo($con, $path);
$audio[] = $content->getAudio($con, $path);
$textOutput = [];
$audioOutput = [];
$videoOutput = [];

foreach($text as $t){
  foreach($t as $obj){
    $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
    $path = str_replace("'", "", $path);
    $obj->setFilePath($path . "\\" . $obj->getFileName());
    //echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
    array_push($textOutput, $obj->getDescription(), $obj->getFileName(), $obj->getUploadDate(), $obj->getFilePath());
  }
}
foreach($audio as $a){
  foreach($a as $obj){
    $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
    $path = str_replace("'", "", $path);
    $obj->setFilePath($path . "\\" . $obj->getFileName());
    //echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
    array_push($audioOutput, $obj->getDescription(), $obj->getFileName(), $obj->getUploadDate(), $obj->getFilePath());
  }
}
foreach($video as $v){
  foreach($v as $obj){
    $obj->setUploadDate(substr($obj->getUploadDate(), 0, 11));
    $path = str_replace("'", "", $path);
    $obj->setFilePath($path . "\\" . $obj->getFileName());
    //echo "Description: " . $obj->getDescription() . "&nbsp&nbsp&nbsp&nbsp&nbsp Date: " .  $obj->getUploadDate() . "&nbsp&nbsp&nbsp&nbsp&nbsp File Name: " . $obj->getFileName() . "&nbsp&nbsp&nbsp&nbsp&nbsp Path: " . $obj->getFilePath() . "<BR>";
    array_push($videoOutput, $obj->getDescription(), $obj->getFileName(), $obj->getUploadDate(), $obj->getFilePath());
  }
}
$ContentArray = [];
array_push($ContentArray, $textOutput, $audioOutput, $videoOutput);
echo json_encode($ContentArray);
?>
