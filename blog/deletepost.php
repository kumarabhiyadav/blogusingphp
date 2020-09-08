 <?php
 session_start();
 include_once('db_connection.php');
if(isset($_GET['id']))
{
   $id=$_GET['id'];
   $sql="DELETE FROM posts WHERE id='$id'";
   if($conn->query($sql))
   {
       //deleted Successfully
       header('Location:usersession.php');
   }
   else{
       die('Some Want Wrong Error Code'.$conn->errno);
   }
}



?>