<?php 
    $stuID=$_POST['id'];
    $connection=mysqli_connect('localhost','root','','login') or die("Connection faield");
    $query="SELECT * FROM students WHERE id='{$stuID}'";
    $result=mysqli_query($connection,$query) or die("Failed");
    $output="";
    if(mysqli_num_rows($result)>0){
        //$output='';
        while($row= mysqli_fetch_assoc($result)){
            $output.="<tr>
                    <td>Name:</td>
                    <td><input type='text' id='edit-email' value='{$row["email"]}'></td>
                    <td><input type='text' id='edit-id' hidden  value='{$row["id"]}'></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' id='edit-psw' value='{$row["password"]}'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' id='edit-submit' value='Save'></td>
                </tr>";
                
            
        }
        //$output.="<table>";
        mysqli_close($connection);
        echo $output;
    }else{
        echo "not found";
    }
    

?>
