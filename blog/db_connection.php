<?php
$server="localhost";
$username="root";
$password="";
$dbname="messages";
$conn=mysqli_connect($server,$username,$password,$dbname);
if(!$conn){
    die ('Failed to Connect DataBase'.mysqli_connect_errno());
}


?>