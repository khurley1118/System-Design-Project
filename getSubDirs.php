<?php
//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");

$id = $_POST['directory'];
$directoryArray = array();
$directories = glob("Content/" . $id . "/*");
foreach($directories as $folder){
  $folder = substr($folder, strpos($folder, '/', strpos($folder, '/')+3));
  $folder = str_replace("/", "", $folder);
  array_push($directoryArray, $folder);
}
echo json_encode($directoryArray);
?>
