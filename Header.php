<!DOCTYPE html>
<?php
require("utilClass.php");
require("StudentClass.php");
require("AdminClass.php");
require("InstructorClass.php");
require("courseClass.php");
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
          <a class="navbar-brand" href="index.php"><img id='logoImg'src="Resources/nbccLogo.png" height="30" width="170"/></a>
          <?php
            $id = $_SESSION['userID'];
            $type = $_SESSION['userType'];
            if ($type == "faculty" || $type == "student"){
              echo "<div id='avatar'>";
            if($type == "faculty") {
              $Avatar = utilGetAvatarInstructor($con, $id);
              echo "<div id='Avatar'><img id='AvatarImg' src='$Avatar' width='40' height='40'/></div>";
            } elseif ($type == "student"){
              $Avatar = utilGetAvatarStudent($con, $id);
              echo "<div id='Avatar'><img id='AvatarImg' src='$Avatar' width='40' height='40'/></div>";
            }
          }
            ?>
          </div>
          <div id="nameDisplay">
            <?php
              echo $first . " " . $last . " - " . ucfirst($type);
            ?>
          </div>

        </div>
      </div>

    </nav>
  </body>
</html>
