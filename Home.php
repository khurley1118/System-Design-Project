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
<h2>Accordion Example</h2>
<p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
<div class="panel-group" id="accordion">
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
                <div id="mainBarContent">
									
                </div>
            </div>


          </div>
      </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
