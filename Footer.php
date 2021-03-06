<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Tu-Pro Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/footerStyle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      <div id="footer">
          <div id="copyright">
              <br><br>Copyright &copy; <?php echo date("Y"); ?> NBCC
          </div>
          <?php
            $currPage = basename($_SERVER['PHP_SELF']);
            if ($currPage == "index.php"){
              echo "<div id='adminLogin'>
                  <a href='adminLogin.php'>Admin Log-in</a>
              </div>";
            }
            $currPage = basename($_SERVER['PHP_SELF']);
            if ($currPage != "index.php"){
              echo "<div id='userLogOut'>
                  <a href='#' onclick='javascript:logOut()'>Log Out</a>
              </div>";
            }
          ?>
      </div>
  </body>
</html>
