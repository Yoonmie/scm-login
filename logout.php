<?php
session_start();
$errorMessage="";
if($_SESSION['login']==false) {
  header("Location:login.php");
}
else {
  unset($_SESSION['login']);
  header("Location:login.php");
}
?>
