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
<body>
<section class="px-10 py-10 bg-gray-100" >
<div >
    <h1 class="font-semibold text-xl" >Edit Your Item</h1>
    <hr class="py-5">
<form action="" method="post" class="min-w-full text-md font-semibold" enctype="multipart/form-data" >
    <div class="form-wrapper flex items-center gap-3 justify-center ">

        <div class="frm-grp">
            <label for="">Product Name</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3" type="text" name="product" id="" placeholder="Product Name">
        </div>
        <div class="frm-grp">
            <label for="">Category</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="size" id="">
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
        <div class="frm-grp">
            <label for="">Color</label> <br>
            <hr  class="py-1"  >
            <select class="py-1 px-3" name="size" id="">
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
        <div class="frm-grp">
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
<div id=" " class="w-[120px] imagePreview "></div>
<div class="py-2 flex  justify-between items-center  w-full" >

    <input type="submit" value="Update" class=" ml-auto rounded-lg bg-green-500 hover:bg-green-400 py-3 px-5  text-white" >
</div>
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