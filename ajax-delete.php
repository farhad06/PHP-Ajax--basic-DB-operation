<?php 
$id=$_POST['id'];
//$password=$_POST['psw'];
$connection=mysqli_connect('localhost','root','','login') or die('Connection Failed');
$sql="DELETE FROM students WHERE id='{$id}'";
//$result=mysqli_query($connection,$sql) or die("Insertion Failed");
if(mysqli_query($connection,$sql)){
    echo 1;
}else{
    echo 0;
}


?>