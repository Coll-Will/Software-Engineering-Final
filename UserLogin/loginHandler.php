<?php
require_once "../config.php";
require_once "../session.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    //check if email is empty
    if(empty($email)) 
    {
        header("Location:login.php?msg=Please+Enter+Your+Email");
    }
    //check if password is empty
    if(empty($password)) 
    {
        header("Location:login.php?msg=Please+Enter+Your+Password");
    }
    if($query=$db->prepare("SELECT CID, email, pass FROM customers WHERE email = ?")) 
    {
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result();
        if($query->num_rows > 0) 
        {
            $query->bind_result($CID, $EMAIL, $PASS);
            while($query->fetch()){}
            if(password_verify($password, $PASS)) 
            {
                $_SESSION["sessionID"] = $CID;
                header("location:../index.php");
            } 
            else 
            {
                header("Location:login.php?msg=Incorrect+Password");
            }
        } else 
        {
            header("Location:login.php?msg=Email+Address+is+Not+Registered");
        }
    }
    else
    {
        header("Location:login.php?msg=Error+Has+Occured");
    }
    $query->close();
    mysqli_close($db);
}
?>