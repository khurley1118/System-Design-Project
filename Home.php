<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
   include('connect.php');
   include('Header.php');

   include('Footer.php');
   //if user id is not set then user is not logged in and is redirected to index.
   if (!isset($_SESSION['userID']) || $_SESSION['userID'] == ""){
   	header("location: index.php");
   }
   // set local variables for use from session variables.
   $id = $_SESSION['userID'];
   $userType = $_SESSION['userType'];
   $user = $_SESSION['CurrentUser'];
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Tu-Pro Home</title>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
      <script src="js/Home.js"></script>
      <link rel="stylesheet" type="text/css" href="css/defaultHome.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/pageStylings.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="w3-light-grey">
      <!-- Page Container -->
      <div id="columnSetup" class="w3-content w3-margin-top" style="max-width:1400px;">
         <!-- The Grid -->
         <div id="columnSetup" class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
               <div class="w3-white w3-text-grey w3-card-4">
                  <br>
                  <div class="container">
                     <div class="row">
                        <div class="accordionMenu">
                           <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <span class='glyphicon glyphicon-list'></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                       Course Info</a>
                                    </h4>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-pencil text-primary"></span><a href="javascript:landingPage()">News</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-file text-info"></span><a href="">Calendar</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-flash text-success"></span><a href="">Due Dates</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                             </td>
                                          </tr>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-folder-close">
                                       </span>Content</a>
                                    </h4>
                                 </div>
                                 <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <table class="table">
                                         <!-- Needs to be dynamically populated from top level topics-->
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon glyphicon-pushpin"></span>
                                                <div class="dropdown btn-group">
                                                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                    JAVA <span class="caret"></span>
                                                  </a>
                                                  <ul class="dropdown-menu scrollable-menu" role="menu">
                                                    <li><a href="#">Test prep for test 1<br></a></li>
                                                    <li><a href="#">Recording of Tuesday's class<br></a></li>
                                                    <li><a href="#">Example Recursive function<br></a></li>
                                                  </ul>
                                                </div>
                                             </td>
                                          </tr>
                                          <!-- Keep em seperated -->
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon glyphicon-pushpin"></span>
                                                <div class="dropdown btn-group">
                                                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                    PHP <span class="caret"></span>
                                                  </a>
                                                  <ul class="dropdown-menu scrollable-menu" role="menu">
                                                    <li><a href="#">Test prep for test 1<br></a></li>
                                                    <li><a href="#">Recording of Tuesday's class<br></a></li>
                                                    <li><a href="#">Example Recursive function<br></a></li>
                                                  </ul>
                                                </div>
                                             </td>
                                          </tr>
                                          <!-- Keep em seperated -->
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon glyphicon-pushpin"></span>
                                                <div class="dropdown btn-group">
                                                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                    C# <span class="caret"></span>
                                                  </a>
                                                  <ul class="dropdown-menu scrollable-menu" role="menu">
                                                    <li><a href="#">Test prep for test 1<br></a></li>
                                                    <li><a href="#">Recording of Tuesday's class<br></a></li>
                                                    <li><a href="#">Example Recursive function<br></a></li>
                                                  </ul>
                                                </div>
                                             </td>
                                          </tr>
                                          <!-- Keep em seperated -->
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon glyphicon-pushpin"></span>
                                                <div class="dropdown btn-group">
                                                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                    SQL <span class="caret"></span>
                                                  </a>
                                                  <ul class="dropdown-menu scrollable-menu" role="menu">
                                                    <li><a href="#">Test prep for test 1<br></a></li>
                                                    <li><a href="#">Recording of Tuesday's class<br></a></li>
                                                    <li><a href="#">Example Recursive function<br></a></li>
                                                  </ul>
                                                </div>
                                             </td>
                                          </tr>
                                          <?php
                                             if ($type == "faculty"){
                                               echo "<tr>
                                                  <td>
                                                     <span class='glyphicon glyphicon-plus'></span><a href='javascript:addContent()'>Add Content</a>
                                                  </td>
                                               </tr>";
                                             }
                                             ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                                       </span>Account</a>
                                    </h4>
                                 </div>
                                 <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span id="changePasswordBtn" class="glyphicon glyphicon-sort"></span><a href="javascript:changePassword()">Change Password</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span id="changePasswordBtn" class="glyphicon glyphicon-picture"></span><a href="javascript:uploadAvatar()">Edit Avatar</a>
                                             </td>
                                          </tr>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                                       </span>Tickets</a>
                                    </h4>
                                 </div>
                                 <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-tasks"></span><a href="javascript:createTicket()">Create Ticket</a>
                                             </td>
                                          </tr>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <!-- End Left Column -->
            </div>
            <!-- Right Column -->
            <div class="w3-twothird">
               <div id="outputContainer" class="w3-container w3-card w3-white w3-margin-bottom">
                  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php if (isset($courseName)) {echo $courseName;} else { echo 'Instructor';} ?></h2>
                  <div id=swapDiv>
                     <div class="row showDiv" id="landingPage">
                        <?php
                           //Needs to be looped once object available / content available just dummy outputs
                           $file1name = "Practice-Exam";
                           $file1desc = "This text file is preparation for the exam coming next week. It is a practice Exam please complete this prior to the exam.";
                           $file2name = "Lecture Recording";
                           $file2desc = "This is a recording of the lecture that took place on Feb/16/2018 Please listen again if you are unsure.";
                           $file3name = "Example Video";
                           $file3desc = "This is an example video for some of the concepts that we went over in class yesterday. Please watch this if you have questions.";
                             echo "<div class='w3-container' id='we-shrink'>";
                             echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b> " . $file1name . "</b></h5>";
                             echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
                             echo "<br><br><p>" . $file1desc . "</p>";
                             echo "<hr>";
                             echo "</div>";

                             echo "<div class='w3-container' id='we-shrink'>";
                             echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b> " . $file1name . "</b></h5>";
                             echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
                             echo "<br><br><p>" . $file1desc . "</p>";
                             echo "<hr>";
                             echo "</div>";

                             echo "<div class='w3-container' id='we-shrink'>";
                             echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b> " . $file1name . "</b></h5>";
                             echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
                             echo "<br><br><p>" . $file1desc . "</p>";
                             echo "<hr>";
                             echo "</div>";

                             echo "<div class='w3-container' id='we-shrink'>";
                             echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b> " . $file1name . "</b></h5>";
                             echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
                             echo "<br><br><p>" . $file1desc . "</p>";
                             echo "<hr>";
                             echo "</div>";

                             echo "<div class='w3-container' id='we-shrink'>";
                             echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-volume-up'></span><b> " . $file2name . "</b></h5>";
                             echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
                             echo "<br><br><p>" . $file2desc . "</p>";
                             echo "<hr>";
                             echo "</div>";
                           ?>
                     </div>
                     <!-- Keep em seperated -->
                     <div class="row hideDiv" id="addContent">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="" method="">
                                       <center>
                                          <h2>Add a File</h2>
                                       </center>
                                       <input type="file" class="form-control" placeholder="Username" required autofocus>
                                       <select class="form-control">
                                          <option value="CSS">CSS</option>
                                          <option value="JAVA">JAVA</option>
                                          <option value="PYTHON">PYTHON NO BUNS HUN</option>
                                       </select>
                                       <textarea type="text" class="form-control" placeholder="Description" required></textarea>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                    <div id="tabs" data-tabs="tabs">
                                       <p class="text-center"><a href="#register" data-toggle="tab">Add a Topic</a></p>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="register">
                                    <form class="form-signin" action="" method="">
                                       <center>
                                          <h2>Add a Topic</h2>
                                       </center>
                                       <select class="form-control">
                                          <option>Select a Parent Topic</option>
                                          <option value="CSS">CSS</option>
                                          <option value="JAVA">JAVA</option>
                                          <option value="PYTHON">PYTHON NO BUNS HUN</option>
                                       </select>
                                       <input type="text" class="form-control" placeholder="Topic Name" required>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                    <div id="tabs" data-tabs="tabs">
                                       <p class="text-center"><a href="#login" data-toggle="tab">Add a File</a></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Keep em seperated -->
                     <div class="row hideDiv" id="uploadAvatar">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="" method="">
                                       <center>
                                         <img id="avatarPreview" height="150" width="200" src="/Resources/TuPro2.png"/>
                                          <h2>Upload an Avatar</h2>
                                       </center>
                                       <input type="file" class="form-control" placeholder="Username" required autofocus>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Keep em seperated -->
                     <div class="row hideDiv" id="changePassword">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="changePassword.php" method="POST">
                                        <center>
                                           <h2>Change Password</h2>
                                        </center>
                                       <input type="password" class="form-control" placeholder="Current Password" id="oldPW" name="oldPW" required autofocus>
                                       <input type="password" class="form-control" placeholder="New Password"id="newPW" name="newPW" required>
                                       <input type="password" class="form-control" placeholder="Confirm Password"id="confPW" name="confPW" required>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Keep em seperated -->
                     <div class="row hideDiv" id="createTicket">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="javascript:insTicket(textInput.value)" method="">
                                      <center>
                                        <h2>Create Ticket</h2>
                                      </center>
                                      <textarea type="text" maxlength="990" id="textInput" class="form-control" placeholder="Ticket Contents" required rows="10"></textarea>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- End Right Column -->
               </div>
            </div>
         </div>
       <!-- End Right Column -->
       </div>
     <!-- End Grid -->
     </div>
     <div id="AdmiralSnackbar"></div>
     <!-- End Page Container -->
     <?php
      if (isset($_SESSION['passwordChng'])){
       if ($_SESSION['passwordChng'] == 1){
			$_SESSION['passwordChng'] = 0;
			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Password has been changed!';</script>";
			echo "<script> myFunction(); </script>";
       }
	   else if ($_SESSION['passwordChng'] == 2) {
		    $_SESSION['passwordChng'] = 0;
			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error, confirm password does not match!';</script>";
			echo "<script> myFunction(); </script>";
	   }
	   else if ($_SESSION['passwordChng'] == 3) {
		    $_SESSION['passwordChng'] = 0;
			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error, password is incorrect!';</script>";
			echo "<script> myFunction(); </script>";
	   }
	   else if ($_SESSION['passwordChng'] == 4) {
		    $_SESSION['passwordChng'] = 0;
			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error, password did not update successfully!';</script>";
			echo "<script> myFunction(); </script>";
	   }
     }
    ?>
   </div>
   <?php include('ChatGUI.php'); ?>
   </body>
</html>
