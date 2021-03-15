<?php
  require('connect.php');
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pw=$_POST['password'];
  $insert="insert into customer (customername,email,password) values ('$name','$email','$pw')";
  $ret=mysqli_query($db,$insert);
  header("Location:reg.php?status=1")
?>