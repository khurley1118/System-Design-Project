<!DOCTYPE html>
<script src="js/AdminPanel.js"></script>
<?php
   include('connect.php');
   include('Header.php');
   include('Footer.php');
   require("TicketClass.php");

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
                                       <span class='glyphicon glyphicon-list'></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="coursesLeftMenu">Courses</a>
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
                                                <span class="glyphicon glyphicon-wrench"></span><a href="javascript:editCourse()" id="editCourseLeftMenu">Edit Course</a>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-remove"></span><a href="javascript:removeCourse()">Remove Course</a>
                                             </td>
                                          </tr>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="accountsLeftMenu"><span class="glyphicon glyphicon-folder-close">
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
                                                <span class="glyphicon glyphicon-wrench"></span><a href="javascript:editAccount()" id="editAccountLeftMenu">Edit Account</a>
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
                  <p class="glyphicon glyphicon-wrench" id="adminTitle"></i><?php echo 'Admin';?></p>
                  <div id=swapDiv>
                     <div class="row showDiv" id="landingPage">
                        <?php
                           echo "<div class='w3-container' id='we-shrink'>";
                           echo "<div id='adminText'>Welcome to the Admin Panel</div><hr>";
                           echo "<div id='adminDesc'>Here you can perform administrative tasks relating to courses, accounts and tickets. All items can be found
                           in the accordian menu to the left or above.</div></div>";
                           ?>
                     </div>
                     <!-- addCourse -->
                     <div class="row hideDiv" id="addCourse">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="my-tab-content" class="tab-content">
                                 <div class="tab-pane active" id="login">
                                    <form class="form-signin" action="adminInsertCourse.php" method="POST">
                                       <center>
                                          <h2>Add Course</h2>
                                       </center>
                                       <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Course Code" required autofocus>
                                       <input type="text" class="form-control" id="courseDescription" name="courseDescription" placeholder="Description" required>
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
                                  <br>
                                   <form class="form-signin" action="javascript:editACourse()">
                                      <center>
                                         <h2>Edit Course</h2>
                                      </center>
                                      <select class="form-control" id="coursesList" name="coursesList" onchange="javascript:retrieveCourse(this.value)">
                                         <option selected="selected" hidden>Select a course</option>
                                         <?php
                                            $courseVar = new Course();
                                            $courseList = $courseVar->GetCourseList($con);
                                            foreach ($courseList as $course) {
                                              echo "<option value='" . $course->getCourseCode() . "'>" . $course->getCourseCode() . "</option>";
                                            }
                                         ?>
                                      </select>
                                      <input type="text" class="form-control" id="courseDescInput" name="courseDescInput" placeholder="Description" required>
                                      <select class="form-control" id="selectInstructorOps" placeholder="Assign an Instructor" name="selectInstructorOps">
                                         <!-- <option selected="selected" hidden>Assign an Instructor</option> -->
                                         <option selected="selected" value="1">No instructor assigned</option>
                                         <?php
                                            //populate dropdown with list of instructors
                                            $instructors = getAllInstructors($con);
                                            foreach ($instructors as $instructor) {
                                              echo "<option value='" . $instructor->getUserId() . "'>" . $instructor->getUserId() . ' ' . $instructor->getFirstName() . ' ' . $instructor->getLastName() . "</option>";
                                            }
                                         ?>
                                      </select>
                                      <input type='submit' class='btn btn-lg btn-default btn-block'  value='Submit' />
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
                                   <form class="form-signin" action="adminRemoveCourse.php" method="POST">
                                      <center>
                                         <h2>Remove Course</h2>
                                      </center>
                                      <select class="form-control" id="courseList" name="courseList">
                                         <option value="1" selected="selected" hidden>Select a course</option>
                                         <?php
                                            $courseVar = new Course();
                                            $courseList = $courseVar->GetCourseList($con);
                                            // print_r($courseList);
                                            echo mysqli_error($con);
                                            foreach ($courseList as $course) {
                                              echo "<option value='" . $course->getCourseCode() . "'>" . $course->getDescription() . "</option>";
                                            }
                                         ?>
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
                                   <form class="form-signin" action="adminInsertAccount.php" method="POST">
                                      <center>
                                         <h2>Add Account</h2>
                                      </center>
                                      <input type="text" class="form-control" id="newID" name="newID" placeholder="Account ID" required autofocus>
                                      <input type="text" class="form-control" id="newFirstName" name="newFirstName" placeholder="First Name" required>
                                      <input type="text" class="form-control" id="newLastName" name="newLastName" placeholder="Last Name" required>
                                      <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password" required>
                                      <input type="password" class="form-control" id="newConfPassword" name="newConfPassword"placeholder="Confirm Password" required>
                                      <select class="form-control" id="newUserType" name="newUserType">
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
                                   <form class="form-signin" action="adminGetUser.php" method="POST">
                                      <center>
                                         <h2>Edit Account</h2>
                                      </center>
                                      <input id="getUserID" name="getUserID" type="text" class="form-control" placeholder="UserID" required>
                                      <select class="form-control" id="userType" name="userType">
                                         <option value="1">Student</option>
                                         <option value="2">Instructor</option>
                                         <option value="3">Admin</option>
                                      </select>
                                      <input type="submit" class="btn btn-lg btn-default btn-block" value="Get User" />
                                    </form>
                                      <br>
                                      <form class="form-signin" action="adminEditProfile.php" method="POST">
                                      <input id="inFirstName" name="inFirstName" type="text" class="form-control" placeholder="First Name" required>
                                      <input id="inLastName" name="inLastName" type="text" class="form-control" placeholder="Last Name" required>
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
                                   <form class="form-signin" action="adminResetPassword.php" method="POST">
                                      <center>
                                         <h2>Reset Password</h2>
                                      </center>
                                      <input type="text" class="form-control" name="ID" placeholder="Account ID" required autofocus>
                                      <input type="password" class="form-control" name="newPassword" placeholder="Password" required>
                                      <input type="password" class="form-control" name="newConfPassword"placeholder="Confirm Password" required>
                                      <select class="form-control" name="userType">
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
                                   <form class="form-signin">
                                     <!-- When you select a ticket call retrieveTicket passing in the value -->
                                     <select class="form-control" id="ticketSelect" onchange="javascript:retrieveTicket(this.value)">
                                       <option value="" disabled selected hidden>Please choose a Ticket</option>
                                       <?php
                                       //create empty ticket to call ticket functions to populate the drop down
                                       $idList = new Ticket();
                                       //get the Tickets info
                                       $ticketID[] = $idList->getTickets($con);
                                       $i = 0;
                                       //while info loop
                                       while ($ticketID[0][$i] != ""){
                                         //substring from the nbsp's
                                         $str = $ticketID[0][$i];
                                         $value = strstr($str, '&nbsp', true);
                                         //create option elements
                                         echo "<option value='" . $value . "'>Ticket#: " . $ticketID[0][$i] . "</option>";
                                         $i++;
                                       }
                                       ?>
                                       </select>
                                       <table><tr><td>
                                       Submitted By: </td><td><input type='text' id='subBy' name='Name' value='' readonly><br>
                                       </td></tr><tr><td>Status: </td><td><input type='text' id='status' name='Name' value='' readonly><br></td></td></table>
                                       <textarea id='ticketDisplay' type='text' class='form-control' rows='10' cols='50' placeholder='Select a Ticket from the Dropdown'></textarea>
                                       <input type='submit' formaction="javascript:resTicket(ticketSelect.value)" class='btn btn-lg btn-default btn-block' name='action' id='action' value='Set Resolved' />
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
         <?php
          if (isset($_SESSION['insertCourse'])){
           if ($_SESSION['insertCourse'] == 1){
    			$_SESSION['insertCourse'] = 0;
    			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Course has been created!';</script>";
    			echo "<script> myFunction(); </script>";
           }
    	   else if ($_SESSION['insertCourse'] == 2) {
    		    $_SESSION['insertCourse'] = 0;
    			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error creating course.';</script>";
    			echo "<script> myFunction(); </script>";
    	   }
         else if ($_SESSION['insertCourse'] == 3) {
    		    $_SESSION['insertCourse'] = 0;
    			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'That course code already exists.';</script>";
    			echo "<script> myFunction(); </script>";
    	   }
         }
        ?>
        <?php
         if (isset($_SESSION['insertAccount'])){
          if ($_SESSION['insertAccount'] == 1){
         $_SESSION['insertAccount'] = 0;
         echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Account has been created!';</script>";
         echo "<script> myFunction(); </script>";
          }
        else if ($_SESSION['insertAccount'] == 2) {
           $_SESSION['insertAccount'] = 0;
         echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Your passwords don\'t match.';</script>";
         echo "<script> myFunction(); </script>";
        }
        else if ($_SESSION['insertAccount'] == 3) {
           $_SESSION['insertAccount'] = 0;
         echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error creating account.';</script>";
         echo "<script> myFunction(); </script>";
        }
        else if ($_SESSION['insertAccount'] == 4) {
           $_SESSION['insertAccount'] = 0;
         echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User ID must be numeric.';</script>";
         echo "<script> myFunction(); </script>";
        }
        }
       ?>
       <?php
        if (isset($_SESSION['adminResetPassword'])){
         if ($_SESSION['adminResetPassword'] == 1){
           $_SESSION['adminResetPassword'] = 0;
           echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Password changed successfully!';</script>";
           echo "<script> myFunction(); </script>";
         }
         else if ($_SESSION['adminResetPassword'] == 2) {
          $_SESSION['adminResetPassword'] = 0;
          echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Your passwords didn\'t match.';</script>";
          echo "<script> myFunction(); </script>";
          }
       else if ($_SESSION['adminResetPassword'] == 3) {
          $_SESSION['adminResetPassword'] = 0;
        echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Error changing password.';</script>";
        echo "<script> myFunction(); </script>";
       }
       else if ($_SESSION['adminResetPassword'] == 4) {
          $_SESSION['adminResetPassword'] = 0;
        echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'The selected ID does not exist for that user type.';</script>";
        echo "<script> myFunction(); </script>";
       }
       else if ($_SESSION['adminResetPassword'] == 5) {
          $_SESSION['adminResetPassword'] = 0;
        echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User ID was not valid.';</script>";
        echo "<script> myFunction(); </script>";
       }
       }
      ?>
      <?php
       if (isset($_SESSION['editGetUser'])){
        if ($_SESSION['editGetUser'] == 1){
          echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
          echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
          echo "<script>document.getElementById('getUserID').value = " . $_SESSION['editUser']->getUserID() . ";</script>";
          if ($_SESSION['editUserType'] == "1"){
            echo "<script>document.getElementById('userType').selectedIndex = ' ". '0' ." ';</script>";
          }
          else if ($_SESSION['editUserType'] == "2"){
            echo "<script>document.getElementById('userType').selectedIndex = ' ". '1' ." ';</script>";
          }
          else if ($_SESSION['editUserType'] == "3"){
            echo "<script>document.getElementById('userType').selectedIndex = ' ". '2' ." ';</script>";
          }
          echo "<script>document.getElementById('inFirstName').value = '". $_SESSION['editUser']->getFirstName() ."';</script>";
          echo "<script>document.getElementById('inLastName').value = '" . $_SESSION['editUser']->getLastName() . "';</script>";
          $_SESSION['editGetUser'] = 0;
          // $_SESSION['editUser'] = 0;
          // $_SESSION['editUserType'] = 0;
        }
        else if ($_SESSION['editGetUser'] == 2) {
          echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
          echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
          $_SESSION['editGetUser'] = 0;
          echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'No user ID of that type found.';</script>";
          echo "<script> myFunction(); </script>";
        }
        else if ($_SESSION['editGetUser'] == 3) {
          echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
          echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
          $_SESSION['editGetUser'] = 0;
          echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User ID must be numeric.';</script>";
          echo "<script> myFunction(); </script>";
        }
       }
     ?>
     <?php
      if (isset($_SESSION['adminUpdateUser'])){
       if ($_SESSION['adminUpdateUser'] == 1){
         $_SESSION['adminUpdateUser'] = 0;
         unset($_SESSION['editUser']);
         unset($_SESSION['editUserType']);
         echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User has been updated successfully!';</script>";
         echo "<script> myFunction(); </script>";
       }
       else if ($_SESSION['adminUpdateUser'] == 2) {
        echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
        echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
        $_SESSION['adminUpdateUser'] = 0;
        unset($_SESSION['editUser']);
        unset($_SESSION['editUserType']);
        echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User was not updated successfully.';</script>";
        echo "<script> myFunction(); </script>";
        }
     else if ($_SESSION['adminUpdateUser'] == 3) {
       echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
       echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
       $_SESSION['adminUpdateUser'] = 0;
       unset($_SESSION['editUser']);
       unset($_SESSION['editUserType']);
       echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Oops, you chose the same names.';</script>";
       echo "<script> myFunction(); </script>";
     }
     else if ($_SESSION['adminUpdateUser'] == 4) {
       echo "<script>document.getElementById('accountsLeftMenu').click();</script>";
       echo "<script>document.getElementById('editAccountLeftMenu').click();</script>";
       $_SESSION['adminUpdateUser'] = 0;
       unset($_SESSION['editUser']);
       unset($_SESSION['editUserType']);
       echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'User ID not valid.';</script>";
       echo "<script> myFunction(); </script>";
     }
     }
    ?>


      </div>
   </body>
</html>
