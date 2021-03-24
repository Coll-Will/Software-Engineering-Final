<?php
 
include_once('connection.php');
    
    $conn=connectDB();
    if(!$conn){
        echo "connecting failed, try again later.";
        die("Failed on DB connection");
    }
    $adminname=$_POST["adminname"];
    $password=$_POST["password"];
    $stmt ="SELECT * FROM adminlogin WHERE adminname=\"$adminname\" AND password=\"$password\"";
    $result=$conn->query($stmt);
    if(!$result)
    {
        die("fatal error");
    }
    $rows=$result->num_rows;
    
    if($rows==1){
        $arr=$result->fetch_array(MYSQLI_ASSOC);
        header("Location:adminpage.php");
    }
    else{
        header("Location: adnminlogin.php?msg=Invalid credentials!");
    }
?>