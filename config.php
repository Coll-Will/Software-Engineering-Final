<?php
	//define('DBSERVER', 'localhost'); //Database server
	//define('DBUSERNAME', 'root'); //DB user
	//define('DBPASSWORD', '112358'); //DB pass
	//define('DBNAME', 'whereswalldoDB'); //DB name

	//Localhost configuration
	$server = "localhost:3306";
	$username = "root";
	$dbname = "whereswalldodb";
	$pass = NULL;

	//Connect to local database 
	$db=mysqli_connect($server, $username, $pass, $dbname);

 	//Connect to database
	//$db=mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
	//checks DB connection
	if($db==false) {
	    die("Error: Connection error. " .mysqli_connect_error());
	}
?>