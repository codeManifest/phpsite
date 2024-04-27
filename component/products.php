<?php  

$sql = mysqli_select_db($conn, $database);


?>

<div class="min-h-[40vh] bg-white  ">
    <h1 class="pt-2 pb-4 text-xl font-semibold" >Best Women Deal</h1>

    <?php 


    $sql="SELECT * FROM product ";
    $result=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_assoc($result)) {
        

    ?>

    <div class="min-h-[20vh] flex gap-3  justify-center flex-wrap  " >
        <div class="bg-white min-w-[20%] max-sm:w-full shadow-md overflow-hidden " >
            <img src="Uploads/product/<?php echo"$row[images_Id]"?> " alt="" class="m-auto   min-w-[30%] max-w-[30%]   my-2 ">

            <span class="px-1 py-1 bg-red-500 text-white my-2">  <?php echo "$row[discount]% off" ?> </span> <span class=" px-2 text-red-500 text-sm font-semibold ">limited time deal</span>
            <h1 class="px-2 py-3 font-medium" ><?php echo "$row[product_name]" ?></h1>
</div>
        
<?php  } ?>

</div>