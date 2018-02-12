<!DOCTYPE html>
<script src="AdminPanel.js"></script>
<?php

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
                 <div id='displayStyling'>
                 <?php
                 $ID = 12345;
                 $description = "C# Programming";
                 $courseCode = "CPROG#1234";
                 echo "<table>";
                 echo "<tr><td>Course ID: $ID</td></tr>";
                 echo "<tr><td>Description: $description</td></tr>";
                 echo "<tr><td>Course Code: $courseCode</td></tr>";
                 echo "</table>";
                 ?>
               </div>
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
                 <div id="addForm">
                   <form action="AdminPage.php" method="POST">
                     <table>
                       <tr><td> <input type="text" name="courseID" placeholder="CourseID"></td></tr>
                       <tr><td> <input type="text" name="courseCode" placeholder="Course Code"></td></tr>
                       <tr><td> <input type="text" name="Description" placeholder="Description"></td></tr>
                       <tr><td><input type="submit" value="Submit"></td></tr>
                     </table>
                   </form>
                 </div>
              </div>
              <div class="hideDiv" id="removeCourse">
                 Remove Course
                 <div id="searchForm">
                   <form action="AdminPage.php" method="POST">
                     <table>
                       <tr><td> <input type="text" name="courseID" placeholder="CourseID"></td>
                       <td><input type="submit" value="Submit"></td></tr>
                     </table>
                   </form>
                 </div>
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
                 <div id='displayStyling'>
                 <?php
                 $ID = 12345;
                 $fname = "Mark";
                 $lname = "Patterson";
                 $addedBy = "1";
                 echo "<table>";
                 echo "<tr><td>Account ID: $ID</td></tr>";
                 echo "<tr><td>First Name: $fname</td></tr>";
                 echo "<tr><td>Last Name: $lname</td></tr>";
                 echo "<tr><td>Added By: $addedBy</td></tr>";
                 echo "</table>";
                 ?>
               </div>
              </div>
              <div id="courseButtons">
                 <table>
                    <tr><button class="buttonStyle2" onclick="showAllAcc()">Search Accounts</button></tr>
                    <tr><button class="buttonStyle2" onclick="addAccount()">Add Account</button></tr>
                 </table>
              </div>
              <div class="hideDiv" id="addAccount">
                 Add course
                 <div id="addForm">
                   <form action="AdminPage.php" method="POST">
                     <table>
                       <tr><td> <input type="text" name="firstName" placeholder="First Name"></td></tr>
                       <tr><td> <input type="text" name="lastName" placeholder="Last Name"></td></tr>
                       <tr><td> <input type="text" name="password" placeholder="Password"></td></tr>
                       <tr><td><input type="submit" value="Submit"></td></tr>
                     </table>
                   </form>
                 </div>
              </div>
              <div class="hideDiv" id="removeAccount">
                 Remove Course
              </div>
              <div class="hideDiv" id="showAccount">
                 Search Accounts
                 <div id="searchForm">
                   <form action="AdminPage.php" method="POST">
                     <table>
                       <tr><td> <input type="text" name="accountID" placeholder="AccountID"></td>
                       <td><input type="submit" value="Submit"></td></tr>
                     </table>
                   </form>
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
