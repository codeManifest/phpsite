
 
 
 <?php
 include_once '../../config/config.php';

 // Check if 'Id' is set in the URL
 if (isset($_GET['Id'])) {
     // Sanitize the input to prevent SQL injection (consider using prepared statements)
     $Id = mysqli_real_escape_string($conn, $_GET['Id']);
 
     // Construct the DELETE query
     $deleteRecords = "DELETE FROM users WHERE Id = $Id";
 
     // Execute the query
     $result = $conn->query($deleteRecords);
 
     if ($result === TRUE) {
         echo "Record with ID $Id deleted successfully";
         header('location: http://localhost/shogoup/phpsite/admin/dashboard.php?action=users');
     } else {
         echo "Error deleting record: " . $conn->error;
     }
 } else {
     echo "ID not found in URL";
 }
 
 // Close the database connection
 $conn->close();
 ?>
 