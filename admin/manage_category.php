
    <?php

require_once '../config/config.php';
$msg="";




$category='';

if (isset($_POST['add'])) {
    $category=$_POST['category_Name'];

    $get_data="SELECT * FROM category WHERE category='$category'";
    $res=mysqli_query($conn,$get_data);
    $count=mysqli_num_rows($res);
    if ($count > 0) {
        $msg='Duplicate Entry';
        
        # code...
    }
    if ($msg=="") {
        // $class='text-green-500 italic';

        $sql=mysqli_query($conn, "INSERT INTO category (category) VALUES ('$category')");
        
        

        ?>
        <script>
            window.location.href='dashboard.php?action=category';
        </script>
        <?php
        
    }


    # code...
};

if (isset($_GET['type'])) {
    
    $Id=$_GET['Id'];
    $type=$_GET['type'];
    if ($type == 'delete') {
        $query_run=mysqli_query($conn,"DELETE FROM category WHERE Id =$Id ");
        
        echo"click in delete";
    }
    



    # code...
}

?>


    <section class="h-[50vh]  "  >
        <div>

        
        <h1 class="text-xl font-semibold " >Add new Category</h1>
        
    <form action="" method="POST" " >
        
<div>

    <input type="text" name="category_Name" id="" placeholder="Add category"  class=" mt-6 shadow-lg rounded-lg px-4 py-2" >
    <input type="submit" value="Add" name="add" class="shadow-lg bg-green-400 mx-3 rounded-lg px-8 text-white py-2 " >
</div>
<p for="" class=" font-medium mt-5 <?php
if ($msg=='') {

    echo 'text-green-600 italic  ';
}else{
    echo 'text-red-600';
}

 ?> ">

    <?php
    if ($msg!=='') {
        
        echo $msg;
       
    }

     ?> 
</p>








    </form>

    
    <table class="mt-10 w-[100%]  border " >
        <thead class="bg-slate-100" >

            <tr class="border">
                <th>ID.No</th>
                <th>Name</th>
                <th>Products</th>
                <th  >Action</th>
                
            </tr>
        </thead>
        <tbody class="first-of-type:" >
            <?php
            
            $sql_query="SELECT * FROM category";
            $res=mysqli_query($conn,$sql_query);
            while ($row=mysqli_fetch_assoc($res)) {

                # code...
            

            
            ?>
            <tr class="p-2 border text-center first-of-type:hidden " >
                <td   class="border" name='user_Id' >  <?php echo $row['Id'] ?></td>
                <td class="border" contenteditable="true" name="category_update"  ><?php echo $row['category'] ?></td>
                <td class="border" >6</td>
                <td class="p-1 flex items-center justify-center " >
                    <a  name=update href="http://localhost/shogoup/phpsite/admin/edit-category.php?action=category&type=edit&Id=<?php echo $row['Id']?>" id="edit_btn" class="mx-2   font-semibold  underline text-green-500 ">EDIT</a>
                    <a name=delete href="http://localhost/shogoup/phpsite/admin/dashboard.php?action=category&type=delete&Id=<?php echo $row['Id']?>"class="mx-2  font-semibold  underline text-red-600 ">DELETE</a>
                    
                </td>
                
                
            </tr>
            <?php } ?>
        </tbody>
        
        
    </table>

    







    
    
    </div>
    </div>

    </section>