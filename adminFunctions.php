<?php
include('utilClass.php');
include('connect.php');
include('StudentClass.php');
include('InstructorClass.php');
session_start();
$id = $_SESSION['userID'];
$userType = $_SESSION['userType'];
$user = $_SESSION['CurrentUser'];

$courseId = $_POST["courseID"];
$courseCode = $_POST["courseCode"];
$courseDescription = $_POST["Description"];
?>
