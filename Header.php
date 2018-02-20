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
   if ($_SESSION['userType'] != "admin"){
   $courselist = $user->getCourses();
   }
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
      <link href="navbar-fixed-top.css" rel="stylesheet">
   </head>
   <body>
      <!-- Fixed navbar -->
      <nav id="nav" class="navbar navbar-default navbar-fixed-top">
         <div id="nav" class="container">
            <div id="nav" class="navbar-header">
               <a class="navbar-brand" href="index.php"><img src="Resources/nbccLogo.png" height="30" width="170"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="dropdown">
                     <?php
                        $name = $full;
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
                          echo "<li><a href='$course'>" . $course . " " . $courseName . "</a></li>";
                          $courseCounter++;
                        }
                        }
                        echo "</ul>"
                        ?>
                  </li>
               </ul>
            </div>
            <!--/.nav-collapse -->
         </div>
      </nav>
   </body>
</html>
