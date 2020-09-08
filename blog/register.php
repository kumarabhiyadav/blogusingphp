
<?php
include('header.php');
include('db_connection.php');
//$conn is connection function in db_connect.php for connection
//DataBase name 'messages'.'login',posts 
//name of Content in data base are id,Email, Name, Password, Date
    $regsuccess='';
    $email=$name=$password='';
    $errors=array('email'=>'','name'=>'','password'=>'');
  
if(isset($_POST['submit']))
{   
    $email=htmlspecialchars($_POST['email']);
    $name=htmlspecialchars($_POST['name']);
    $password=htmlspecialchars($_POST['password']);
    //Check Email
  if(empty($_POST['email']))
    {
        $errors['email']='A e-mail is required';
    }
    //check name Should not be empty or Number OR Special Characters
    if(empty($_POST['name']))
    {
        $errors['name']='A name is required';
    }
    else{
            if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
                $errors['name']='A valid name is require';  
            }
        }
        //Check password  Should Not be Empty
    if(empty($_POST['password']))
    {
        $errors['password']='A password is required';
    }
    
      //Checking all Errors
  if(array_filter($errors))
  { 
    //echo 'Some Error in Form';
  }else{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    //create sql for data entry
     $sql="INSERT INTO login(Email,Name,Password) VALUES('$email','$name','$password')";
        //Send Data to DataBase then move to submit.php to display
     if(mysqli_query($conn,$sql)){
      $regsuccess='You are Registered';
       //header('Location:index.php');
      
      }else{
       echo 'Failed to Inserted'.mysqli_error($conn);
     }
     
   // if form Completetly valid Move To submit.php
     
   header('Location:index.php');
  } 
}

 ?>
 <!--PHP End-->
 <!--HTML Page Start-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
<h1 class="text-center">Register</h1>
<form class="container form border" action="register.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
<div class="text-danger"><?php echo $errors['email'];?></div> 
</div>
  <div class="form-group">
    <label for="exampleInputtext1">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    <div class="text-danger"><?php echo $errors['name'];?></div> 
</div>
  <div class="form-group">
    <label for="exampleInputtext1">Password:</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Meassage">
    <div class="text-danger"><?php echo $errors['password'];?></div> 
</div>
  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>

</div>

<!--Start of Javascripts-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--End of Javascripts-->
</body>
</html>
<?php
include('footer.php');
?>