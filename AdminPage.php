<!DOCTYPE html>
<?php include('Header.php');?>
<?php include('Footer.php');?>
<script src="AdminPanel.js"></script>
<?php
session_start();
include("connect.php");
include('Header.php');
include('Footer.php');
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
  <div id="pageContent">
     <div id="flexBox">
        <div id="sideBar" class="col-md-3">
           <div id="sideBarContent">
              <table>
                 <tr><button class="buttonStyle" onclick="setCourses()">Courses</button></tr>
                 <br>
                 <tr><button class="buttonStyle" onclick="setAccounts()">Accounts</button></tr>
                 <br>
              </table>
           </div>
        </div>
        <div id="mainBar" class="col-md-3">
           <div class="showDiv" id="coursesContent">
              <div id="titleBar">
                 <div id="titleText">
                    <h3>Courses</h3>
                 </div>
              </div>
              <div id="mainContent">
                 Course Information
              </div>
              <div id="courseButtons">
                 <table>
                    <tr><button class="buttonStyle2" onclick="showAllCrs()">Search Courses</button></tr>
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
                 Search Courses
                 <div id="searchForm">
                   <form action="AdminPage.php" method="POST">
                     <table>
                       <tr><td> <input type="text" name="courseID" placeholder="CourseID"></td>
                       <td><input type="submit" value="Submit"></td></tr>
                     </table>
                   </form>
                 </div>
              </div>
           </div>
           <div class="hideDiv" id="accountsContent">
              <div id="titleBar">
                 <div id="titleText">
                    <h3>Accounts</h3>
                 </div>
              </div>
              <div id="mainContent">
                 Accounts Panel
              </div>
              <div id="courseButtons">
                 <table>
                    <tr><button class="buttonStyle2" onclick="showAllAcc()">Search Accounts</button></tr>
                    <tr><button class="buttonStyle2" onclick="addAccount()">Add Account</button></tr>
                 </table>
              </div>
              <div class="hideDiv" id="addAccount">
                 Add course
              </div>
              <div class="hideDiv" id="removeAccount">
                 Remove Course
              </div>
              <div class="hideDiv" id="showAccount">
                 Search Accounts
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
