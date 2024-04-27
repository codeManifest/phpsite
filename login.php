<?php  
session_start();
if ( isset($_SESSION['username']))  {
    header('location:admin/dashboard.php'
);

    # code...
}

$serverName = "localhost";
$username = "root";
$password = "";
$database = "shogo";

$conn = new mysqli($serverName, $username, $password);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$sql = mysqli_select_db($conn, $database);
$err_msg='';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="./style/style.css">
     
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

</head>
<body>
    <?php include_once './component/nav.php' ?>
    
    <section class="h-screen  flex bg-[url('./img/bglogin.png')] object-cover bg-left" >

<div class="w-[50vw] max-sm:w-[0]" ></div>
<div class="w-[50vw] p-10 max-sm:p-6  backdrop-blur-sm bg-black/30 flex flex-col  max-sm:w-full max-sm:px-2  " >
    <h1 class="text-white font-semibold text-4xl p-3" >Sign In</h1>
    <?php 
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['login'])) {

    $_password=sha1($_POST['password'], true) ;
    $_username=$_POST['username'] ;
    
    $sql="SELECT Id,_name,Username,_Role,profile_pic FROM users WHERE username='$_username' AND _password='$_password'";
    
    $result_login=mysqli_query($conn,$sql) or die('query failed');

    if (mysqli_num_rows($result_login)> 0) {
        while ($row=mysqli_fetch_assoc($result_login)) {
            
            session_start();
            $_SESSION['user_id']=$row['Id'];
            $_SESSION['username']=$row['Username'];
            
            $_SESSION['user_role']=$row['Role'];
            $_SESSION['profile_img']=$row['profile_pic'];
            header('location:admin/dashboard.php');

            # code...
        }
        
        # code...
    }else{
        $err_msg= " <div class=' italic py-1 px-2  text-white bg-red-400 text-center' > * Please Enter Correct Credential. </div>
        ";
    }


    # code...
}



    
    ?>


<form action='<?php $_SERVER['PHP_SELF'] ?>' method="POST">
    
    
    <div class="frm-grp flex flex-col mx-12 max-sm:m-1 gap-1  my-auto ">
        <label class="text-white text-lg" for="">UserName</label>
        <input type="text" name="username" id="" class="py-2 px-3 rounded-lg  " placeholder="UserName" autocomplete="false"  >
    </div>
    <div class="frm-grp flex flex-col mx-12 max-sm:m-1 gap-1 ">
        <label class="text-white text-lg" for="">password</label>
        <input type="password" name="password" id="" class="py-2 px-3 rounded-lg  " placeholder="Password" required >
        <?php echo $err_msg; ?> 
    </div>
    <div class="frm-grp flex flex-col mx-12 gap-2 max-sm:mx-1 max-sm:w-full mt-5 w-1/2  ">
        
        <button class="px-3 mx-3 py-2 bg-blue-500 text-white rounded-lg" name="login" >Sign In</button>
        <p class="text-white text-lg mx-3" >Create an Account ? <a class="text-zinc-200 text-lg font-semibold" href="Signup.php">Sign Up</a></p>
    </div>

    </form>

</div>

    </section>
    
</body>
</html>