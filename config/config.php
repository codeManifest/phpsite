<?php  
session_start();
if ( !isset($_SESSION['username']))  {
    header('location:http://localhost/shogoup/phpsite/login.php'
);

    # code...
}


?>

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

    $tables = [ 'category', 'C_size', 'images', 'colors','product','users'];
    foreach ($tables as $tablename) {
        $tableSQL = "CREATE TABLE IF NOT EXISTS $tablename (
            Id INT  PRIMARY KEY  AUTO_INCREMENT,
            ".columns($tablename)."
        )";

        if ($conn->query($tableSQL) === TRUE) {
        //    echo"Table $tablename created ";
        } else {
            echo "Error creating $tablename table: " . $conn->error . "";
        }
    }

   
 

};

function columns($tablename)
{
    switch ($tablename) {
        case 'category':
            return "category VARCHAR(20) NOT NULL";
            case 'C_size':
                return "C_size VARCHAR(5) NOT NULL";
                case 'images':
                    return "images VARCHAR(150) NOT NULL";
                    case 'colors':
                        return "colors VARCHAR(20) NOT NULL";
                    case 'users':
                        return "_name VARCHAR(20) NOT NULL,Username VARCHAR(20) UNIQUE, email VARCHAR(20) UNIQUE, _password VARCHAR(30) NOT NULL,confirm_password VARCHAR(30) NOT NULL, _Role INT(2) DEFAULT 0, profile_pic VARCHAR(70)  ";
                        case 'product':
                            return "product_name VARCHAR(150) NOT NULL,
                                price DOUBLE(10,2) NOT NULL,
                                stock INT NOT NULL,
                                category_Id INT(10) DEFAULT (0) ,
                                C_size_Id INT(5) DEFAULT (0) ,
                                colors_Id INT(5) DEFAULT (0) ,
                                delivery_charge DOUBLE(6,2) NOT NULL,
                                discount INT ,
                                images_Id INT,
                                
                                FOREIGN KEY (category_Id) REFERENCES category(Id),
                                FOREIGN KEY (C_size_Id) REFERENCES C_size(Id),                        
                                FOREIGN KEY (colors_Id) REFERENCES colors(Id),
                                FOREIGN KEY (images_Id) REFERENCES images(Id)
                    
         
                             ";
    }
}



$sql=" SELECT * FROM category ";
$result_list = $conn->query($sql);
if ($result_list->num_rows > 0) {
    

    $default_category="";

} else{
    $default_category="INSERT IGNORE INTO category(category) VALUES 

('Uncategorized')
";

$result=mysqli_query($conn,$default_category);

}

$sql=" SELECT * FROM colors ";
$result_list = $conn->query($sql);
if ($result_list->num_rows > 0) {
    

    $default_colors="";

} else{
    $default_colors="INSERT IGNORE INTO colors(colors) VALUES 
('== Not Selected =='),
('Red'),
('White')";
$result=mysqli_query($conn,$default_colors);



}
$sql=" SELECT * FROM C_size ";
$result_list = $conn->query($sql);
if ($result_list->num_rows > 0) {
    

    $default_size="";

} else{
    $default_size="INSERT IGNORE INTO C_size(C_size) VALUES 
('== NONE =='),
('XSM'),
('M'),
('XL'),
('XXL'),
('XXXL')


";
$result=mysqli_query($conn,$default_size);



}





 
?>
