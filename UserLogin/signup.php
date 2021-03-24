<?php
  require_once "../pageformat.php";
  pagenavbar();
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <style>
        html,body {
          height:100%;
          width:100%;
          margin:0;
        }
        body , body {
          display:flex;
          margin-top:5%;
        }
        form {
          margin:auto;
        }
    </style>
    <body>
        <div class="container">
            <h2 style = "text-align:center; padding-bottom: 30px;">Register New Account</h2>
            <?php
                if(isset($_GET["msg"]))
                {
                    $msg = $_GET["msg"];
                    echo "<h4 class = \"text-danger\" style =\"text-align:center;\">$msg</h4>";
                }
            ?>
            <div class="row">
                <form action="./register.php" method="post">
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
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>!</p>
                </form>
            </div>
        </div>
        <?php pagefooter() ?>
    </body>
</html>