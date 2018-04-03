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

      <script src="js/scripts.js"></script>
      <script src="js/Home.js"></script>
      <link rel="stylesheet" type="text/css" href="css/defaultHome.css">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/pageStylings.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <?php
      //get users avatar file path from the database
      $avatarRedirect = "";
      if(isset($_SESSION['avatar'])){
        $avatarRedirect = $_SESSION['avatar'];
      }
      $avatarPath = "avatars/default.png";

      if($userType == "student"){
        $avatarPath = utilGetAvatarStudent($con, $id);
      }
      else{
        $avatarPath = utilGetAvatarInstructor($con, $id);
      }
      if($avatarPath == ""){
        $avatarPath = "avatars/default.png";
      }

       ?>
   </head>
   <body class="w3-light-grey">
      <!-- Page Container -->
      <div id="columnSetup" class="w3-content w3-margin-top" style="max-width:1400px;">
         <!-- The Grid -->
         <div id="columnSetup" class="w3-row-padding">
            <!-- Left Column -->
            <div class="w3-third">
               <div id="accordianID" class="w3-white w3-text-grey w3-card-4">
                  <br>
                  <div class="container">
                     <div class="row">
                        <div class="accordionMenu">
                           <div class="panel-group" id="accordion">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <span class='glyphicon glyphicon-th-large'></span><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                       TuPro</a>
                                    </h4>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                       <table class="table">
                                          <tr>
                                             <td>
                                                <span class="glyphicon glyphicon-home"></span><a href="javascript:landingPage()">Home</a>
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
                                         <?php
                                         $directories = glob("Content/*");
                                         $assignedCourses = $_SESSION['assignedCourses'];
                                         $count = 0;
                                         foreach($directories as $folder){
                                           $folder = substr($folder, strpos($folder, "/") + 1);
                                           $subDirs = glob("Content/" . $folder . "/*");
                                           if (in_array($folder, $assignedCourses)){
                                           echo "<tr>
                                              <td>
                                                 <span class='glyphicon glyphicon glyphicon-pushpin'></span>
                                                 <div class='dropdown btn-group'>
                                                   <a id='listValue" . $count . "' name='$folder' class='btn dropdown-toggle' data-toggle='dropdown'>$folder</span></a>
                                                   <ol class='dropdown-menu scrollable-menu' role='menu'>";
                                                   echo "<li><a id='News' onclick='javascript:newsDiv(listValue" . $count . ".innerHTML)'>News<br></a></li>";
                                                    foreach($subDirs as $subFolder){
                                                      $subFolder = substr($subFolder, strpos($subFolder, '/', strpos($subFolder, '/')+3));
                                                      $subFolder = str_replace("/", "", $subFolder);
                                                      if ($subFolder != "News"){
                                                      $output = str_replace(" ", "|", $subFolder);
                                                      echo "<li><a id='$subFolder' onclick='javascript:contentDiv(listValue" . $count . ".innerHTML, this.id)'>$subFolder<br></a></li>";
                                                    }
                                                    }
                                                   echo "</ol>
                                                 </div>
                                              </td>
                                           </tr>";

                                          }
                                          $count = $count +1;
                                        }
                                          ?>
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
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" id="accountsLeftMenu"><span class="glyphicon glyphicon-user">
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
                                                <span id="uploadAvatarBtn" class="glyphicon glyphicon-picture"></span><a id="editAvatarbtn" href="javascript:uploadAvatar()">Edit Avatar</a>
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
                <div id='titleText'>
                  <p id='pageName'>TuPro - Tutorial Professors</p>
                </div>
                  <div id=swapDiv>
                     <div class="row showDiv" id="landingPage">
                       <div id='introContent'>
                       <img id='introLogo' src='Resources/logo.png'></img>
                       <h2 id='introText'>
                         Welcome to TuPro!
                       </h2>
                        <p id='introText'>Tu-Pro is a tutorial site for the NBCC network, dedicated to extending
                            learning beyond the classroom. We offer extra tutorials and tutoring
                            outside of the classroom, just login with your Student ID to find your classes,
                            and continue learning!</p>
                     </div>
                   </div>
                   <!-- Keep em seperated -->
                   <div id='newsHolder'>
                     <div class="row hideDiv" id="newsDiv">
                        <div id="formContainer">
                           <div class="account-wall">
                              <div id="newsDisplay" class="tab-content">
                                <div id='newsText' class='w3-container' id='we-shrink'>
                                <!-- Populated from Home.js -->
                                </div>
                              </div>
                           </div>
                        </div>
                      </div>
                    </div>
                     <!-- Keep em seperated -->
                     <div class="row hideDiv" id="contentDiv">
                           <div id='contentHolder' class="account-wall">
                                 <div id="contentDisplay">
                                   <!-- Populated from Home.js -->
                                 </div>
                           </div>
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
                                       <input type="file" class="form-control" required autofocus>
                                       <select class="form-control" id="mainDir" onchange="javascript:popSubDir(mainDir.value)">
                                         <option>Select a Course</option>
                                         <?php
                                           $directories = glob("Content/*");
                                           $assignedCourses = $_SESSION['assignedCourses'];
                                           foreach($directories as $folder){
                                             $folder = substr($folder, strpos($folder, "/") + 1);
                                             if (in_array($folder, $assignedCourses)){
                                             echo "<option value='" . $folder . "'>" . $folder . "</option>";
                                           }
                                         }
                                         ?>
                                       </select>
                                       <select class="form-control" id="subDir">

                                       </select>
                                       <textarea type="text" class="form-control" id="fileTA" placeholder="Description" required></textarea>
                                       <input type="submit" class="btn btn-lg btn-default btn-block" value="Submit" />
                                    </form>
                                    <div id="tabs" data-tabs="tabs">
                                       <p class="text-center"><a href="#register" data-toggle="tab">Add a Topic</a></p>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="register">
                                    <form class="form-signin" action="createFolder.php" method="POST">
                                       <center>
                                          <h2>Add a Topic</h2>
                                       </center>
                                       <select class="form-control" name="mainDirectory">
                                          <option>Select a Parent Topic</option>
                                          <?php
                                            $directories = glob("Content/*");
                                            foreach($directories as $folder){
                                              $folder = substr($folder, strpos($folder, "/") + 1);
                                              echo "<option value='" . $folder . "'>" . $folder . "</option>";
                                            }
                                          ?>
                                       </select>
                                       <input type="text" name="folderName" class="form-control" placeholder="Topic Name" required>
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
                                    <form class="form-signin" action="uploadAvatar.php" method="POST" enctype="multipart/form-data">
                                       <center>
                                         <img id="avatarPreview" height="200" width="200" src="<?php echo $avatarPath; ?>"/>
                                          <h2>Upload an Avatar</h2>
                                       </center>
                                       <input type="file" id="avatarFile" name="avatarFile" class="form-control" placeholder="Username" required autofocus>
                                       <input type="submit" name="setAvatar" class="btn btn-lg btn-default btn-block" value="Submit" />
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
                                   <!-- form for submitting a ticket -->
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
     if (isset($_SESSION['folderAdded'])){
       if ($_SESSION['folderAdded'] == 1) {
  		    $_SESSION['folderAdded'] = 0;
  			echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Folder added successfully!';</script>";
  			echo "<script> myFunction(); </script>";
      } else if ($_SESSION['folderAdded'] == 2){
        $_SESSION['folderAdded'] = 0;
      echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = 'Folder already exists!';</script>";
      echo "<script> myFunction(); </script>";
      }
     }
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
     if($avatarRedirect == "isset"){
       $avatarMessage = "";
       $_SESSION['avatar'] = "";
       if(isset($_SESSION['avatarMessage'])){
         $avatarMessage = $_SESSION['avatarMessage'];
       }
       echo "<script>document.getElementById('AdmiralSnackbar').innerHTML = '" . $avatarMessage . "'</script>";
       echo "<script> myFunction(); </script>";
     }
    ?>
   </div>
   <?php include('ChatGUI.php'); ?>
   </body>
</html>
