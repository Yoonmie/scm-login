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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Home Page</title>
</head>
<body id="home">
<form action="post.php" method="post">
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
              echo '<a href="admin/logout.php" class="btn btn-danger" >Log-Out</a>';
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
  <div class="input-group add-list mt-5">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-info" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <a href="admin/post-create.php" class="btn btn-info search offset-1">Add Post</a>
  </div>
<!---search and add post list--->
<div class="row row-cols-1 row-cols-md-2">

  <?php 
    require('connect.php');
    $userid=$_GET['uid'];
    $post_result = mysqli_query($db, "SELECT posts.*,users.name FROM posts LEFT JOIN users ON posts.user_id=users.id WHERE posts.user_id=$userid ORDER BY updated_date_time DESC"); 
    while($postrow = mysqli_fetch_assoc($post_result)): 
    $postid= $postrow['id'];
    ?> 

    <div class="col mb-4">
    <div class="card mt-4 border-info h-100">
    <div class="card-header bg-info text-white h-50"> 
        <a href="post-detail.php?pid=<?php echo $postrow['id']?>"><h3 class="text-white"><?php echo $postrow['title']?> </h3></a>
        <span class="blog-username">published by <a href="post.php?uid=<?php echo $postrow['user_id']?>" class="text-white border-bottom"><?php echo $postrow['name']?></a></span>
    </div>
    <!---title--->
    <div class="card-body">
      <p class="card-text"><?php echo $postrow['body']?></p>
    </div>
    <!--body--->
    <form method="POST">
      <div class="card-comment p-3 bg-light card-footer">
          <span><h6>Comments</h6></span>

        <?php 
        require('connect.php');
          if(isset($_POST['cmt-icn'.$postid])){
            echo $_POST['cmt-icn'.$postid];
            $postcomment= $_POST['cmt'];
            $userid=$_SESSION['userid'];
            $insertcmt = "INSERT INTO comments (user_id, post_id, body) VALUES ('$userid', '$postid', '$postcomment')";
            mysqli_query($db, $insertcmt); 
        }?>
      <div class="overflow-auto">
        <?php
        $cmtselect = mysqli_query($db, "SELECT comments.*,users.name from comments join users on users.id=comments.user_id join posts on posts.id=comments.post_id ORDER BY comments.updated_date_time DESC");
        while($cmtrow=mysqli_fetch_assoc($cmtselect)):
         if($cmtrow['post_id']==$postrow['id']){?>
          <div class="form-group border comment-session pl-3">
           
            <span><a href="#"><?php echo $cmtrow['name']?></a></span>
            <p class="ml-2"><?php  print_r($cmtrow['body']);?></p> 
            </div>
        <?php }
        endwhile; ?>
        </div><!--over-flow-->
        </form>
      </div><!--comment-->    
    </div><!--card-->
    </div><!--col-->
    <?php endwhile;?>
    </div><!--row-->
</div> <!--container-->
  


  
</form>
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</html>