<!DOCTYPE html>
<?php
include('Footer.php');
include("connect.php");
if (isset($_SESSION['userID']) && isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] == 'admin') {
        header("location: AdminPage.php");
    }
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator Login</title>
        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/defaultLogin.css">
        <link rel="stylesheet" type="text/css" href="css/LogStyle.css">
        <link href="indexCSS.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            //ajax here
            $(document).ready(function () {
                $('#submit').on("click", function (e) {
                    //reset error span message
                    e.preventDefault();
                    $("#unerror").html("");
                    $("#pwerror").html("");

                    var id = $("#login").val();
                    var pw = $("#password").val();

                    if (id != "") {
                        if (pw != "") {
                            $.ajax({
                                type: 'POST',
                                url: 'loginfunction.php',
                                dataType: "text",
                                data: {login: id, password: pw, type: "admin"},
                                cache: false,
                                success: function (data) {
                                    //alert(data);
                                    $("#formAlert").html(data);
                                    if ((JSON.parse(data)) == "Logged In") {
                                        window.location.replace('AdminPage.php');
                                    }
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + "\n" + thrownError);
                                    return false;
                                }
                            }); // end ajax call
                        } else {
                            $("#pwerror").html("Required Field");
                        }
                    } else {
                        $("#unerror").html("Required Field");
                    }
                });
            }); // end document ready

        </script>
    </head>
    <body>
        <?php include('indexHeader.php'); ?>
        <div id="pageContent">
            <div id="logDiv">
                <h1>Admin - Only Log-in:</h1><BR>
                <div id="loginForm">
                    <form action="" method="post" id="formData">
                        <input type="text" id="login" name="login" placeholder="User ID" size="60" required><span id="unerror"> </span> <br><BR>
                        <input type="password" id="password" name="password" size="60" placeholder="Password" required> <span id="pwerror"> </span> <br><BR>
                        <input type="image" id="submit" name="submit" src="Resources/logIn.png" alt="Submit Form" />
                    </form>
                </div>
                <div id="formAlert" class="bg-danger text-white">
                </div>
                <div id="description">
                    <h5><i>
                            Tu-Pro is a tutorial site for the NBCC network, dedicated to extending learning beyond the classroom. We offer extra tutorials and and tutoring outside of the classroom, just login with your Student ID to find your classes, and continue learning!
                        </i></h5>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        <?php include('Footer.php'); ?>
    </body>
</html>
