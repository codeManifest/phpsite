<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

</head>

<body>

<section>

<?php
include_once '../../config/config.php';

 

//  require_once '../config/default_Data.php';


if (isset($_POST['submit'])) {
    $_name = $_POST['_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $C_password = $_POST['confirm_password'];

    $file_name=$_FILES['profile_pic']['name'];
    $tmp_name=$_FILES['profile_pic']['tmp_name'];
    $file_size=$_FILES['profile_pic']['size'];
    $file_error=$_FILES['profile_pic']['error'];
    $file_type=$_FILES['profile_pic']['type'];

    if (isset($_FILES['profile_pic']) && $file_error === 0 ) {


        $allowed_types=[ 'jpg','png','svg','jpeg'];
        $file_extentions=pathinfo($file_name,PATHINFO_EXTENSION);
        if (in_array($file_extentions,$allowed_types)) {
            $upload_dir='Uploads/profiles/';

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }


            $unique_name=time().'_'.$file_name;
            $upload_path= $upload_dir . $unique_name;

            if (move_uploaded_file($tmp_name,$upload_path)) {

                $pass_hash=sha1($password,true);
                $C_pass_hash=sha1($C_password,true);
            
                $query = "INSERT INTO users ( _name, username, email, _password, confirm_password,profile_pic ) VALUES ('$_name', '$username', '$email', '$pass_hash', '$C_pass_hash','$unique_name')";
            
                if ($conn->query($query) === TRUE) {
                    echo "Data inserted successfully";
                        header('location:http://localhost/shogoup/phpsite/admin/dashboard.php?action=users');
                   
                } else {
                    echo "Error inserting into product table: " . $conn->error;
                };
                # code...
            }
            # code...
        }

        # code...
    }



    // $Roles = $_POST['_Role'];
    // $profile_Pic = $_FILES['profile_pic'];
    
}




?>
<div>
<form action='<?php $_SERVER['PHP_SELF']; ?>' method="POST" class="min-w-full text-md font-semibold" enctype="multipart/form-data" >
    <div class="form-wrapper flex items-center flex-col m-10   gap-3 justify-center max-sm:flex max-sm:flex-col ">

        <div class="frm-grp  max-sm:w-full w-1/2">
            <label for="">Your Name</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" type="text" name="_name" id="" placeholder="Yours Name">
        </div>
        <div class="frm-grp  max-sm:w-full w-1/2">
            <label for="">Username</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" type="text" name="username" id="" placeholder="User Name">
        </div>
        <div class="frm-grp  max-sm:w-full w-1/2">
            <label for="">Email</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" type="text" name="email" id="" placeholder="Email">
        </div>
        <div class="frm-grp  max-sm:w-full w-1/2">
            <label for="">Password</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" type="password" name="password" id="" placeholder="Password">
        </div>
        <div class="frm-grp  max-sm:w-full w-1/2">
            <label for="">Confirm Password</label> <br>
            <hr class="py-1" >
            <input class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" type="password" name="confirm_password" id="" placeholder="Confirm Password">
        </div>
        <div class="frm-grp   max-sm:w-full w-1/2">
            <label for="">Roles</label> <br>
            <hr  class="py-1"  >
            <select  class="py-1 px-3 max-sm:w-full w-full max-sm:px-1" name="_Role" id="role">
                

                <?php 
                // $query5="SELECT * FROM Roles ";
                // $result=$conn->query($query5);
                // if ($result->num_rows>0) {
                //     while ($row=$result->fetch_assoc()) {
                //         echo"
                //         <option value='$row[Id]'>$row[category]</option>
                //         ";

                //         # code...
                //     };
                //     # code...
                // }
                
                
                ?>

            <!-- <option value="3">Electronics</option>
            <option value="4">Kitchen</option>
            <option value="5">Foods</option>
            <option value="6">shoes</option>
            <option value="7">Toys</option>
            <option value="8">Stationary</option> -->
        </select>
    </div>
        
       
    
<div class="form-wapper flex items-center gap-3 justify-center w-1/2  py-5">
    

    
<div class="flex items-center justify-center w-full">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-[200px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1mb)</p>
        </div>
        <input id="dropzone-file" type="file"  accept="image/jpg" name="profile_pic"  class="hidden images" onchange="displaySelectedImages(event)" />
    </label>
</div> 

</div>

<h2 class="py-2">Preview Image :</h2>
<div id=" " class="w-[120px] imagePreview flex gap-2"></div>
<div class="py-6 flex  justify-between items-center  w-full" >

    <input type="submit" value="Save" name="submit" class=" mx-auto rounded-lg hover:bg-blue-400 py-3 px-7 w-1/2 bg-blue-500 text-white" >
</div>
</form>
</section>
</body>
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
// function showhideFields() {
//     let category=document.querySelector("#category")
//     category.addEventListener("change",(e)=>{
//         let option= e.target.value
//         console.log(option);
//         switch (option) {
//             case 'Foods': case 'Stationary': case 'Kitchen': case 'Electronics': case 'Beauty': 
//                 document.querySelector("#password").classList.add("hidden")
//                 document.querySelector("#color").classList.add("hidden");
                
//                 break;
                
//             case 'Garments':
//                 document.querySelector("#size").classList.remove("hidden")
                
//                 break;
//             case 'Toys': 
//                 document.querySelector("#size").classList.add("hidden")

//                 document.querySelector("#color").classList.remove("hidden");

//                 break;

//                 case 'shoes':
//                     document.querySelector("#color").classList.remove("hidden")
//                 document.querySelector("#size").classList.add("hidden")

                
//                     break;


            
        
//             default:
//             document.querySelector("#size").classList.remove("hidden");
//             document.querySelector("#color").classList.remove("hidden");


//                 break;
//         }


//     })
    
// }
// showhideFields()


</script>