<?php
require_once "config.php";
require_once "session.php";
require_once "pageformat.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{
    $fullname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    $password_hash=password_hash($password, PASSWORD_BCRYPT);
    if($query=$db->prepare("SELECT * FROM customers WHERE email = ?")) 
    {
        $error='';
        /* Binding parameters */
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result(); //stores result to check if account exists in DB
        if($query->num_rows >0) 
        {
            $error.='<p class="error">Email address is already registered!</p>';
            header("Location:signup.php?msg=Email+address+is+already+registered!");

        } else 
        {
            //validates password
            if(strlen($password) < 8) 
            {
                $error.='<p class="error">Passwords must contain at least 8 characters.</p>';
                header("Location:signup.php?msg=Password+must+be+at+least+8+characters");
            }
            //validates confirm password
            if(empty($confirm_password)) 
            {
                $error.='<p class="error">Please confirm password.</p>';
                header("Location:signup.php?msg=Please+Confirm+Password");
            } else {
                if($password!=$confirm_password) 
                {
                    $error.='<p class="error">Passwords do not match.</p>';
                    header("Location:signup.php?msg=Passwords+Do+Not+Match");
                }
            }
            if(empty($error)) 
            {
                $name = explode(" ", $fullname);
                $insertQuery=$db->prepare("INSERT INTO customers (fname, lname, email, pass) VALUES(?,?,?,?);");
                $insertQuery->bind_param("ssss", $name[0],$name[1], $email, $password_hash);
                $result=$insertQuery->execute();
                if($result) 
                { 
                    $error.='<p class="success">Registration successful!</p>';
                    $_SESSION['sessionID'] = '1';
                    header("Location:index.php");
                }
                else 
                {
                    $error.='<p class="error">Something went wrong!</p>';
                    header("Location:signup.php?msg=Something+Went+Wrong");
                }
                $insertQuery->close();
            }
        }
        $query->close(); 
    }
    mysqli_close($db); //closes DB connection
}
?>