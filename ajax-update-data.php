<?php 
$stu_id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
//$password=$_POST['psw'];
$connection=mysqli_connect('localhost','root','','login') or die('Connection Failed');
$sql="UPDATE students SET email = '{$email}' , password = '{$password}' WHERE id = '{$stu_id}' ";
//$result=mysqli_query($connection,$sql) or die("Insertion Failed");
//echo $sql;
if(mysqli_query($connection,$sql)){
    echo 1;
}else{
    echo 0;
}


?>