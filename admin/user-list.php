<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>User List</title>
</head>
<body>
<div class="container col-lg-8 col-sm-10 col-10 mt-3">
<table class="table border table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    require('../connect.php');
    $select=mysqli_query($db,"SELECT * FROM users");
    while($row=mysqli_fetch_assoc($select)):
  ?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['password'] ?></td>
      <td><?php echo $row['updated_date_time'] ?></td>
      <td><a href="user-show.php?cid=<?php echo $row['id'] ?>" class="btn btn-primary mr-2">Edit</a><a href="user-delete.php?cid=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
</body>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
</html>
