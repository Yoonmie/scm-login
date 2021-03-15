<?php
require('connect.php');
$id=$_GET['cid'];
$msg="Delete Succefully";
echo $id;

$delete="DELETE FROM customer WHERE customerid=$id";
mysqli_query($db,$delete);
header("Location:reg.php?status=3");
echo "<script>alert('Delete Successfully')</script>";
?>