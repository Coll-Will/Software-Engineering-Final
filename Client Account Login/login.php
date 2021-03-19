<?php 
    require_once "../pageformat.php";
    pagenavbar();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            html,body {
                height:100%;
                width:100%;
                margin:0;
            }
            body , body {
                display:flex;
                margin-top:13%;
            }
            form {
                margin:auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form action="./loginHandler.php" method="post">
                    <?php
                    if(isset($_GET["msg"]))
                    {
                        $msg = $_GET["msg"];
                        echo "<h4 class = \"text-danger\" style =\"text-align:center;\">$msg</h4>";
                    }
                    ?>
                    <h2 style = "text-align: center">Login</h2>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-secondary" value="Submit">
                    </div>
                    <p>Don't have an account yet? <a href="signup.php">Register here</a>!</p>
                </form>
            </div>
        </div>
    </body>
</html>