<!DOCTYPE html>
<?php include('Header.php');?>
<?php include('Footer.php');?>
<?php session_start();
      $_SESSION['pageState'] = 0;
?>
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
            var state = 0;
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
                    Courses panel
                </div>
                <div class="hideDiv" id="accountsContent">
                    <div id="titleBar">
                        <div id="titleText">
                        <h3>Controls</h3>
                        </div>
                    </div>
                    Accounts Panel
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