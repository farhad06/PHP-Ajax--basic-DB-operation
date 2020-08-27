<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Table-Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="container">
            <h4 id="h4">PHP & Ajax Data Load</h4>
            <div id="search-bar"
                 <lable>Search:</lable>
        <input type="text" id="search" autocomplete="off">
        </div>
    <div id="button">
        <!--<input type="submit" id="load-data" value="Load" class="btn btn-primary">-->
    </div>
    <div id="insert">
        <form class="addForm">
            <table id="table-form">
                <tr>
                    Name:
                    <input type="text" name="email" id="email" placeholder="Enter your email" required>
                </tr>
                <tr>
                    Password:
                    <input type="password" name="psw" id="psw" placeholder="Enter your password" required>
                </tr>&nbsp;
                <tr>
                    <input type="submit" name="submit" id="save" value="Save" class="btn btn-success">&nbsp;
                </tr>
            </table>
        </form>
    </div>
    <table id="table-contain" border="1" cellpadding="0">
        <td id="table-data"></td>
    </table>
    <div id="modal">
        <div id="modal-form">
            <h4>Edit Form</h4>
            <hr>
            <table cellpadding="10px" width="100%">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" id="edit-email"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="edit-psw"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="edit-submit" value="Save"></td>
                </tr>


            </table>
            <div id="close-btn">X</div>
        </div>
    </div>
    </div>


<script src="jq/jQuery.js"></script>
<script>
    $(document).ready(function(){
        //show the data from database
        function loadTable(){
            $.ajax({
                url:"table_data_show.php",
                type:"POST",
                success:function(data){
                    $('#table-contain').html(data);
                }

            });
        }
        loadTable();
         //save the modal form data into database!! update data
     $(document).on("click","#edit-submit",function(){
         var stu_Id=$('#edit-id').val();
         var email=$('#edit-email').val();
         var password=$('#edit-psw').val();
        // alert(stuId);
        $.ajax({
             url:"ajax-update-data.php",
             type:"POST",
             data:{id:stu_Id,email:email,password:password},
             success:function(data){
                     if( data == 1){
                    $('#modal').hide();
                        loadTable();
                     }
                 
             }
             
         });
       });
        //insert into database
        $('#save').on("click",function(e){
            e.preventDefault();
            var email=$('#email').val();
            var psw=$('#psw').val();
            $.ajax({
                url:"ajax-insert.php",
                type:"POST",
                data:{email:email,psw:psw},
                success:function(data){
                    if(data == 1){
                        loadTable();
                        //alert("Data saved in to the Database");

                        $('.addForm').trigger("reset");
                    }else{
                        alert("Data not saved");
                    }
                }


            });
        });
        //Livesearch
        $('#search').on("keyup",function(e){
            var searchTerm=$(this).val();
            $.ajax({
                url:"ajax-search.php",
                type:"POST",
                data:{search:searchTerm},
                success:function(data){
                    $('#table-contain').html(data);
                }
            });
        });

    });
    //delete records from database
          $(document).on("click",".delete-btn",function(){
        if(confirm("Do U want to be deleted")){
            var id=$(this).data('id');
            var element=this;
            $.ajax({
                url:"ajax-delete.php",
                type:"POST",
                data:{id:id},
                success:function(data){
                    if(data==1){
                        $(element).closest("tr").fadeOut();
                    }else{
                        alert("Data not be deleted");

                    }
                }
            });
        }
    });
    //show modal box
   $(document).on("click",".edit-btn",function(){

        $('#modal').show();
        var stuId=$(this).data("eid");
        //alert(stuId);
        //show data into modal box
        $.ajax({
           url:"ajax-edit-data-show.php",
            type:"POST",
            data:{id:stuId},
            success:function(data){
                $('#modal-form table').html(data);
                
            }
        });
    });
    //hide modal box
    $('#close-btn').on("click",function(){
        $('#modal').hide();
    });
   

</script>

</body>
</html>