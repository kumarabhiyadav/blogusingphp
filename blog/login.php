<?php
session_start();
include_once('header.php');
include_once('db_connection.php');
if(!isset($_SESSION['uid'])){
$error='';

if(isset($_POST['submit']))
{
 
  $email=htmlspecialchars($_POST['email']);
  $password=htmlspecialchars($_POST['password']);
  //echo $email;
  //echo $password;
 
  $sql="SELECT * FROM login WHERE Email='$email'AND Password='$password'";
  $result=$conn->query($sql);
  if($result->num_rows>0){
   $user=$result->fetch_assoc();
   //var_dump($user);
   $_SESSION['uid']=$user['id'];
   $_SESSION['username']=$user['Name'];

   header('Location:usersession.php');
  }

  else{ 
    $error='Invalid Email OR Password';
  
}
$conn->close();
}}
else{
  header('Location:usersession.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="stylesheet" href="./css/style.css">
  <title>Login</title>
</head>
<body>
<h1 class="text-center">Login</h1>
<form class="container form border" action="login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

</div>
   <div class="form-group">
    <label for="exampleInputtext1">Password:</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <div class="text-danger"><?php echo $error;?></div>
</div>
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>
  
</body>
</html>
<?php
include_once('footer.php');

?>