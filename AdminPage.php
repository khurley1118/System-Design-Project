<!DOCTYPE html>
<?php include('Header.php');?>
<?php include('Footer.php');?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Tu-Pro Home</title>
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">    
    <link rel="stylesheet" type="text/css" href="css/defaultHome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
        <script type="text/javascript">
            function setCourses() {
                document.getElementById('coursesContent').setAttribute("class", "showDiv");
                document.getElementById('accountsContent').setAttribute("class", "hideDiv");
                document.getElementById('mainTitle').innerHTML = "Course Information";
            }
            function setAccounts() {
                document.getElementById('coursesContent').setAttribute("class", "hideDiv");
                document.getElementById('accountsContent').setAttribute("class", "showDiv");
                document.getElementById('mainTitle').innerHTML = "Account Information";
            }
            function addCourse(){
                document.getElementById('removeCourse').setAttribute("class", "hideDiv");
                document.getElementById('addCourse').setAttribute("class", "showDiv");
                document.getElementById('showCourses').setAttribute("class", "hideDiv");
            }
            function removeCourse(){
                document.getElementById('addCourse').setAttribute("class", "hideDiv");
                document.getElementById('showCourses').setAttribute("class", "hideDiv");
                document.getElementById('removeCourse').setAttribute("class", "showDiv");
            }
            function showAllCrs() {
                document.getElementById('addCourse').setAttribute("class", "hideDiv");
                document.getElementById('removeCourse').setAttribute("class", "hideDiv");
                document.getElementById('showCourses').setAttribute("class", "showDiv");
            }
            function addAccount(){
                document.getElementById('removeAccount').setAttribute("class", "hideDiv");
                document.getElementById('addAccount').setAttribute("class", "showDiv");
                document.getElementById('showAccount').setAttribute("class", "hideDiv");
            }
            function removeAccount(){
                document.getElementById('addAccount').setAttribute("class", "hideDiv");
                document.getElementById('showAccount').setAttribute("class", "hideDiv");
                document.getElementById('removeAccount').setAttribute("class", "showDiv");
            }
            function showAllAcc() {
                document.getElementById('addAccount').setAttribute("class", "hideDiv");
                document.getElementById('removeAccount').setAttribute("class", "hideDiv");
                document.getElementById('showAccount').setAttribute("class", "showDiv");
            }
        </script>
      <div id="pageContent">
          <div id="flexBox">
        <div id="sideBar">
            <div id="titleBar">
                <div id="titleText">
                <h3>Toolbar</h3>
                </div>
            </div>
            <div id="sideBarContent">
                <table>
                    <tr><button class="buttonStyle" onclick="setCourses()">Courses</button></tr><br>
                <tr><button class="buttonStyle" onclick="setAccounts()">Accounts</button></tr><br>
                </table>
            </div>
        </div>
        <div id="mainBar">
            <div id="titleBar">
                <div id="titleText">
                <h3 id="mainTitle">Course Information</h3>
                </div>
            </div>
            <div id="mainBarContent">
                <div class="showDiv" id="coursesContent">
                    <div id="titleBar">
                        <div id="titleText">
                        <h3>Controls</h3>
                        </div>
                    </div>
                    <div id="mainContent">
                        Course Information 
                    </div>
                    <div id="courseButtons">
                        <table>
                            <tr><button class="buttonStyle2" onclick="showAllCrs()">Show All</button></tr>
                            <tr><button class="buttonStyle2" onclick="addCourse()">Add Course</button></tr>
                            <tr><button class="buttonStyle2" onclick="removeCourse()">Remove Course</button></tr>
                </table> 
                    </div>
                    <div class="hideDiv" id="addCourse">
                        Add course
                    </div>
                    <div class="hideDiv" id="removeCourse">
                        Remove Course
                    </div>
                    <div class="hideDiv" id="showCourses">
                        Show All
                    </div>
                </div>
                <div class="hideDiv" id="accountsContent">
                    <div id="titleBar">
                        <div id="titleText">
                        <h3>Controls</h3>
                        </div>
                    </div>
                    <div id="mainContent">
                       Accounts Panel 
                    </div>
                    <div id="courseButtons">
                        <table>
                            <tr><button class="buttonStyle2" onclick="showAllAcc()">Show All</button></tr>
                            <tr><button class="buttonStyle2" onclick="addAccount()">Add Account</button></tr>
                            <tr><button class="buttonStyle2" onclick="removeAccount()">Remove Account</button></tr>
                </table> 
                    </div>
                    <div class="hideDiv" id="addAccount">
                        Add course
                    </div>
                    <div class="hideDiv" id="removeAccount">
                        Remove Course
                    </div>
                    <div class="hideDiv" id="showAccount">
                        Show All
                    </div>
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