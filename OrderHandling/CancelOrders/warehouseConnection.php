<?php

$conn = "";
    function connectDB()
    {
    $servername = "localhost";
    $dbname = "id16184555_whereswalldo";
    $username = "id16184555_username";
    $password = "Password1234!";
     
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error) die("Fatal error on connecting to DB. ");

    return $conn;
    }
?>