<?php
	session_start(); //starts session
	session_unset(); //clears values with the $_SESSION[] variable
	if(session_destroy()) 
	{
		header("Location:http://localhost/DemoVersion/userlogin/login.php");
		exit;
	}
?>