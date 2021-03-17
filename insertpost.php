<?php
session_start();
require ('connect.php');
$title=$_POST['title'];
$text=$_POST['text'];
$id=$_SESSION['userid'];
$insertpost="INSERT INTO posts (title,body,user_id) VALUES ('$title','$text','$id')";
$ret=mysqli_query($db,$insertpost);
header("Location:home.php");
?>