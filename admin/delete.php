 <?php
 include_once '../config/config.php';

 // Check if 'Id' is set in the URL
 if (isset($_GET['Id'])) {
     // Sanitize the input to prevent SQL injection (consider using prepared statements)
     $Id = mysqli_real_escape_string($conn, $_GET['Id']);
 
     // Construct the DELETE query
     $deleteRecords = "DELETE FROM product WHERE Id = $Id";
 
     // Execute the query
     $result = $conn->query($deleteRecords);
 
     if ($result === TRUE) {
         echo "Record with ID $Id deleted successfully";
         header('location: dashboard.php?action=manage');
     } else {
         echo "Error deleting record: " . $conn->error;
     }
 } else {
     echo "ID not found in URL";
 }
 
 // Close the database connection
 $conn->close();
 ?>
 