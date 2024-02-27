<?php

$serverName = "localhost";
$username = "root";
$password = "";
$database = "shogo";

$conn = new mysqli($serverName, $username, $password);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$createDB = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($createDB) === TRUE) {
    $mydbstatus= "DATABASE CREATED";
    $sql = mysqli_select_db($conn, $database);

    $tables = ['product', 'category', 'size', 'images', 'colors'];
    foreach ($tables as $tablename) {
        $tableSQL = "CREATE TABLE IF NOT EXISTS $tablename (
            Id INT UNIQUE PRIMARY KEY AUTO_INCREMENT,
            " . columns($tablename) . "
        )";

        if ($conn->query($tableSQL) === TRUE) {
        //    echo"Table $tablename created ";
        } else {
            echo "Error creating $tablename table: " . $conn->error . "";
        }
    }
}

function columns($tablename)
{
    switch ($tablename) {
        case 'product':
            return "product_name VARCHAR(150) NOT NULL, price DOUBLE(10,2) NOT NULL, stock INT NOT NULL";
        case 'category':
            return "category VARCHAR(20) NOT NULL";
        case 'size':
            return "size VARCHAR(5) NOT NULL";
        case 'images':
            return "images VARCHAR(150) NOT NULL";
        case 'colors':
            return "colors VARCHAR(20) NOT NULL";
    }
}


?>
