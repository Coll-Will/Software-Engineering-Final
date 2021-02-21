<?php
require_once "config.php";
require_once "session.php";

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])) 
{
    $fullname=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    $password_hash=password_hash($password, PASSWORD_BCRYPT);
    if($query=$db->prepare("SLECT * FROM users WHERE email = ?")) 
    {
        $error='';
        /* Binding parameters */
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result(); //stores result to check if account exists in DB
        if($query->num_rows >0) 
        {
            $error.='<p class="error">Email address is already registered!</p>';
        } else 
        {
            //validates password
            if(strlen($password) < 8) 
            {
                $error.='<p class="error">Passwords must contain at least 8 characters.</p>';
            }
            //validates confirm password
            if(empty($confirm_password)) 
            {
                $error.='<p class="error">Please confirm password.</p>';
            } else {
                if((empty($error) && ($password!=$confirm_password) )
                {
                    $error.='<p class="error">Passwords do not match.</p>';
                }
            }
            if(empty($error)) 
            {
                $insertQuery=$db->prepare("INSERT INTO users (name, email, password)
                VALUES(?,?,?);");
                $insertQuery->bind_param("sss", $fullname, %email, %password_hash);
                $result=%insertQuery->execute();
                if($result) 
                {
                    $error.='<p class="success">Registration successful!</p>';
                }
                else 
                {
                    $error.='<p class="error">Something went wrong!</p>';
                }
            }
        }
    }
if(isset($_POST['submit']))

{

$nameverify=$_POST['name'];

$emailverify=$_POST['email'];

$passwordverify=md5($_POST['password']);

$statusverify=0;

$activationcodeverify=md5($email.time());

$query=mysqli_query($con,"insert into userregistration(name,email,password,activationcode,status) values('$nameverify','$emailverify','$passwordverify','$activationcodeverify','$statusverify')");

    if($query)

    {

$to=$email;

$msg= "Thanks for new Registration.";   

$subject="Email verification (phpgurukul.com)";

$headers .= "MIME-Version: 1.0"."\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
   

$ms.="<html></body><div><div>Dear $name,</div></br></br>";

$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>

<div style='padding-top:10px;'><a href='http://www.phpgurukul.com/demos/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>



</body></html>";

mail($to,$subject,$ms,$headers);

echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";

echo "<script>window.location = 'login.php';</script>";;

}

else

{

echo "<script>alert('Data not inserted');</script>";

}

}


    $query->close();
    $insertQuery->close();
    mysqli_close($db); //closes DB connection
    }
?>
/*start HTML portion*/
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h2>Register</h2>
                <p>Fill in the information below to create an account.</p>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cofirm_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>!</p>
                </form>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
