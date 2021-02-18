<?php
require_once "config.php";
require_once "session.php";
$error='';
if($_SERVER["REQUEST METHOD"]=="POST" && isset($_POST['submit'])) 
{
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    //check if email is empty
    if(empty($email)) 
    {
        $error.='<p class="error">Please enter your email.</p>';
    }
    //check if password is empty
    if(empty($password)) 
    {
        $error.='<p class="erorr">Please enter your password.</p>';
    }
    if(empty($error)) 
    {
        if($query=$db->prepare("SELECT * FROM users WHERE email=?")) 
        {
            $query->bind_param('s', $email);
            $query->execute();
            $row=$query->fetch();
            if($row) 
            {
                if(password_verify($password, $row['password'])) {
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"]=$row;
                    //redirects to welcome page
                    header("location: welcome.php");
                    exit;
                } else 
                {
                    $error.='<p class="error">Password not valid.</p>';
                }
            } else 
            {
                $error.='<p class="error">No account registered with that email address!</p>';
            }
        }
        $query->close();
    }
    mysqli_close($db);
}
?>
/*start HTML portion*/
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h2>Login</h2>
                <p>Enter your email and password.</p>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Emial Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Don't have an account yet? <a href="register.php">Register here</a>!</p>
                </form>
            </div>
        </div>
    </body>
</html>