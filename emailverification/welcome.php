<?php
session_start(); //starts session
//check if user is logged in, if not redirect to login screen
if(!isset($_SESSION["userid"]) || $_SESSION["userid"]!==true) 
{
    header("location: login.php");
    exit;
}
?>
/*Begin HTML portion*/
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTf-8">
        <title>Welcome<?php echo $_SESSION["name"]; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
            <h2>Hello, <?php echo $_SESSION["name"]; ?> Welcome back!</h2>
            </div>
            <p>
                <a href="logout.php" class="btn btn-secondary btn-lg active" role="button"
                   aria-pressed="true">Log out</a>
            </p>
        </div>
    </body>
</html>