<!DOCTYPE html>
<<<<<<< HEAD
<?php include('Header.php');?>
<?php include('Footer.php');?>
<script src="AdminPanel.js"></script>
=======
<?php
session_start();
include("connect.php");
include('Header.php');
include('Footer.php');
?>

>>>>>>> Dev
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Tu-Pro Home</title>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
=======

>>>>>>> Dev
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
<<<<<<< HEAD
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
=======
        <div id="mainBar">
            <div id="titleBar">
                <div id="titleText">
                <h3>Course Information</h3>
                </div>
            </div>
            <div id="mainBarContent">
                <p>
                    � 16. De Quincey, the essayist, once said that the German sentence is like a carryall - always room for one more. That used to be true of the English sentence. Originally, to be sure, our sentence was short, but under the influence of Latin studies it grew heavy and unwieldy. From sixteenth century writers it is possible to quote sentences of five or six hundred words. Such a sentence would fill two pages of this book.

When newspapers came to the front, the English sentence began to drop a part of its words. Yet one of the best journalists of the eighteenth century, Daniel Defoe, who wrote Robinson Crusoe, is not above writing an occasional sentence of great length. Here is a business sentence from Defoe:

One office for lone of money for customs of goods, which by a plain method might be so ordered that the merchant might with ease pay the highest customs down, and so, by allowing the bank four per cent advance, be first to secure the �10 per cent which the king allows for prompt payment at the custom house, and be also freed from the troublesome work of finding bondsmen and securities for the money - which has exposed many a man to the tyranny of extents, either for himself or his friend, to his utter ruin, who under a more moderate prosecution had been able to pay all his debts, and by this method has been torn to pieces and disabled from making any tolerable proposal to his creditors.

Here are a hundred and twenty-nine words in one sentence. The book from which it is taken, "An Essay upon Projects," averages more than sixty words to the sentence. How long is the average sentence today! It depends on the man, but in even the most literary prose it will not average more than thirty words. The average sentence of Macaulay's England is 23.43. Emerson's average sentence is less than that.
            </p>
            </div>
       </div>
      </div>
      </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
>>>>>>> Dev
