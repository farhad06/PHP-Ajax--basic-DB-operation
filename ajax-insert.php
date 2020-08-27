<?php 
$email=$_POST['email'];
$password=$_POST['psw'];
$connection=mysqli_connect('localhost','root','','login') or die('Connection Failed');
$sql="INSERT INTO students (email,password) VALUES ('{$email}','{$password}')";
//$result=mysqli_query($connection,$sql) or die("Insertion Failed");
if(mysqli_query($connection,$sql)){
    echo 1;
}else{
    echo 0;
}




?>