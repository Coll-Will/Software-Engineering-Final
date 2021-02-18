<?php
define('DBSERVER', 'localhost'); //Database server
define('DBUSERNAME', 'root'); //DB user
define('DBPASSWORD', ''); //DB pass
define('DBNAME', 'demo'); //DB name

$db=mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME); //Connect to database
//checks DB connection
if($db==false) {
    die("Error: Connection error. " .mysqli_connecy_error());
}
?>