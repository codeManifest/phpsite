<?php 
include_once '../config/config.php';
$Id=$_GET['Id'];
$msg='';

if (isset($_POST['Update'])) {
$Id=$_GET['Id'];

    $category_Name=$_POST['category_Name'];
    
    $is_exists= mysqli_query($conn, "SELECT * FROM category WHERE category='$category_Name'");
    $count= mysqli_fetch_assoc($is_exists ) ;
    if (mysqli_num_rows($is_exists) > 0) {
        # code...
        echo "Duplicate entry";
    }else{

        $query_run=mysqli_query($conn,"UPDATE category SET category='$category_Name' WHERE Id='$Id'");
        header('location:dashboard.php?action=category');
    }




        


        
        
    
    # code...
}

?>

<section class="h-[50vh]  "  >
        <div>

        
        <h1 class="text-xl font-semibold " >Add new Category</h1>
        
    <form action="" method="POST" " >
    <?php 
    
    $sql="SELECT * FROM category WHERE Id = '$Id'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

   
    
    


    

    
    ?>
        
<div>

    <input type="text" name="category_Name" id="" value='<?php echo $row['category'] ?>' placeholder="Update category"  class=" mt-6 shadow-lg rounded-lg px-4 py-2" >
    <input type="submit" value="Update" name="Update"  class="shadow-lg bg-green-400 mx-3 rounded-lg px-8 text-white py-2 " >
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
    </section>