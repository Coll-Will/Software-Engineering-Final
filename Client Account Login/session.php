<?php
	session_start(); //starts session

	if(isset($_SESSION["userid"]) && $_SESSION["userid"]==true) {
	    header("location: welcome.php");
	    exit;
	}
?>