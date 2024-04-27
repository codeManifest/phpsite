<?php
require_once '../config/config.php';

function prx($str){
    echo '

    <pre>'.
    print_r($str).
    '</pre>
    ';


    
}

function sanitize_str( $conn, $str){
   
    mysqli_escape_string($conn,$str);
    
}


?>