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
include_once '../../config/config.php';











$Id = $_GET['Id'];
if (isset($_POST['Update_btn']) ) {
    $Id=$_POST['Id']; 

   $name = $_POST['name'];
    
   //    echo $username = $_POST['username'];
   
   $email = $_POST['email'];
   // $_Role = $_POST['_Role'];
   $file_name=$_FILES['new_profile_pic']['name'];
    $tmp_name=$_FILES['new_profile_pic']['tmp_name'];
    $file_size=$_FILES['new_profile_pic']['size'];
    $file_error=$_FILES['new_profile_pic']['error'];
    $file_type=$_FILES['new_profile_pic']['type'];
    // $password=$_POST['password'];
    // $password=$_POST['C_password'];
    // $pass_hash=sha1($password,true);
    // $C_pass_hash=sha1($C_password,true);
     // Validate and sanitize inputs to prevent SQL injection
     //  $name = mysqli_real_escape_string($conn, $name);
    //  // $username = mysqli_real_escape_string($conn,$username);  // Assuming username is a float, adjust if necessary
    //  $email = mysqli_real_escape_string($conn,$email);    // Assuming email is an integer, adjust if necessary
    //  $_Role = intval($_Role);    // Assuming email is an integer, adjust if necessary
    

    

    
    
        
        $allowed_types=[ 'jpg','png','svg','jpeg'];
        $file_extentions=pathinfo($file_name,PATHINFO_EXTENSION);
        
        
        
        
        if (in_array($file_extentions, $allowed_types)) {
            $upload_dir='Uploads/profiles/';
            
            
            $unique_name=time().'_'.$file_name;
            $upload_path= $upload_dir . $unique_name;



            if (move_uploaded_file($tmp_name,$upload_path)) {
                // $new_image_path=$upload_path;

               
                
                
                // $old_image_path= "SELECT profile_pic FROM users WHERE Id = $Id";
               
                // $oldimagequery=$conn->query($old_image_path);
                // if (file_exists($old_image_path)) {
                //  unlink($old_image_path); // Delete the old image file
                // }
                
                
                $queryforUpdate = "UPDATE users SET _name='$name', email='$email',profile_pic='$unique_name ' WHERE Id=$Id";
                
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





    }


    

   
    // Assuming email is an integer, adjust if necessary

    // Use single quotes for string values in the SQL query

    // Execute the update query
   

    





# code...


 
//  code  for displaing data of USerS 


$users = "SELECT * FROM users  WHERE Id = $Id  ";
// echo $Id;

$result_list = $conn->query($users);

if ($result_list) {
    if ($result_list->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result_list)) {


            ?>



            <body>
                <section class="px-10 py-10 bg-gray-100  ">
                    <div>
                        <h1 class="font-semibold text-xl py-2">Edit User <span type="text" name="Id"' class="p-2 bg-gray-400 text-white font-semibold rounded-lg " >  <?php echo $row['Id'] ?> </span> </h1>
                <hr class="py-5">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="min-w-full text-md font-semibold" enctype="multipart/form-data" >
                <div class="form-wrapper flex items-center gap-3 justify-center ">



                




                
                    <div class="frm-grp" hidden  >
                        <label for="">Id no</label> <br>
                        <hr class="py-1" >
                    <input class="py-1 px-3" type="text" name="Id" value=' <?php echo $row['Id'] ?> '  id="" placeholder="Id" >
                    </div>
                    <div class="frm-grp">
                        <label for="">Name</label> <br>
                        <hr class="py-1" >
                    <input class="py-1 px-3" type="text" name="name" value=' <?php echo $row['_name'] ?> ' id="" placeholder="Your Name">
                    </div>
                    <div class="frm-grp">
                        <label for="">Username</label> <br>
                        <hr class="py-1" >
                    <input class="py-1 px-3 text-gray-500 bg-gray-200" type="text" name="username" value=' <?php echo $row['Username'] ?> ' id="" disabled>
                    </div>
                    <div class="frm-grp">
                        <label for="">Email</label> <br>
                        <hr class="py-1" >
                    <input class="py-1 px-3" type="email" name="email" value=' <?php echo $row['email'] ?> ' id="" placeholder="your Email">
                    </div>
        
        
                    <div class="frm-grp">
                        <label for="">Role</label> <br>
                        <hr  class="py-1"  >
                        <select class="py-1 px-3" name="_Role" id="">
                            <?php

                            //     $query_size= " SELECT * FROM users  ";
                            //     $result_size= mysqli_query($conn,$query_size) or die("query failed");
                            //     if (mysqli_num_rows($result_size)> 0) {
                            //         # code...
                
                            //         while ($row1=mysqli_fetch_assoc($result_size)) {
                            //             # code...
                            //             if ($row['C_size_Id']==$row1['Id']) {
                            //                 $selected="selected";
                
                            //                 # code...
                            //             }else{
                            //                 $selected="";
                

                            //             }
                            //    echo" <option  {$selected } value='$row1[Id]'> $row1[C_size]</option >";
                

                            //         }
                            //     }
                
                            ?>
            
                    </select>
                </div>
                   
                    </div>
                    
                        
                    


                    </div>
                    <div class="form-wapper flex items-center gap-3 justify-center  py-5">



                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 1mb)</p>
                                </div>
                                <input id="dropzone-file" type="file"  accept="image/*" name="new_profile_pic"
                                    class="hidden images" onchange="displaySelectedImages(event)" />
                            </label>
                        </div>

                    </div>

                    <h2 class="py-2">Preview Image :</h2>
                    <div id=" " class="w-[120px] imagePreview "></div>
                    <img src='Uploads/profiles/<?php echo $row['profile_pic'] ?>' alt="" class="imagePreview   w-[100px]" >
                    <div class="py-2 flex  justify-between items-center  w-full">


                        <input type="submit" name="Update_btn" value="Update"
                            class=" ml-auto rounded-lg bg-green-500 hover:bg-green-400 py-3 px-5  text-white">
                    </div>

                <?php

        }
        ;
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