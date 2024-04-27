

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <title>Dashboard</title>
</head>

<?PHP  
include_once '../config/config.php';







    
    
    
$Id = $_GET['Id'];

if (isset($_GET['Update'])) {
    $products = $_GET['product'];
    $price = $_GET['price'];
    $stock = $_GET['stock'];
    $delivery_charge = $_GET['delivery_charge'];
    $category = $_GET['category'];
    $colors = $_GET['color'];
    $size = $_GET['size'];
    $discount=$_GET['discount'];

    // Validate and sanitize inputs to prevent SQL injection
    $products = mysqli_real_escape_string($conn, $products);
    $price = floatval($price);  // Assuming price is a float, adjust if necessary
    $stock = intval($stock);    // Assuming stock is an integer, adjust if necessary
    $delivery_charge =doubleval($delivery_charge);    // Assuming stock is an integer, adjust if necessary
    $category = intval($category);    // Assuming stock is an integer, adjust if necessary
    $colors = intval($colors);    // Assuming stock is an integer, adjust if necessary
    $size = intval($size); 
    $discount = intval($discount); 
       // Assuming stock is an integer, adjust if necessary

    // Use single quotes for string values in the SQL query
    $query = "UPDATE product SET product_name='$products', price=$price, stock=$stock, delivery_charge=$delivery_charge,category_Id=$category,colors_Id=$colors,C_size_id=$size, discount=$discount WHERE Id=$Id";

    // Execute the update query
    $result_list = $conn->query($query);

    if ($result_list) {
        echo "Data updated successfully";
        header('location:dashboard.php?action=manage');
    } else {
        echo "Error updating data: " . $conn->error;
    }
}


       
    
        # code...

        




