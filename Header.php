<!DOCTYPE html>
<?php
//session_start();
//include("connect.php");
include("DataLayer.php");
$id =	$_SESSION['userID'];
$first = DLgetStudentFirst($con, $id);
$last = DLgetStudentLast($con, $id);
$full = $first . " " . $last;
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
    <link href="css/style.css" rel="stylesheet">

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
                        $type = $_SESSION['userType'];
                        $sessionID = 1;
                        //placehold session id and name/type
                        if ($sessionID == 1){

                            echo "<li>
                            <li><div class='dropdown'>
                            <button class='btn btn-custom dropdown-toggle' type='button' data-toggle='dropdown'>Courses
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu'>";

														$courselist = DLgetStudentCourses($con,$id);
														$courseCounter = 0;
														//print_r($courselist);
													  foreach ($courselist as $course){
															echo "<li><a href='$course'>" . $course . "</a></li>";
															$courseCounter++;
														}
                              //
                              // "<li><a href='#'>Course 1</a></li>
                              // <li><a href='#'>Course 2</a></li>
                              // <li><a href='#'>Course 3</a></li>
                            echo "</ul>
                          </div>
                          </li>";
                        } else if ($sessionID == 2){
                            echo "<li><a href='Home.php'>Content</a></li>
                            <li><a href='Home.php'>News</a></li>
                            <li><a href='Home.php'>Contactd</a></li>
                            <li><a href='Home.php'>About</a></li>
                            <li><a href='Home.php'>News</a></li>
                            <li><a href='Home.php'>Contactd</a></li>
                            <li><a href='Home.php'>About</a></li>";
                        } else {
                            echo "<li><a href='Home.php'>Content</a></li>
                            <li><a href='Home.php'>News</a></li>
                            <li><a href='Home.php'>Contactd</a></li>
                            <li><a href='Home.php'>About</a></li>
                            <li><a href='Home.php'>News</a></li>
                            <li><a href='Home.php'>Contactd</a></li>
                            <li><a href='Home.php'>About</a></li>";
                        }
                echo "</ul>";
                ?>
                <div id ="ID">
                    <div id="Name">
                        <p><?php echo $name; ?></p>
                    </div>
                    <div id="Type">
                        <p><?php echo $type; ?><p>
                    </div>

                </div>
            </div>
          </div>
      </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
