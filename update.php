<?php
require('connect.php');
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$pw=$_POST['password'];
echo $id,$name,$email,$pw;
$update="UPDATE customer SET customername='$name',email='$email',password='$pw' WHERE customerid=$id";
mysqli_query($db,$update);
header("Location:reg.php?status=2");
?>