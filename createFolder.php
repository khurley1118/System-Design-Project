<?php
  session_start();
  $directory = $_POST['mainDirectory'];
  $folderName = $_POST['folderName'];
  $_SESSION['folderAdded'] = 0;
  if (!file_exists('Content/' . $directory . "/" . $folderName . "/")) {
      mkdir('Content/' . $directory . "/" . $folderName . "/", 0777, true);
      $_SESSION['folderAdded'] = 1;
    } else {
      $_SESSION['folderAdded'] = 2;
    }
  header('Location: index.php');
?>
