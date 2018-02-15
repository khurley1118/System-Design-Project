<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['userID'])) {
    if ($_SESSION['userType'] == 'admin') {
        header("location: AdminPage.php");
    } else {
        header("location: Home.php");
    }
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width"/>

        <title>Tu-Pro Home</title>

        <link rel="stylesheet" type="text/css" href="css/defaultLogin.css">
        <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="Resources/favicon.ico" type="image/x-icon">

        <script src="/js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

        <script>
            $(document).ready(function () {
                //the below is jQuery that displays the login form for the site after the user clicks on either student or faculty login button. form will have student ids or faculty
                //ids depending on button pressed. if button is pressed when form is already displayed, form will hide (buttons toggle form)
                //show forms on click
                $("#studentButton").on("click", function () {

                    //remove faculty row (button) if there
                    if ($("#facultyButton").length) {
                        $("#facultyButton").hide();
                    }

                    //if form exists, destroy form and bring back faculty button. if form doesn't exist, create it
                    if ($("#studentUsername").length) { //student form is already there collapse that form and bring back the faculty button
                        $("#formData").remove();
                        $("#facultyButton").show();
                    } else {
                        //add student form
                        $("#description").prepend('<form action="" method="post" id="formData"><input type="text" id="studentUsername" name="login" placeholder="cc/Username" size="60" required><span id="unerror"> </span><br><BR><input type="password" id="studentPassword" name="password" size="60" placeholder="Password" required> <span id="pwerror"> </span><br><BR><input type="image" id="studentSubmit" name="submit" src="Resources/logIn.png" alt="Submit Form" /></form>');
                        //set focus for un input
                        $("#studentUsername").focus();
                        //On submit do an ajax call to the REST auth API
                        $("#studentSubmit").on("click", function () {
														//event.preventDefault();
                            $("#unerror").html("");
                            $("#pwerror").html("");
                            //JS variables for input to be posted to the API
                            var id = $("#studentUsername").val();
                            var pw = $("#studentPassword").val();

                            if (id != "") {
                                if (pw != "") {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'loginfunction.php',
                                        dataType: "text",
                                        data: {login: id, password: pw, type: "student"},
                                        cache: false,
                                        success: function (data) {

                                            //Succesful AP response will display the message returned. if the message is Logged in
                                            //user will be redirected to the home page.
																						$("#formAlert").html(data);
                                            if ((JSON.parse(data)) == "Logged In") {
                                                window.location.replace('Home.php');
                                            }
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(xhr.status + "\n" + thrownError);
                                            return false;
                                        }
                                    }); // end ajax call
																		return false;
                                } else {
                                    $("#pwerror").html("Required Field");
                                }
                            } else {
                                $("#unerror").html("Required Field");
                            }
                        });
                    }
                });

                $("#facultyButton").on("click", function () {

                    //remove student row (button) if there
                    if ($("#studentButton").length) {
                        $("#studentButton").hide();
                    }

                    //if form exists, destroy form and bring back faculty button. if form doesn't exist, create it
                    if ($("#facultyUsername").length) { //faculty form is already there hide that form and show the student button
                        $("#formData").remove();
                        $("#studentButton").show();
                    } else {
                        //add faculty form
                        $("#description").prepend('<form action="" method="post" id="formData"><input type="text" id="facultyUsername" name="login" placeholder="cc/Username" size="60" required><span id="unerror"> </span><br><BR><input type="password" id="facultyPassword" name="password" size="60" placeholder="Password" required> <span id="pwerror"> </span><br><BR><input type="image" id="facultySubmit" name="facultySubmit" src="Resources/logIn.png" alt="Submit Form" /></form>');
                        //set username focus
                        $("#facultyUsername").focus();
                        // submit form to AJAX
                        $("#facultySubmit").on("click", function () {
                            $("#unerror").html("");
                            $("#pwerror").html("");
                            //JS variables that will be submitted to REST API
                            var id = $("#facultyUsername").val();
                            var pw = $("#facultyPassword").val();

                            if (id != "") {
                                if (pw != "") {
                                    //AJAX CALL
                                    $.ajax({
                                        type: 'POST',
                                        url: 'loginfunction.php',
                                        dataType: "text",
                                        data: {login: id, password: pw, type: "faculty"},
                                        cache: false,
                                        success: function (data) {
                                            //API Response
                                            $("#formAlert").html(data);
                                            if ((JSON.parse(data)) == "Logged In") {
                                                window.location.replace('Home.php');
                                            }
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(xhr.status + "\n" + thrownError);
                                            return false;
                                        }
                                    }); // end ajax call
																		return false;
                                } else {
                                    $("#pwerror").html("Required Field");
                                }
                            } else {
                                $("#unerror").html("Required Field");
                            }
                        }); //end of faculty submit
                    } //end of else
                }); //end of faculty form show button
            });
        </script>
    </head>
    <body>
        <?php include('indexHeader.php'); ?>
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
											<div id="formAlert" class="bg-danger text-white">
											</div>
                        <h5><i>
                                Tu-Pro is a tutorial site for the NBCC network, dedicated to extending learning beyond the classroom. We offer extra tutorials and and tutoring outside of the classroom, just login with your Student ID to find your classes, and continue learning!
                            </i></h5>
                    </div>
                </div>
            </div>
        </div>
        <?php include('Footer.php'); ?>
    </body>
</html>
