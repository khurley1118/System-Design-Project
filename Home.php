<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
   include('connect.php');
   include('Header.php');
	 include('chatGUI.html');
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
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                       Course Info</a>
                                    </h4>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-pencil text-primary"></span><a href="">News</a>
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
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-font"></span><a href="">Text</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-volume-up"></span><a href="">Audio</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-camera"></span><a href="">Video</a>
                                             </td>
                                          </tr>
                                          <?php
                                            if ($type == "faculty"){
                                              echo "<tr>
                                                 <td>
                                                    <span class='glyphicon glyphicon-plus'></span><a href='javascript:addContent()'>Add Content</a>
                                                 </td>
                                              </tr>
                                              <tr>
                                                 <td>
                                                    <span class='glyphicon glyphicon-plus'></span><a href='javascript:addFolder()'>Add Topic</a>
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
                                                <span class="glyphicon glyphicon-sort"></span><a href="javascript:changePassword()">Change Password</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-comment"></span><a href="">Notifications</a> <span class="label label-info">5</span>
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
                                                <span class="glyphicon glyphicon-user"></span><a href="">View Tickets</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-tasks"></span><a href="">Create Ticket</a>
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
         </div><br>
       <!-- End Left Column -->
       </div>
       <!-- Right Column -->
       <div class="w3-twothird">
         <div id="outputContainer" class="w3-container w3-card w3-white w3-margin-bottom">
           <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo $courseName; ?></h2>
           <?php
           //Needs to be looped once object available / content available just dummy outputs
            $file1name = "Practice-Exam";
            $file1desc = "This text file is preparation for the exam coming next week. It is a practice Exam please complete this prior to the exam.";
            $file2name = "Lecture Recording";
            $file2desc = "This is a recording of the lecture that took place on Feb/16/2018 Please listen again if you are unsure.";
            $file3name = "Example Video";
            $file3desc = "This is an example video for some of the concepts that we went over in class yesterday. Please watch this if you have questions.";
              echo "<div class='w3-container'>";
              echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b> " . $file1name . "</b></h5>";
              echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
              echo "<br><br><p>" . $file1desc . "</p>";
              echo "<hr>";
              echo "</div>";

              echo "<div class='w3-container'>";
              echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-volume-up'></span><b> " . $file2name . "</b></h5>";
              echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
              echo "<br><br><p>" . $file2desc . "</p>";
              echo "<hr>";
              echo "</div>";

              echo "<div class='w3-container'>";
              echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-facetime-video'></span><b> " . $file3name . "</b></h5>";
              echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>Jan 2015";
              echo "<br><br><p>" . $file3desc . "</p>";
              echo "<hr>";
              echo "</div>";
           ?>
         </div>
       <!-- End Right Column -->
       </div>
     <!-- End Grid -->
     </div>
     <div id="AdmiralSnackbar">Password has been changed!</div>
     <!-- End Page Container -->
     <?php
      if (isset($_SESSION['passwordChng'])){
       if ($_SESSION['passwordChng'] == 1){
         $_SESSION['passwordChng'] = 0;
         echo "<script> myFunction(); </script>";
       }
     }
    ?>
   </div>
   </body>
</html>
