<!DOCTYPE html>
<?php
include('connect.php');

include('Header.php');
include('chatGUI.html');
include('Footer.php');


//if user id is not set then user is not logged in and is redirected to index.
if (!isset($_SESSION['userID'])){
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
                    <table>
                        <tr>Item 1</tr><br>
                        <tr>Item 2</tr><br>
                        <tr>Item 3</tr><br>
                        <tr>Item 4</tr><br>
                        <tr>Item 5</tr><br>
                        <tr>Item 6</tr><br>
                    </table>
                </div>
            </div>
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
                    <div id="chatBar">

                        <iframe src="" height="700" width="230">
                        </iframe>
                    </div>
          </div>
      </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