$allProducts= "SELECT p.Id, p.product_name, p.price,p.stock,p.delivery_charge, p.C_size_Id, p.colors_Id, p.category_Id,  p.discount,ca.category, cs.C_size,co.colors FROM product p
INNER JOIN  category ca  ON p.category_Id = ca.Id
INNER JOIN  colors co  ON  p.colors_Id = co.Id
INNER JOIN  C_size cs ON  p.C_size_Id = cs.Id  WHERE p.Id =$Id  ";
        // echo $Id;
        
        $result_list = $conn->query($allProducts);
        
        if ($result_list) {
            if ($result_list->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result_list)) {
                    

        ?>



<body>
<section class="px-10 py-10 bg-gray-100  " >
<div >
    <h1 class="font-semibold text-xl py-2" >Edit Your Item  <span type="text" name="Id"' class="p-2 bg-gray-400 text-white font-semibold rounded-lg " >  <?php echo $row['Id']  ?> </span> </h1>
    <hr class="py-5">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="min-w-full text-md font-semibold" enctype="multipart/form-data" >
    <div class="form-wrapper flex items-center gap-3 justify-center ">



    <?php
        
        
 
                      
 
 
     
 
 
 
 ?>




                
        <div class="frm-grp" hidden  >
            <label for="">Id no</label> <br>
            <hr class="py-1" >
        <input class="py-1 px-3" type="text" name="Id" value='<?php echo $row['Id'] ?> '  id="" placeholder="Id" >
        </div>
        <div class="frm-grp">
            <label for="">Product Name</label> <br>
            <hr class="py-1" >
        <input class="py-1 px-3" type="text" name="product" value='<?php echo $row['product_name'] ?> ' id="" placeholder="Product Name">
        </div>
        <div class="frm-grp">
            <label for="">Category</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="category" id="">
            <option value="">=SELECT=</option>

            <?php 
                
                $query_category= " SELECT * FROM category ";
                $result_category= mysqli_query($conn,$query_category) or die("query failed");
                if (mysqli_num_rows($result_category)> 0) {
                    # code...

                    while ($row1=mysqli_fetch_assoc($result_category)) {
                        # code...
                        if ($row['category_Id']==$row1['Id']) {
                            $selected="selected";

                            # code...
                        }else{
                            $selected="";


                        }
               echo" <option  {$selected } value='$row1[Id]'> $row1[category]</option >";


                    }
                }
                
                ?>
        </select>
    </div>
        <div class="frm-grp">
            <label for="">Color</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="color" id="">
            <option value="">=SELECT=</option>

                

                <?php 
                
                $query_colors= " SELECT * FROM colors  ";
                $result_colors= mysqli_query($conn,$query_colors) or die("query failed");
                if (mysqli_num_rows($result_colors)> 0) {
                    # code...

                    while ($row1=mysqli_fetch_assoc($result_colors)) {
                        # code...
                        if ($row['colors_Id']==$row1['Id']) {
                            $selected="selected";

                            # code...
                        }else{
                            $selected="";


                        }
               echo" <option  {$selected } value='$row1[Id]'> $row1[colors]</option >";


                    }
                }
                
                ?>
           
        </select>
    </div>
        <div class="frm-grp">
            <label for="">Size</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="size" id="">
            <option value="">=SELECT=</option>

                <?php 
                
                $query_size= " SELECT * FROM C_size  ";
                $result_size= mysqli_query($conn,$query_size) or die("query failed");
                if (mysqli_num_rows($result_size)> 0) {
                    # code...

                    while ($row1=mysqli_fetch_assoc($result_size)) {
                        # code...
                        if ($row['C_size_Id']==$row1['Id']) {
                            $selected="selected";

                            # code...
                        }else{
                            $selected="";


                        }
               echo" <option  {$selected } value='$row1[Id]'> $row1[C_size]</option >";


                    }
                }
                
                ?>
            
        </select>
    </div>
        <div class="frm-grp">
            <label for="">Quantity</label> <br>
            <hr  class="py-1"  >
            <input type="number" name="stock" id="" value='<?php echo $row['stock'] ?>' placeholder=" in Stocks" class="py-1 px-2 w-[160px] " >
    </div>
</div>
    <div class="form-wapper flex items-center gap-3 justify-center  py-5">

        <div class="frm-grp">
            <label for="">Price</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3" type="text" name="price" id="" value='<?php echo $row['price'] ?>' placeholder="Price">
        </div>
        <div class="frm-grp">
            <label for="">Discount(%)</label> <br>
            <hr  class="py-1"  >
            <input class="py-1 px-3" type="number" name="discount" value='<?php echo $row['discount'] ?>' id="" placeholder="discount">

            
    </div>
        <div class="frm-grp">
            <label for="">Delivery Charge</label> <br>
            <hr  class="py-1"  >
            <input class="py-1 px-3" type="number" name="delivery_charge" id="" value='<?php echo $row['delivery_charge'] ?>' placeholder="Delivery charge">

            
    
        
</div>


</div>
<div class="form-wapper flex items-center gap-3 justify-center  py-5">
    

    
<div class="flex items-center justify-center w-full">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1mb)</p>
        </div>
        <input id="dropzone-file" type="file" multiple accept="image/*" name="images[]"  class="hidden images" onchange="displaySelectedImages(event)" />
    </label>
</div> 

</div>

<h2 class="py-2">Preview Image :</h2>
<div id=" " class="w-[120px] imagePreview "></div>
<div class="py-2 flex  justify-between items-center  w-full" >
    

    <input type="submit" name="Update" value="Update" class=" ml-auto rounded-lg bg-green-500 hover:bg-green-400 py-3 px-5  text-white" >
</div>

<?php  

};
# code...
}

# code...
}


?>
</form>
</section>
<script>

function displaySelectedImages(event) {
            const previewContainer = document.querySelector('.imagePreview');
            previewContainer.innerHTML = ''; // Clear previous previews

            const files = event.target.files;

            for (const file of files) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result;
                    imgElement.classList.add('preview-image');

                    previewContainer.appendChild(imgElement);
                };

                reader.readAsDataURL(file);
            }
        }
</script>
    
</body>
</html>