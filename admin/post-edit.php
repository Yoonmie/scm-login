<?php 
session_start();
require('../connect.php');
$id=$_POST['postid'];
$title=$_POST['title'];
$body=$_POST['body'];
echo $id,$title,$body;
$update="UPDATE posts SET title='$title',body='$body' WHERE id=$id";
mysqli_query($db,$update);
if($_SESSION['row']=="admin"){
  header("Location:index.php");
}
else{
  header("Location:post-list.php");
}
?>