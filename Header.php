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

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav id="nav" class="navbar navbar-default navbar-fixed-top">
      <div id="nav" class="container">
        <div id="nav" class="navbar-header">
          <button id="nav" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
