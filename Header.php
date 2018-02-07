<!DOCTYPE html>
<?php
require("StudentClass.php");
require("AdminClass.php");
require("InstructorClass.php");
require("utilClass.php");
session_start();

$type = $_SESSION['userType'];
$id =	$_SESSION['userID'];
$user = $_SESSION['CurrentUser'];
$first = $user->getFirstName();
$last = $user->getLastName();
$full = $first . " " . $last;
$courselist = $user->getCourses();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">

    <title>Tu-Pro Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/headerStyle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
      <div id="HeaderBack">
          <img src="Resources/Header.png" alt="logo" height="150px" width="100%">
          <div id="HeaderContent">
             <div id="homeButton">
                 <a href="Home.php"><input type="image" src="Resources/nbccLogo.png" /></a>
             </div>
             <div id ="daBrand">
                 <img src="Resources/logoWhite.png" alt="logo" height="90px" width="180px">
             </div>

            <div id="headerContent">
                <?php

                echo "<ul id='navBar'>";
                        $name = $full;
                        //placehold session id and name/type
                        if ($type == "student"){
														//$courselist = DLgetStudentCourses($con,$id);
                            echo "<li>
                            <li><div class='dropdown'>
                            <button class='btn btn-custom dropdown-toggle' type='button' data-toggle='dropdown'>Courses
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu'>";
														// if user isn't enrolled in anycourses display no courses, else print to a dropdown list
														if (!isset($courselist)){
															echo "<li><a href='#'>No courses</a></li>";
														} else {

														$courseCounter = 0;
													  foreach ($courselist as $course){
															$courseName = utilCourseName($con, $course);
															echo "<script> alert('". $course . "   " . $courseName ."')</script>";
															echo "<li><a href='$course'>" . $course . " " . $courseName . "</a></li>";
															$courseCounter++;
														}
													}
                            echo "</ul>
                          </div>";

                        } else if ($type == "faculty"){
														//$courselist = DLgetInstructorCourses($con, $id);
														echo "
														<li>
															<li>
																<div class='dropdown'>
																	<button class='btn btn-custom dropdown-toggle' type='button' data-toggle='dropdown'>Courses
																	<span class='caret'></span></button> </li></li>
														<ul class='dropdown-menu'>";
														//if user is enrolled in courses print them/print no courses if not
														if (!isset($courselist)){
															echo "<li><a href='#'>No courses</a></li>";
														}
														else {
															$courseCounter = 0;
															foreach ($courselist as $course){
																$courseName = utilCourseName($con, $course);
																echo "<li><a href='$course'>" . $course . " " . $courseName . "</a></li>";
																$courseCounter++;
															}
														}
															echo "</ul>
															</div>";

                        } else {

                        }
                echo "</ul>";
                ?>
                <div id ="ID">
                  	<?php
											echo "<table>";
											echo "<tr><td>$name</td></tr>";
                     	echo "<tr><td>" . strtoupper($type) . "</td></tr>";
											echo "</table>";
											?>
                </div>
            </div>
          </div>
      </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
