<?php 
    $servername = "localhost";
    $user= "root";
    $dbname ="book_store";
    $pass = "";

    $conn = new mysqli($servername, $user, $pass, $dbname);

    if($conn){
        // echo "Connected succesfully";
    }

?>