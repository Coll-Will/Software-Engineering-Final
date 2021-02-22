<?php
require_once "config.php";
require_once "session.php";

if(isset($_POST['submit'])) 
{
    $email=trim($_POST['email']);
    $result=mysqli_query($db, "SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $row=mysqli_fetch_assoc($result);
    $fetch_emailid=$row['users'];
    $email=$row['users'];
    $password=$row['users'];
    //send email to reset password
    if($email==$fetch_emailid)
    {
        $to=$email;
        $subject="Password Reset";
        $txt="Click the link to reset your password. http://whereswalldo.000webhostapp.com/pass_reset.php";
        $headers="From: system@whereswalldo.000webhost.com" . "\r\n\"";
        mail($to, $subject, $txt, $headers);
    }
    else
    {
        echo 'invalid email';
    }
}

?>

<!-- begin HTML -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
    <p>Enter your email address to get a password reset link.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </form>
    </body>
</html>
