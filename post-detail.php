<?php
session_start();
require('connect.php');
$role="";$username="";
if(isset($_SESSION['row']) && isset($_SESSION['username'])){
  $role=$_SESSION['row'];
  $username=$_SESSION['username'];
}
else {
  $role="Position";
  $username="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Home Page</title>
</head>
<body id="home">
<form action="index.php" method="post">
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">

    <?php
        if(isset($_SESSION['username'])){

          if($role=="admin"){
            echo '<a class="navbar-brand" href="admin/index.php">BLOG</a>';
          }
          else{
            echo '<a class="navbar-brand" href="admin/post-list.php">BLOG</a>';
          }
        }
        else{
          echo '<a class="navbar-brand" href="index.php">BLOG</a>';
        }
      
    ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $role?> <span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Welcome <?php echo $role?> !</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php
          if(isset($_SESSION['username'])){
            
            if($role=="author")
            {
              echo '<a href="admin/post-create.php" class="btn btn-info search offset-1">Add Post</a>';
            }
            echo '<a href="admin/logout.php" class="btn btn-danger ml-3" >Log-Out</a>';
          }
          else{
            echo '<a href="admin/login.php" class="btn btn-info" >Log-In</a>';
          }
    ?>
    </form>
  </div>
</nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12 main">

  <?php 
    require('connect.php');
    $postid=$_GET['pid'];
    $post_result = mysqli_query($db, "SELECT posts.*,users.name FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE posts.id=$postid"); 
    $postrow = mysqli_fetch_assoc($post_result);
    
    ?> 
     
  <div class="card border-info mt-5">
    <div class="card-header bg-info"> 
        <a href="post-detail.php?pid=<?php echo $postrow['id']?>" class="text-white"><h3><?php echo $postrow['title']?> </h3></a>
        <span class="blog-username">published by <a href="post.php?uid=<?php echo $postrow['user_id']?>" class="text-white"><?php echo $postrow['name']?></a></span>
      
    </div>
    <!---title--->
    <div class="card-body p-3 border-bottom">
      <p><?php echo $postrow['body']?></p>
    </div>
    <!--body--->
    <div class="change-session p-4" class="bg-light"
       <?php
         if(isset($_SESSION['userid'])){
            $uid=$_SESSION['userid']; //userid from session(login)
            $role=$_SESSION['row']; //roleid from session(login)
              if($role!="admin"){
                if($uid!=$postrow['user_id']) {
                  echo 'style="display: none;"';
                }
              }//for checking role is author
            }
          else {
            echo 'style="display: none;"';
          }
       ?>> <!--else looping for not having session userid(login)-->

      <a href="admin/post-show.php?postid=<?php echo $postrow['id'] ?>" class="pr-3">Edit Post</a>  |
      <a href="admin/post-delete.php?postid=<?php echo $postrow['id'] ?>" class="delete-link pl-3">Delete Post</a>
    </div> 
    <!--change-session---> 
    </div><!--card-->  
</div> <!--container-->
  
</form>
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>