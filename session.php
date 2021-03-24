<?php
	session_start(); //starts session
	$_SESSION['timestamp'] = time();

	if(time() - $_SESSION['timestamp'] > 30) //subtracts new time stamp from old timestamp
    {
        echo"<script>alert('Inactivity for 15 minutes');</script";
        unset($_SESSION['sessionID'], $_SESSION['timestamp']);
        header("location: login.php"); //return to login screen
        exit;
    }
    else
    {
        $_SESSIOM['timestamp'] = time(); //create new timestamp
    }
?>