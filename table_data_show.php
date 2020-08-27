<?php 
    $connection=mysqli_connect('localhost','root','','login') or die("Connection faield");
    $query="SELECT * FROM students";
    $result=mysqli_query($connection,$query) or die("Failed");
$output="";
    if(mysqli_num_rows($result)>0){
        $output='<table border="1" width="100%",cellspacing="0",cellpadding="10px">
                    <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Edit</th>
        
        </tr>';
        while($row= mysqli_fetch_assoc($result)){
            $output.="<tr><td>{$row['id']}</td><td>{$row['email']}</td><td>{$row['password']}</td><td><button class='delete-btn' data-id='{$row['id']}'>Delete</button</td><td><button class='edit-btn' data-eid='{$row['id']}'>Edit</button</td></tr>";
            
        }
        $output.="<table>";
        //mysqli_close();
        echo $output;
    }else{
        echo "not found";
    }
    

?>
