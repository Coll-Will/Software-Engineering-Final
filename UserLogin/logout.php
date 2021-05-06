<?php
	session_start(); //starts session
	session_unset(); //clears values with the $_SESSION[] variable
	if(session_destroy()) 
	{
		header("location:http://whereswalldo.000webhostapp.com/userlogin/login.php");
		exit;
	}
?>