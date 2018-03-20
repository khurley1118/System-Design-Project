<!DOCTYPE html>
<?php
require("utilClass.php");
require("StudentClass.php");
require("AdminClass.php");
require("InstructorClass.php");
session_start();

$type = $_SESSION['userType'];
$id =	$_SESSION['userID'];
$user = $_SESSION['CurrentUser'];
$first = $user->getFirstName();
$last = $user->getLastName();
$_SESSION['lastName'] = $last;
$_SESSION['firstName'] = $first;
$full = $first . " " . $last;
if ($_SESSION['userType'] != "admin"){
$courselist = $user->getCourses();
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu-Pro Home</title>
    <script src="js/Home.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/headerStyle.css">

  </head>

  <body>
    <!-- Fixed navbar -->
    <nav id="nav" class="navbar navbar-default navbar-fixed-top">
      <div id="nav" class="container">
        <div id="nav" class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="Resources/nbccLogo.png" height="30" width="170"/></a>
          <div id="nameDisplay">
            <?php
              echo $first . " " . $last . " - " . ucfirst($type);
            ?>
          </div>
          <div id='avatar'>
            <?php
            $id = $_SESSION['userID'];
            if($_SESSION['userType'] == "faculty") {
              $Avatar = utilGetAvatarInstructor($con, $id);
            } else {
              $Avatar = utilGetAvatarStudent($con, $id);
            }
            echo "<img src='$Avatar'/>"
            ?>
          </div>
        </div>
      </div>

    </nav>
  </body>
</html>
