
<?php
session_start(); //starts session

if(session_Destroy()) 
{
header("location: login.php");
exit;
}
?>