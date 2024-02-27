<section>

<?php require_once '../config/config.php';


if (isset($_POST['submit'])) {
    
    $product_Name=$_POST['product_name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    echo "$product_Name";
    $sql="INSERT INTO product( product_name,price,stock ) VALUES ('$product_Name',$price,$stock)";
    # code...
    if ($conn-> query($sql)===TRUE) {
        echo"DATA INSERTED /n";
        header('location:dashboard.php');

        # code...
    }
}



?>
<div>
<form action="" method="POST" class="min-w-full text-md font-semibold" enctype="multipart/form-data" >
    <div class="form-wrapper flex items-center gap-3 justify-center ">

        <div class="frm-grp">
            <label for="">Product Name</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3" type="text" name="product_name" id="" placeholder="Product Name">
        </div>
        <div class="frm-grp">
            <label for="">Category</label> <br>
            <hr  class="py-1"  >
            <select  class="py-1 px-3" name="category" id="category">
                <option value="">=SELECT=</option>
            <option value="Beauty">Beauty</option>
            <option value="Garments">Garments</option>
            <option value="Electronics">Electronics</option>
            <option value="Kitchen">Kitchen</option>
            <option value="Foods">Foods</option>
            <option value="shoes">shoes</option>
            <option value="Toys">Toys</option>
            <option value="Stationary">Stationary</option>
        </select>
    </div>
        <div class="frm-grp" id="color">
            <label for="">Color</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="color">
                <option value="">=SELECT=</option>
            <option value="Red">Red</option>
            <option value="white">white</option>
            <option value="Blue">Blue</option>
            <option value="Green">Green</option>
            <option value="Yellow">Yellow</option>
            <option value="Pink">Pink</option>
            <option value="Black">Black</option>
            <option value="Orange">Orange</option>
            <option value="Other">Other</option>
        </select>
    </div>
        <div class="frm-grp" id="size">
            <label for="">Size</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="size" id="">
                <option value="">=SELECT=</option>
            <option value="XSM">XSM</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="XXXL">XXXL</option>
        </select>
    </div>
        <div class="frm-grp">
            <label for="">Quantity</label> <br>
            <hr  class="py-1"  >
            <input type="number" name="stock" id="" placeholder=" in Stocks" class="py-1 px-2 w-[160px] " >
    </div>
</div>
    <div class="form-wapper flex items-center gap-3 justify-center  py-5">

        <div class="frm-grp">
            <label for="">Price</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3" type="text" name="price" id="" placeholder="Price">
        </div>
        <div class="frm-grp">
            <label for="">Discount(%)</label> <br>
            <hr  class="py-1"  >
            <input class="py-1 px-3" type="number" name="discount" id="" placeholder="discount">

            
    </div>
        <div class="frm-grp">
            <label for="">Delivery Charge</label> <br>
            <hr  class="py-1"  >
            <input class="py-1 px-3" type="number" name="delivery_charge" id="" placeholder="Delivery charge">

            
    
        
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
<div id=" " class="w-[120px] imagePreview flex gap-2"></div>
<div class="py-6 flex  justify-between items-center  w-full" >

    <input type="submit" value="Add Product" name="submit" class=" ml-auto rounded-lg hover:bg-blue-400 py-3 px-3 bg-blue-500 text-white" >
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
    let category=document.querySelector("#category")
    category.addEventListener("change",(e)=>{
        let option= e.target.value
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