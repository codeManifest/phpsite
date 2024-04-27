<?php
// function createDB() {

    
    
// }
// $createDB = "CREATE DATABASE IF NOT EXISTS $database";
// if ($conn->query($createDB) === TRUE) {
//     $mydbstatus= "DATABASE CREATED";
//     $sql = mysqli_select_db($conn, $database);

//     $tables = [ 'category', 'C_size', 'images', 'colors','product'];
//     foreach ($tables as $tablename) {
//         $tableSQL = "CREATE TABLE IF NOT EXISTS $tablename (
//             Id INT  PRIMARY KEY  AUTO_INCREMENT,
//             ".columns($tablename)."
//         )";

//         if ($conn->query($tableSQL) === TRUE) {
//         //    echo"Table $tablename created ";
//         } else {
//             echo "Error creating $tablename table: " . $conn->error . "";
//         }
//     }

   
 

// };

// function columns($tablename)
// {
//     switch ($tablename) {
//         case 'category':
//             return "category VARCHAR(20) NOT NULL";
//             case 'C_size':
//                 return "C_size VARCHAR(5) NOT NULL";
//                 case 'images':
//                     return "images VARCHAR(150) NOT NULL";
//                     case 'colors':
//                         return "colors VARCHAR(20) NOT NULL";
//                         case 'product':
//                             return "product_name VARCHAR(150) NOT NULL,
//                                 price DOUBLE(10,2) NOT NULL,
//                                 stock INT NOT NULL,
//                                 category_Id INT(10) NOT NULL,
//                                 C_size_Id INT(5) NOT NULL,
//                                 colors_Id INT(5) NOT NULL,
//                                 delivery_charge DOUBLE(6,2) NOT NULL,
//                                 discount INT ,
//                                 images_Id INT,
                                
//                                 FOREIGN KEY (category_Id) REFERENCES category(Id),
//                                 FOREIGN KEY (C_size_Id) REFERENCES C_size(Id),                        
//                                 FOREIGN KEY (colors_Id) REFERENCES colors(Id),
//                                 FOREIGN KEY (images_Id) REFERENCES images(Id)
                    
         
//                              ";
//     }
// }
// $default_category="INSERT INTO category(category) VALUES 
// ('Beauty'),
// ('Garments'),
// ('Electronics'),
// ('Kitchen'),
// ('Foods'),
// ('shoes'),
// ('Toys'),
// ('Stationary')";

// $result=mysqli_query($conn,$default_category);


// $default_colors="INSERT INTO colors(colors) VALUES 
// ('Red'),
// ('White')";

// $result=mysqli_query($conn,$default_colors);
// $default_size="INSERT INTO C_size(C_size) VALUES 
// ('XSM'),
// ('M'),
// ('XL'),
// ('XXL'),
// ('XXXL')


// ";
// $result=mysqli_query($conn,$default_size);

?>