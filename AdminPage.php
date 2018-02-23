<!DOCTYPE html>
<script src="AdminPanel.js"></script>
<?php
   include('connect.php');
   include('Header.php');
   include('Footer.php');
   if (isset($_SESSION['userType'])) {
       if ($_SESSION['userType'] != "admin") {
           header("location: index.php");
       }
   }
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Tu-Pro Admin Panel</title>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
      <script src="js/Admin.js"></script>
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
                                       <span class='glyphicon glyphicon-list'></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Courses</a>
                                    </h4>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-plus"></span><a href="javascript:addCourse()">Add Course</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-wrench"></span><a href="javascript:editCourse()">Edit Course</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-remove"></span><a href="javascript:removeCourse()">Remove Course</a>
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
                                       </span>Accounts</a>
                                    </h4>
                                 </div>
                                 <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-plus"></span><a href="javascript:addAccount()">Add Account</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-wrench"></span><a href="javascript:editAccount()">Edit Account</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-repeat"></span><a href="javascript:resetPassword()">Reset Password</a>
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
                                       </span>Tickets</a>
                                    </h4>
                                 </div>
                                 <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span id="changePasswordBtn" class="glyphicon glyphicon-zoom-in"></span><a href="javascript:viewTickets()">View Tickets</a>
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
                  <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php if (isset($courseName)) {echo $courseName;} else { echo 'Admin';} ?></h2>
                  <div id=swapDiv>
                     <div class="row showDiv" id="landingPage">
                        <?php
                           echo "<div class='w3-container' id='we-shrink'>";
                           echo "<h5 class='w3-opacity'><span class='glyphicon glyphicon-pencil'></span><b>Welcome to the Admin Panel</b></h5>";
                           echo "<h6 class='w3-text-teal'><i class='fa fa-calendar fa-fw w3-margin-right'></i>We got fun and games";
                           echo "<br><br><p>We got everything you want honey, we know the names
                                 We are the people that can find whatever you may need
                                 If you got the money, honey we got your disease</p><center><img height='150'src='Resources/honey.jpg'</center>";
                           echo "<hr>";
                           echo "</div>";
                           ?>
                     </div>
                     <!-- addCourse -->
                     <div class="row hideDiv" id="addCourse">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="" method="">
                                       <center>
                                          <h2>Add Course</h2>
                                       </center>
                                       <input type="text" class="form-control" placeholder="Course Code" required autofocus>
                                       <input type="text" class="form-control" placeholder="Description" required>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- editCourse -->
                     <div class="row hideDiv" id="editCourse">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                   <form class="form-signin" action="" method="">
                                      <center>
                                         <h2>Edit Course</h2>
                                      </center>
                                      <input type="text" class="form-control" placeholder="Course Code" required autofocus>
                                      <input type="text" class="form-control" placeholder="Description" required>
                                      <select class="form-control">
                                         <option value="CSS">Bruce Banner McClary</option>
                                         <option value="JAVA">Paul TypeOThing Richard</option>
                                         <option value="PYTHON">Karen TheMom Campbell</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- removeCourse -->
                     <div class="row hideDiv" id="removeCourse">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                   <form class="form-signin" action="" method="">
                                      <center>
                                         <h2>Remove Course</h2>
                                      </center>
                                      <select class="form-control">
                                         <option value="AnyNickCourse">REEE101 How to be Angry</option>
                                         <option value="JAVA">JAVA101 JAAAAVA</option>
                                         <option value="SQL">TABL101 the table strikes back</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- addAccount -->
                     <div class="row hideDiv" id="addAccount">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                   <form class="form-signin" action="" method="">
                                      <center>
                                         <h2>Add Account</h2>
                                      </center>
                                      <input type="text" class="form-control" placeholder="Account ID" required autofocus>
                                      <input type="text" class="form-control" placeholder="First Name" required>
                                      <input type="text" class="form-control" placeholder="Last Name" required>
                                      <input type="password" class="form-control" placeholder="Password" required>
                                      <input type="password" class="form-control" placeholder="Confirm Password" required>
                                      <select class="form-control">
                                         <option value="1">Student</option>
                                         <option value="2">Instructor</option>
                                         <option value="3">Admin</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- editAccount -->
                     <div class="row hideDiv" id="editAccount">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                   <form class="form-signin" action="" method="">
                                      <center>
                                         <h2>Edit Account</h2>
                                      </center>
                                      <input type="text" class="form-control" placeholder="First Name" required>
                                      <input type="text" class="form-control" placeholder="Last Name" required>
                                      <select class="form-control">
                                         <option value="1">Student</option>
                                         <option value="2">Instructor</option>
                                         <option value="3">Admin</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- resetPassword -->
                     <div class="row hideDiv" id="resetPassword">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                   <form class="form-signin" action="" method="">
                                      <center>
                                         <h2>Reset Password</h2>
                                      </center>
                                      <input type="text" class="form-control" placeholder="Account ID" required autofocus>
                                      <input type="password" class="form-control" placeholder="Password" required>
                                      <input type="password" class="form-control" placeholder="Confirm Password" required>
                                      <select class="form-control">
                                         <option value="1">Student</option>
                                         <option value="2">Instructor</option>
                                         <option value="3">Admin</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- viewTickets -->
                     <div class="row hideDiv" id="viewTickets">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="changePassword.php" method="">
                                       <center>
                                          <h2>Change Password</h2>
                                       </center>
                                       <input type="password" class="form-control" placeholder="Current Password" id="oldPW" required autofocus>
                                       <input type="password" class="form-control" placeholder="New Password"id="newPW" required>
                                       <input type="password" class="form-control" placeholder="Confirm Password"id="confPW" required>
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
      <div id="AdmiralSnackbar">Password has been changed!</div>
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
         <?php
          if (isset($_SESSION['insertCourse'])){
           if ($_SESSION['insertCourse'] == 1){
    			$_SESSION['insertCourse'] = 0;
    			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Course has been inserted!';</script>";
    			echo "<script> myFunction(); </script>";
           }
    	   else if ($_SESSION['insertCourse'] == 2) {
    		    $_SESSION['insertCourse'] = 0;
    			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Course did not insert successfully.';</script>";
    			echo "<script> myFunction(); </script>";
    	   }
         }
        ?>
      </div>
   </body>
</html>
