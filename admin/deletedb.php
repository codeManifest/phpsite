<?php include_once '../config/config.php'   ?>


<?php 

if (isset($_POST['deletedb'])===TRUE) {
    $drop_Db=" DROP DATABASE $database ";
    // $result=$conn->query($drop_Db);

    if ($conn->query($drop_Db)===true) {

echo'database deleted successfully';
header('location:dashboard.php?action=settings');
# code...
    }else{

        echo 'Not deleted your database'.$conn->connect_errno;
    }
    # code...
}

?>