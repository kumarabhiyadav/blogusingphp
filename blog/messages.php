<?php
session_start();
include('db_connection.php');

?>
<?php
if($_SESSION['uid']){
    echo 'Welcome'.$_SESSION['uid'];
    if(isset($_POST['submit'])){
        $msg=mysqli_real_escape_string($conn,$_POST['post']);
        $sql="INSERT INTO msgs(Message) VALUES('$msg')";
        if(mysqli_query($conn,$sql)){
           // $regsuccess='You are Registered';
             //header('Location:index.php');
            
            }else{
             echo 'Failed to Inserted'.mysqli_error($conn);
           }
    
        }
    

}
else{
    header('Location:index.php');
}

?>
<?php
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
    <a href="logout.php">Logout</a>
    </header>
    <form action="messages" method="POST">
  <div class="form-group">
    <label for="po">Post:</label>
    <textarea class="form-control" name="post" placeholder="Enter Your Post"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Post✔</button>
    </form>
</body>
</html>
<?php
include_once('footer.php');
?>
<?php
 
 ?>