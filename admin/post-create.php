<?php
session_start();
require ('../connect.php');
if($_SESSION['row']!=null)
{
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $text=$_POST['text'];
        $id=$_SESSION['userid'];
        echo $title, $text ,$id;
        $insertpost="INSERT INTO posts (title,body,user_id) VALUES ('$title','$text','$id')";
        $ret=mysqli_query($db,$insertpost);
        if($_SESSION['row']=="admin"){
            header("Location:index.php");
        }
        else{
            header("Location:post-list.php");
        }
        
      }
    
}
else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <link rel="stylesheet" href="../css/style.css">
  <title>Create Post</title>
</head>
<body id="addpost">
  <div class="container col-10 col-lg-8 col-sm-10 border mt-5">
    <form method="POST">
        <h4 class="text-center">Submit new post</h4>
        <div class="col-10 offset-1">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <textarea id="editor" name="text" cols="97" rows="5" class="mb-3"></textarea>
            <br>
            <div class="form-group text-center">
                <button class="btn btn-primary" id="submit" type="submit" name="submit">Submit new post</button>
            </div>
        </div>
    </form>
</div>

</body>

<script>
    $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })
</script>
<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</html>