<?php
	$server = "localhost:3306";
	$username = "root";
	$dbname = "whereswalldo";
	$pass = NULL;

 	//Connect to database
	$db=mysqli_connect($server, $username, $pass, $dbname);
	
	//checks DB connection
	if($db==false) {
	    die("Error: Connection error. " .mysqli_connect_error());
	}
?>