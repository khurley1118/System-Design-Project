<?php
//connection
session_start();
include("connect.php");
include("StudentClass.php");
include("AdminClass.php");
include("InstructorClass.php");
include("utilClass.php");
include("TicketClass.php");

$directory = $_POST['directory'];
$fh = fopen('Content/' . $directory .'/News/news.txt','r');
$readFile = [];
while ($line = fgets($fh)) {
  array_push($readFile, $line);
}
fclose($fh);
echo json_encode($readFile);
?>
