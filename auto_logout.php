<!--https://stackoverflow.com/questions/20516969/automatic-logout-after-15-minutes-of-inactive-in-php/20517030-->
<?php
if(time() - $_SESSION['timestamp'] > 30) //subtracts new time stamp from old timestamp
{
    echo"<script>alert('Inactivity for 15 minutes');</script";
    unset($_SESSION['email'], $_SESSION['password'], $_SESSION['timestamp']);
    $_SESSION['loggedin']=false;
    header("location: login.php"); //return to login screen
    exit;
}
else
{
    $_SESSIOM['timestamp']=time(); //create new timestamp
}
?>