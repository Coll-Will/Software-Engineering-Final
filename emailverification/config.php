<?php
define('DBSERVER', 'localhost'); //Database server
define('DBUSERNAME', 'username1'); //DB user
define('DBPASSWORD', 'password'); //DB pass
define('DBNAME', 'seniorproject'); //DB name

$db=mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME); //Connect to database
//checks DB connection
if($db==false) {
    die("Error: Connection error. " .mysqli_connecy_error());
}
?>