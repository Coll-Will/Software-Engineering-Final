<?php
function connectDB(){
    $servername = "localhost";
    $dbname = "whereswalldo";
    $username = "root";
    $password = NULL;
  
    $conn=new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) 
        die("Fatal error on connecting to DB. ");
        
     return $conn;
}
?>