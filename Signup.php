<?php  
session_start();
if ( isset($_SESSION['username']))  {
    header('location:admin/dashboard.php'
);

    # code...
}


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
    
    <?php

    
$serverName = "localhost";
$username = "root";
$password = "";
$database = "shogo";

$conn = new mysqli($serverName, $username, $password);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$sql = mysqli_select_db($conn, $database);


include_once './component/nav.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $pass_hash = sha1($password, TRUE);
    $C_pass_hash = sha1($confirm_password, TRUE);

    $chk_email = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($chk_email);

    if ($result->num_rows > 0) {
        echo " <p class='p-2 text-white bg-red-600'> Email already exists <span class='font-medium italic' >{$email} </span> </p>";
    } else {
        $query = "INSERT INTO users(_name, Username, email, _password, confirm_password) VALUES('$name', '$username', '$email', '$pass_hash', '$C_pass_hash')";
        if (mysqli_query($conn, $query)) {
            echo " <p class='p-2 text-white bg-red-600'> hii, <span class='font-medium italic' >{$name} </span>, Successfully Registerd </p>";

            header('location: login.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}


?>

    <section class="h-screen  flex bg-[url('./img/bglogin.png')] object-cover bg-left" >

<div class="w-[50vw] max-sm:w-[0]  " ></div>
<div class="w-[50vw] p-10 max-sm:p-4  backdrop-blur-sm bg-black/30 max-sm:w-full " >
    <h1 class="text-white font-semibold text-4xl p-3" >Sign Up</h1>

<form action='<?php $_SERVER['PHP_SELF'];  ?>' method="POST" >
    <div class="frm-grp flex flex-col mx-12 gap-1 max-sm:w-full max-sm:m-1 ">
        <label class="text-white text-lg" for="">Name</label>
        <input type="text" name="name" id="" class="py-2 px-3 rounded-lg  " placeholder="Name" required >
    </div>
    <div class="frm-grp max-sm:w-full max-sm:m-1 flex flex-col mx-12 gap-1 ">
        <label class="text-white text-lg" for="">email</label>
        <input type="text" name="email" id="" class="py-2 px-3 rounded-lg  " placeholder="email" required >
    </div>
    <div class="frm-grp max-sm:w-full max-sm:m-1 flex flex-col mx-12 gap-1 ">
        <label class="text-white text-lg" for="">UserName</label>
        <input type="text" name="username" id="" class="py-2 px-3 rounded-lg  " placeholder="UserName" autocomplete="false"  required>
    </div>
    <div class="frm-grp max-sm:w-full max-sm:m-1 flex flex-col mx-12 gap-1 ">
        <label class="text-white text-lg" for="">password</label>
        <input type="password" name="password" id="pass" class="py-2 px-3 rounded-lg  " placeholder="Password" >
    </div>
    <div class="frm-grp max-sm:w-full max-sm:m-1 flex flex-col mx-12 gap-1 ">
        <label class="text-white text-lg" for="">Confirm password</label>
        <input type="password" name="confirm_password" id="C_pass" class="py-2 px-3 rounded-lg  " placeholder="Confirm Password" >
    </div>
    <div class="frm-grp max-sm:w-full max-sm:m-1 flex flex-col  gap-1 mt-5 w-1/2 w-1/2 mx-auto  ">
        <p class="p-1 text-blue text-white text-center text-sm font-semibold rounded-lg h-[2px] w-full my-3 blur-sm" id="msg" > </p>
        
        <button class="px-3 py-2 bg-blue-500 text-white rounded-lg" name="signup" id="signup" >Sign Up</button>
        <p class="text-white text-lg" >have an Account ? <a class="text-zinc-200 text-lg font-semibold" href="login.php">Sign in</a></p>
    </div>

    </form>
    <?php $conn->close() ?>

</div>

    </section>
    <script>

        let signupbtn= document.querySelector("#signup")
        signupbtn.setAttribute('disabled','true')
        signupbtn.classList.add('bg-gray-600')
        
let C_pass= document.querySelector('#C_pass');
let pass= document.querySelector('#pass');

let typingTimer;
let doneTypingInterval = 1000;

pass.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });
C_pass.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

        function doneTyping() {
            var value1 = pass.value;
            var value2 = C_pass.value;

            if (value1 !== '' || value2!=='') {
                
                if (value1 === value2 ) {
                    document.querySelector('#msg').classList.remove('bg-red-600')
                    
                    document.querySelector('#msg').classList.add('bg-green-600')
                    // document.querySelector('#msg').textContent="Password match"
                    console.log('password match.');
                    signupbtn.removeAttribute('disabled')
        signupbtn.classList.remove('bg-gray-600')
            } else {
                document.querySelector('#msg').classList.remove('bg-green-600')
                document.querySelector('#msg').classList.add('bg-red-600')

                // document.querySelector('#msg').textContent="Password Not match"

                signupbtn.setAttribute('disabled','true')
                signupbtn.classList.add('bg-gray-600')
                console.log('password Dont match.');
                
                
                
            }
        }
        }





    </script>
    
</body>
</html>