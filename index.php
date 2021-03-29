<?php
session_start();
require('connect.php');
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

  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="#">BLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="admin/register.php">Register<span class="sr-only">(current)</span></a>
        </li>
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="admin/login.php" class="btn btn-primary">Log-In</a>
      </form>
    </div>
  </nav>
<!--nav--->
<div class="container col-lg-10 col-sm-12 col-12 main">
<form action="index.php" method="post">
  <div class="input-group add-list mt-5">
    <input type="text" class="form-control" placeholder="Search this blog">
    <div class="input-group-append">
      <button class="btn btn-info" type="button">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
<!---add post list--->


 
 <div class="row row-cols-1 row-cols-md-2">
  
  <?php 
    require('connect.php');
    $post_result = mysqli_query($db, "SELECT posts.*,users.name FROM posts LEFT JOIN users ON posts.user_id=users.id ORDER BY updated_date_time DESC"); 
    while($postrow = mysqli_fetch_assoc($post_result)): 
    $postid= $postrow['id'];
  ?> 
  <div class="col mb-4 mt-5">
    <div class="card mt-5 border-info h-100">
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

</form>     
</div> <!--container-->


  

</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>