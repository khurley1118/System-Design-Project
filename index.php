<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width"/>

    <title>Tu-Pro Home</title>

    <link rel="stylesheet" type="text/css" href="css/defaultLogin.css">
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="indexCSS.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="Resources/favicon.ico" type="image/x-icon">
	
	<script src="/js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
	<script>
		$(document).ready(function(){
			//the below is jQuery that displays the login form for the site after the user clicks on either student or faculty login button. form will have student ids or faculty
			//ids depending on button pressed. if button is pressed when form is already displayed, form will hide (buttons toggle form)
			
			//show forms on click
			$("#studentButton").on("click", function(){
				//remove faculty row (button) if there
				if ($("#facultyButton").length) {
					$("#facultyButton").hide();
				}
				
				//if form exists, destroy form and bring back faculty button. if form doesn't exist, create it
				if ($("#studentUsername").length) { //student form is already there collapse that form and bring back the faculty button
					$("#formData").remove();
					$("#facultyButton").show();
				}
				else {
					//add student form
					$("#description").prepend('<form action="" method="post" id="formData"><input type="text" id="studentUsername" name="login" placeholder="cc/Username" size="60" required><span id="unerror"> </span><br><BR><input type="password" id="studentPassword" name="password" size="60" placeholder="Password" required> <span id="pwerror"> </span><br><BR><input type="image" id="studentSubmit" name="submit" src="Resources/logIn.png" alt="Submit Form" /></form>');
				}
			});
			
			$("#facultyButton").on("click", function(){
				//remove student row (button) if there
				if ($("#studentButton").length) {
					$("#studentButton").hide();
				}
				
				//if form exists, destroy form and bring back faculty button. if form doesn't exist, create it
				if ($("#facultyUsername").length) { //faculty form is already there hide that form and show the student button
					$("#formData").remove();
					$("#studentButton").show();
				}
				else {
					//add faculty form
					$("#description").prepend('<form action="" method="post" id="formData"><input type="text" id="facultyUsername" name="login" placeholder="cc/Username" size="60" required><span id="unerror"> </span><br><BR><input type="password" id="facultyPassword" name="password" size="60" placeholder="Password" required> <span id="pwerror"> </span><br><BR><input type="image" id="facultySubmit" name="submit" src="Resources/logIn.png" alt="Submit Form" /></form>');
				}
			});
		});
	</script>
  </head>
  <body>
        <?php include('indexHeader.php');?>
        <div class="container-fluid">
        <div id="pageContent">
            <div id="mainContainer">
            <div id="logo">
                <img src="Resources/logo.png" alt="logo">
            </div>
            <div id="buttonTable">
                <table id="buttonTable">
					<tr id="studentRow"><input type="image" src="Resources/StudentLogIn.png" id="studentButton" /></tr><BR>
                    <tr id="facultyRow"><input type="image" src="Resources/FacultyLogIn.png" id="facultyButton" /></tr>
                </table>
            </div>
			<div id="formLocation">
			
			</div>
            <div id="description">
                <h5><i>
                    Tu-Pro is a tutorial site for the NBCC network, dedicated to extending learning beyond the classroom. We offer extra tutorials and and tutoring outside of the classroom, just login with your Student ID to find your classes, and continue learning!
		          </i></h5>
            </div>
            </div>
	   </div>
    </div>
    
		<?php include('Footer.php');?>
  </body>
</html>
