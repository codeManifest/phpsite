<section>

    <?php require_once '../config/config.php';
    include_once 'functions.inc.php';
    //  require_once '../config/default_Data.php';
    

    if (isset($_POST['submit'])) {
     $product_Name = $_POST['product_name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $C_size = $_POST['size'];
        $colors = $_POST['color'];
        $delivery_charge = $_POST['delivery_charge'];
        $discount = $_POST['discount'];
        $file_name=$_FILES['images']['name'];
    $tmp_name=$_FILES['images']['tmp_name'];
    $file_size=$_FILES['images']['size'];
    $file_error=$_FILES['images']['error'];
    $file_type=$_FILES['images']['type'];


    $allowed_types=[ 'jpg','png','svg','jpeg'];
    $file_extentions=pathinfo($file_name,PATHINFO_EXTENSION);
    
    
    
    
    if (in_array($file_extentions, $allowed_types)) {
        $upload_dir='Uploads/products/';

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
       
        
        
        $unique_name=time().'_'.$file_name;
        $upload_path= $upload_dir . $unique_name;



        if (move_uploaded_file($tmp_name,$upload_path)) {
            // $new_image_path=$upload_path;

           
            
            
            // $old_image_path= "SELECT profile_pic FROM users WHERE Id = $Id";
           
            // $oldimagequery=$conn->query($old_image_path);
            // if (file_exists($old_image_path)) {
            //  unlink($old_image_path); // Delete the old image file
            // }
            
            
            // insert code here

            $query = "INSERT INTO product (product_name, price, stock, category_Id, C_size_Id, colors_Id, delivery_charge, discount,) VALUES ('$product_Name', '$price', '$stock', '$category', '$C_size', '$colors', '$delivery_charge', '$discount')";
            $query="INSERT INTO images (images) values ('$unique_name')";
           

        if ($conn->query($query) === TRUE) {
            ?>
            <script>

                let reloadWindow = window.location.href = 'dashboard.php?action=insert';
            </script>

            <?php



        } else {
            echo "Error inserting into product table: " . $conn->error;
        }
        ;
            
            if ($conn->query($queryforUpdate) === TRUE) {


                
                echo "Data inserted successfully";
                header('location:http://localhost/shogoup/phpsite/admin/dashboard.php?action=users');
                
            } else {
                echo "Error inserting into product table: " . $conn->error;
            };
            
           
            # code...
        }
        # code...
    }
        


        // $category_id = isset($_POST['category']) ? $_POST['category'] : 0;

        


        
    }




    ?>
    <div>
        <form action="" method="POST" class="min-w-full text-md font-semibold" enctype="multipart/form-data">
            <div class="form-wrapper flex items-center gap-3 justify-center max-sm:flex max-sm:flex-col ">

                <div class="frm-grp max-sm:w-full">
                    <label for="">Product Name</label> <br>
                    <hr class="py-1">
                    <input class="py-1 px-3 max-sm:w-full max-sm:px-1" type="text" name="product_name" id=""
                        placeholder="Product Name">
                </div>
                <div class="frm-grp  max-sm:w-full">
                    <label for="">Category</label> <br>
                    <hr class="py-1">
                    <select class="py-1 px-3 max-sm:w-full max-sm:px-1" name="category" id="category">


                        <?php
                        $query5 = "SELECT * FROM category ";
                        $result = $conn->query($query5);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                        <option value='$row[Id]'>$row[category]</option>
                        ";

                                # code...
                            }
                            ;
                            # code...
                        }


                        ?>

                        <!-- <option value="3">Electronics</option>
            <option value="4">Kitchen</option>
            <option value="5">Foods</option>
            <option value="6">shoes</option>
            <option value="7">Toys</option>
            <option value="8">Stationary</option> -->
                    </select>
                </div>
                <div class="frm-grp max-sm:w-full" id="color">
                    <label for="">Color</label> <br>
                    <hr class="py-1">
                    <select class="py-1 px-3 max-sm:w-full max-sm:px-1" name="color">



                        <?php
                        $query5 = "SELECT * FROM colors ";
                        $result_C = $conn->query($query5);
                        if ($result_C->num_rows > 0) {
                            while ($row = $result_C->fetch_assoc()) {
                                echo "
                        <option value='$row[Id]'>$row[colors]</option>
                        ";

                                # code...
                            }
                            ;
                            # code...
                        }


                        ?>

                    </select>
                </div>
                <div class="frm-grp max-sm:w-full" id="size">
                    <label for="">Size</label> <br>
                    <hr class="py-1">
                    <select class="py-1 px-3 max-sm:w-full max-sm:px-1 " name="size" id="">



                        <?php
                        $query5 = "SELECT * FROM c_size ";
                        $result_size = $conn->query($query5);
                        if ($result_size->num_rows > 0) {
                            while ($row = $result_size->fetch_assoc()) {
                                echo "
                        <option value='$row[Id]'>$row[C_size]</option>
                        ";

                                # code...
                            }
                            ;
                            # code...
                        }
                        ;


                        ?>
                        <!-- <option value="3">L</option>
            <option value="4">XL</option>
            <option value="5">XXL</option>
            <option value="6">XXXL</option> -->
                    </select>
                </div>
                <div class="frm-grp max-sm:w-full">
                    <label for="">Quantity</label> <br>
                    <hr class="py-1">
                    <input type="number" name="stock" id="" placeholder=" in Stocks"
                        class="py-1 px-2 w-[160px] max-sm:w-full max-sm:px-1 ">
                </div>
            </div>
            <div class="form-wapper flex items-center gap-3 justify-center max-sm:flex max-sm:flex-col  py-5">

                <div class="frm-grp max-sm:w-full">
                    <label for="">Price</label> <br>
                    <hr class="py-1">
                    <input class="py-1 px-3 max-sm:w-full max-sm:px-1 " type="text" name="price" id=""
                        placeholder="Price">
                </div>
                <div class="frm-grp max-sm:w-full">
                    <label for="">Discount(%)</label> <br>
                    <hr class="py-1">
                    <input class="py-1 px-3 max-sm:w-full max-sm:px-1" type="number" name="discount" id=""
                        placeholder="discount">


                </div>
                <div class="frm-grp max-sm:w-full">
                    <label for="">Delivery Charge</label> <br>
                    <hr class="py-1">
                    <input class="py-1 px-3 max-sm:w-full max-sm:px-1 " type="number" name="delivery_charge" id=""
                        placeholder="Delivery charge">




                </div>


            </div>
            <div class="form-wapper flex items-center gap-3 justify-center  py-5">



                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-[200px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1mb)</p>
                        </div>
                        <input id="dropzone-file" type="file" multiple accept="image/*" name="images"
                            class="hidden images" onchange="displaySelectedImages(event)" />
                    </label>
                </div>

            </div>

            <h2 class="py-2">Preview Image :</h2>
            <div id=" " class="w-[120px] imagePreview flex gap-2"></div>
            <div class="py-6 flex  justify-between items-center  w-full">

                <input type="submit" value="Add Product" name="submit"
                    class=" ml-auto rounded-lg hover:bg-blue-400 py-3 px-3 bg-blue-500 text-white">
            </div>
        </form>
</section>
<?php
$conn->close();
?>
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
    function showhideFields() {
        let category = document.querySelector("#category")
        category.addEventListener("change", (e) => {
            let option = e.target.value
            console.log(option);
            switch (option) {
                case 'Foods': case 'Stationary': case 'Kitchen': case 'Electronics': case 'Beauty':
                    document.querySelector("#size").classList.add("hidden")
                    document.querySelector("#color").classList.add("hidden");

                    break;

                case 'Garments':
                    document.querySelector("#size").classList.remove("hidden")

                    break;
                case 'Toys':
                    document.querySelector("#size").classList.add("hidden")

                    document.querySelector("#color").classList.remove("hidden");

                    break;

                case 'shoes':
                    document.querySelector("#color").classList.remove("hidden")
                    document.querySelector("#size").classList.add("hidden")


                    break;




                default:
                    document.querySelector("#size").classList.remove("hidden");
                    document.querySelector("#color").classList.remove("hidden");


                    break;
            }


        })

    }
    showhideFields()


</script>