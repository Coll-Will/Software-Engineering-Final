<?php
require_once "../config.php";
require_once "../session.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{
    $fullname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    $password_hash=password_hash($password, PASSWORD_BCRYPT);
    if($query=$db->prepare("SELECT * FROM customers WHERE email = ?")) 
    {
        
        /* Binding parameters */
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result(); //stores result to check if account exists in DB
        if($query->num_rows > 0) 
        {
            $error =  "Error Code 0001";
            header("Location:signup.php?msg=Email+address+is+already+registered!");
        } 
        else 
        {
            //validates password
            if(strlen($password) < 8) 
            {
                $error =  "Error Code 0002";
                header("Location:signup.php?msg=Password+must+be+at+least+8+characters");
            }
            //validates confirm password
            if(empty($confirm_password)) 
            {
                $error =  "Error Code 0003";
                header("Location:signup.php?msg=Please+Confirm+Password");
            } 
            else 
            {
                if($password!=$confirm_password) 
                {
                    $error =  "Error Code 0004";
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
                    $query = $db->prepare("SELECT CID FROM customers WHERE email = ?");
                    $query->bind_param('s',$email);
                    $query->execute();
                    $query->store_result();
                    $query->bind_result($CID);
                    while($query->fetch()){}
                    $_SESSION['sessionID'] = $CID;
                    
                    
                    $to=$email;
                    $msg= "Thanks for new Registration.";   
                    $subject="Account Creation Successful";
                    $headers = "From: wheres.waldo@irissoln.com" . "\r\n";
                    $ms.='

Thank you for signing up and creating an account with us!
----------------------------
Here at Wheres Walldo we value every new customer. We look forward to serving you and hope we meet every expectation for incredible service.
----------------------------
Please click this link to be directed back to login so you may begin your shopping:
http://whereswalldo.000webhostapp.com/userlogin/login.php

'
                    ;

                    ini_set('smtp_port', '587');
                    ini_set('SMTP','smtp.fatcow.com');
                    ini_set('smtp_server','smtp.fatcow.com' );
                    ini_set('sendmail_from', 'wheres.waldo@irissoln.com');
                    ini_set('auth_username','wheres.waldo@irissoln.com' );
                    ini_set('auth_password','CSCI4320ww');
                    ini_set('force_sender','wheres.waldo@irissoln.com');
                    ini_set('hostname','localhost');

                    if(mail($to,$subject,$ms,$headers)){

                        echo "<script>alert('Registration successful, please look for the successful sign up email associated with your account');</script>";

                    echo "<script>window.location = '../index.php';</script>";;
                    }
                


                    
                    header("Location:../index.php");
                }
                else 
                {
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