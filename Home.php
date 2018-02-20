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
      <meta name="viewport" content="width=device-width, initial-scale=0">
      <title>Tu-Pro Home</title>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/scripts.js"></script>
      <link rel="stylesheet" type="text/css" href="css/defaultHome.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div id="pageContent">
         <div id="flexBox">
            <div id="sideBar">
               <div id="titleBar">
                  <div id="titleText">
                     <h3>Toolbar</h3>
                  </div>
               </div>
               <div id="sideBarContent">
                  <div class="container">
                     <div class="row">
                        <div class="accordionMenu">
                           <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-th">
                                       </span>Course Info</a>
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
                                                <span class="glyphicon glyphicon-sort"></span><a href="ChangePassForm.php">Change Password</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-comment"></span><a href="">Notifications</a> <span class="label label-info">5</span>
                                             </td>
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
               </div>
            </div>
            <div id="mainBar">
               <div id="titleBar">
                  <div id="titleText">
                     <h3>Course Information</h3>
                  </div>
               </div>
               <div id="mainBarContent">
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
