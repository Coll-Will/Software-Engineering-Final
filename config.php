<?php
	define('DBSERVER', 'localhost'); //Database server
	define('DBUSERNAME', 'id16184555_username'); //DB user
	define('DBPASSWORD', 'Password1234!'); //DB pass
	define('DBNAME', 'id16184555_whereswalldo'); //DB name

 	//Connect to database
	$db=mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
	
	//checks DB connection
	if($db==false) {
	    die("Error: Connection error. " .mysqli_connect_error());
	}
?>