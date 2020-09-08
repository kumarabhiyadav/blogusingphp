<?php
session_start();
include('db_connection.php');
$error=''; 

?>
<?php
//Start of Getting data From Database
if($_SESSION['uid']){
    $userid=$_SESSION['uid'];
     $sql="SELECT * FROM posts WHERE Userid='$userid'";
     $result=mysqli_query($conn,$sql);
     $messages=mysqli_fetch_all($result,MYSQLI_ASSOC);
    //print_r($messages);
    //echo 'Welcome'.$_SESSION['uid'];

  //End of Getting data From Database and stored in variable $messages
  //Start of posting 
    if(isset($_POST['submit'])){
   
      $msg=mysqli_real_escape_string($conn,$_POST['post']);
        if(empty($msg))
        {
           $error='Post can not be Empty';
        }
        else
        {
          $sql="INSERT INTO posts(Userid,Messages) VALUES('$userid','$msg')";
        if(mysqli_query($conn,$sql)){
          //For Send Posts To data Base
            
            }else{
             echo 'Failed to Inserted'.mysqli_error($conn);
           }
    
        }
      }
    

}
else{
    header('Location:index.php');
}
//End of Posting
?>

<?php
//include_once('db_connection.php');

?>
<!-- Start of Navigation bar-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
 
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Blog</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
   
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="color: #e6e7ec">
        <!-- <a class="nav-link" style="color: #e6e7ec" href="#"> -->
      <?php echo "Welcome, " . $_SESSION['username']; ?>
        <!-- <span class="sr-only">(current)</span></a> -->
      </li>
      
    </ul>
    <a href="/logout.php">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </a>
    
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<!--End Of Navigation bar-->

<!--Start Print of Posts-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Posts</title>
    </head>
    <body>
    <div class="container">
    <?php foreach($messages as $messager) {?>
     <div class="card text-center" >
  <div class="card-body">
    <h5 class="card-title"><?php echo htmlspecialchars($messager['Messages'])?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($messager['Date'])?></h6>
    <!--Delete Button-->
   <a class="card-link text-danger" href="deletepost.php?id=<?php echo $messager['id']?>">Delete</a>
   <!--End Of Delete Button-->
  </div>
</div>
    <?php   } ?>
    <!--Input For Post-->
    <form name="postForm" action="usersession.php" method="POST">
  <div class="form-group">
    <label for="posts">Post:</label>
    <textarea class="form-control" name="post" placeholder="Enter Your Post here"></textarea>
    <div class="text-danger"><?php echo $error;?></div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary postbtn">Post✔</button>
 <!--End of Input For Post-->
    </form>
    </div>

<!--End of Print of Posts-->
    <script>
 {
   //javaScript for Clear input field
  document.getElementById("postForm").reset();
}
</script>

</body>
</html>




<?php
include_once('footer.php');
?>
<?php
 
 ?>