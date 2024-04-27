if ($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['signup']) ) {

$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];

$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

$pass_hash=sha1($password,TRUE);
$C_pass_hash=sha1($confirm_password,TRUE);



$chk_email="SELECT * FROM users WHERE email='$email'";
$result=$conn->query($chk_email);




if ($result->num_rows > 0) {

    
    
    echo'email already exist';
    
    
    # code...
} else{
    
    $query="INSERT INTO users(name,Username,email,password,confirm_password) VALUES( '$name','$email','$username','$pass_hash','$C_pass_hash')";
if (mysqli_query($conn,$query)  ) {
    echo' hii, '.$name.' you  successfully signup';
    header('location:login.php');
    # code...
}

}


# code...
}
