<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="defaultStyle.css">
<link rel="stylesheet" type="text/css" href="LogStyle.css">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">

    <title>Tu-Pro Home</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="indexCSS.css" rel="stylesheet" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 
    //ajax here
$(document).ready(function(){
    var id = $("#login").val();
    $.ajax ({
        type: 'POST',
        url: 'loginfunction.php',
        dataType: "text",
        data: $('#loginForm').serialize(),
        cache: false,
        success: function(data) {
            alert(data);
            if (data == "invalid credentials"){
                alert(data);
            }
            else {
                alert(data);
                window.location.replace(home.php);
            }
        },
        error: function(msg){
            alert("Invalid username or password");
        }
    });
    
    
});

</script>
  </head>
  <body>
        <div id="pageContent">
            <h1>Faculty Log-in:</h1><BR>
            <div id="loginForm">
                <form action="" method="post">
                    <input type="text" name="login" placeholder="cc/Username" size="60" required><br><BR>
                    <input type="password" name="password" size="60" placeholder="Password" required><br><BR>
                    <input type="image" name="submit" src="Resources/logIn.png" alt="Submit Form" />
                </form>
                <div class="alertDiv">
                </div>
            </div>
            <div id="description">
                <h5><i>
                    Tu-Pro is a tutorial site for the NBCC network, dedicated to extending learning beyond the classroom. We offer extra tutorials and and tutoring outside of the classroom, just login with your Student ID to find your classes, and continue learning!
		</i></h5>
            </div>
	</div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>