<?php

session_start();
$_SESSION['passwordChng'] = 1;
header('Location: index.php');

?>
