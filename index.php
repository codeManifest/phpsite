<?php  
$serverName = "localhost";
$username = "root";
$password = "";
$database = "shogo";

$conn = new mysqli($serverName, $username, $password);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}




?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  
      <link rel="stylesheet" href="./style/style.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

      
  <title>ShoGo</title>


</head>
<body>
  
  <?php include './component/nav.php' ?>
  <main>
    <?php include './component/carousal.php' ?>
    <div class="p-5" >

      
      <?php include './component/productsgrp.php' ?>
      <?php include './component/products.php' ?>
    </div>
    
    
  </main>

<script>
module.exports = {
  // ...
  plugins: [
    require('tailwindcss-animated')
  ],
}





</script>
  
</body>
</html>