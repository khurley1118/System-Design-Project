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
                     <div id="accordionMenu">
                        <div class="panel-group" id="accordion">
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Group 1</a>
                                 </h4>
                              </div>
                              <div id="collapse1" class="panel-collapse collapse in">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Group 2</a>
                                 </h4>
                              </div>
                              <div id="collapse2" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Group 3</a>
                                 </h4>
                              </div>
                              <div id="collapse3" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Group 4</a>
                                 </h4>
                              </div>
                              <div id="collapse4" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Group 5</a>
                                 </h4>
                              </div>
                              <div id="collapse5" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Group 6</a>
                                 </h4>
                              </div>
                              <div id="collapse6" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Group 7</a>
                                 </h4>
                              </div>
                              <div id="collapse7" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
                              </div>
                           </div>
                           <!-- Item start -->
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Group 8</a>
                                 </h4>
                              </div>
                              <div id="collapse8" class="panel-collapse collapse">
                                 <div class="panel-body">Lorem</div>
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
               <div id="mainBarContent"></div>
            </div>
         </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
   </body>
</html>
